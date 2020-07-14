<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransferController extends Controller
{
    public function index()
    {
        $title = "Transfer";
        return view('backend.user.transfer', compact('title'));
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'username' => 'bail|string|required',
            'amount' => 'bail|numeric|required|min:20',
        ]);

        $receiver = User::where('username', $request->username)->first();
        $sender = Auth::user();
        $setting = Setting::first();

        $charge = $request->amount * ($setting->percent_charge / 100) + $setting->fixed_charge;
        $totalAmount = $request->amount + $charge;

        if (!$receiver) {
            return back()->with('error', "User doesn't exists!!!");
        }

        if ($receiver->id == Auth::user()->id) {
            return back()->with('error', 'Invalid transaction');
        }

        if ($totalAmount >= $sender->balance) {
            return back()->with('error', "Insufficient balance!!!");
        }

        $trx_num = Str::random(12);

        // Receiver Email
        $receiver->balance += $request->amount;
        $receiverTrx = new Transaction();
        $receiverTrx->user_id = $receiver->id;
        $receiverTrx->trx_num = $trx_num;
        $receiverTrx->trx_type = true;
        $receiverTrx->amount = $request->amount;
        $receiverTrx->remaining_balance = $receiver->balance;
        $receiverTrx->details = $request->amount . " " . $setting->currency . " received from " . $sender->username;

        // Email section
        $subject = "Your account has been credited";
        $message = "You have received " . $request->amount . ' ' .
            $setting->currency . ' successfully.';
        sendMail($receiver->email, $subject, $message);
        $receiverTrx->save();
        $receiver->save();

        // Sender Section
        $sender->balance -= $totalAmount;
        $senderTrx = new Transaction();
        $senderTrx->user_id = $sender->id;
        $senderTrx->trx_num = $trx_num;
        $senderTrx->trx_type = false;
        $senderTrx->amount = $totalAmount;
        $senderTrx->remaining_balance = $sender->balance;
        $senderTrx->details = $request->amount . " " . $setting->currency . " sent to " . $receiver->username;
        $subject = "Transfer Successful";
        $message = "Your account has been debited by " . $request->amount . ' ' .
            $setting->currency;
        sendMail($sender->email, $subject, $message);
        $senderTrx->save();
        $sender->save();

        // Referrer Section
        if ($sender->ref_by != null) {
            $percent_amount = $request->amount * ($setting->transfer_bonus / 100);
            $referrer = $sender->user;
            $referrer->balance += $percent_amount;
            $referrerTrx = new Transaction();
            $referrerTrx->user_id = $referrer->id;
            $referrerTrx->trx_num = Str::random(12);
            $referrerTrx->trx_type = true;
            $referrerTrx->amount = $percent_amount;
            $referrerTrx->remaining_balance = $referrer->balance;
            $referrerTrx->details = $percent_amount . " " . $setting->currency . " received transfer bonus from " . $sender->username;

            // Referrer Email
            $subject = "You have received bonus";
            $message = "You have received " . $percent_amount . ' ' .
                $setting->currency . ' for ' . $sender->name . ' transaction';
            sendMail($referrer->email, $subject, $message);

            // Bonus section for referrer
            $bonus = new Bonus();
            $bonus->user_id = $sender->user->id;
            $bonus->refer_bonus = null;
            $bonus->transfer_bonus = $percent_amount;
            $bonus->detail = "Received transfer bonus for " .
                $sender->name . ' transaction';

            $bonus->save();

            $receiverTrx->save();

            $referrer->save();
        }

        return back()->with('success', "Transfer successful");

    }
}
