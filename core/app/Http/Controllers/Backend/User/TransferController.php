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
        if ($receiver) {
            if ($receiver->id != Auth::user()->id) {
                $charge = $request->amount * ($setting->percent_charge / 100) + $setting->fixed_charge;
                $totalAmount = $request->amount + $charge;
                if ($totalAmount <= $sender->balance) {
                    $trx_num = Str::random(12);
                    $receiver->balance += $request->amount;

                    $receiver->transactions()->create([
                        'user_id' => $receiver->id,
                        'trx_num' => $trx_num,
                        'trx_type' => true,
                        'amount' => $request->amount,
                        'remaining_balance' => $receiver->balance,
                        'details' => $request->amount . " " . $setting->currency . " received from " . $sender->username,
                    ]);
                    $setting = Setting::first();
                    $sender_email = "no-reply@ows.com";
                    $receiver_email = $receiver->email;
                    $subject = "Your account has been credited";
                    $message = "You have received " . $request->amount . ' ' .
                        $setting->currency . ' successfully.';
                    $headers = "From: $setting->site_name <$sender_email> \r\n";
                    $headers .= "Reply-To: <$receiver_email> \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
                    @mail($receiver_email, $subject, $message, $headers);
                    $receiver->save();

                    $sender->balance -= $totalAmount;
                    $sender->transactions()->create([
                        'user_id' => $sender->id,
                        'trx_num' => $trx_num,
                        'trx_type' => false,
                        'amount' => $totalAmount,
                        'remaining_balance' => $sender->balance,
                        'details' => $request->amount . " " . $setting->currency . " sent to " . $receiver->username,
                    ]);

                    $setting = Setting::first();
                    $sender_email = "no-reply@ows.com";
                    $receiver_email = $sender->email;
                    $subject = "Transfer Successful";
                    $message = "Your " . $request->amount . ' ' .
                        $setting->currency . ' has been sent successfully.';
                    $headers = "From: $setting->site_name <$sender_email> \r\n";
                    $headers .= "Reply-To: <$receiver_email> \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
                    @mail($receiver_email, $subject, $message, $headers);
                    $sender->save();

                    if ($sender->ref_by != null) {
                        $percent_amount = $request->amount * ($setting->transfer_bonus/100);
                        $sender->user->balance += $percent_amount;
                        $sender->user->transactions()->create([
                            'user_id' => $sender->user->id,
                            'trx_num' => Str::random(12),
                            'trx_type' => true,
                            'amount' => $percent_amount,
                            'remaining_balance' => $sender->user->balance,
                            'details' => $percent_amount . " " . $setting->currency . " received transfer bonus from " . $sender->username,
                        ]);
                        $setting = Setting::first();
                        $sender_email = "no-reply@ows.com";
                        $receiver_email = $sender->user->email;
                        $subject = "You have received bonus";
                        $message = "You have received " . $percent_amount . ' ' .
                            $setting->currency . ' for ' . $sender->name . ' transaction';
                        $headers = "From: $setting->site_name <$sender_email> \r\n";
                        $headers .= "Reply-To: <$receiver_email> \r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
                        @mail($receiver_email, $subject, $message, $headers);
                        $bonus = new Bonus();
                        $bonus->user_id = $sender->user->id;
                        $bonus->refer_bonus = null;
                        $bonus->transfer_bonus = $percent_amount;
                        $bonus->detail = "Received transfer bonus for ".
                            $sender->name . ' transaction';
                        $bonus->save();
                        $sender->user->save();
                    }

                    return back()->with('success', "Transfer successful");

                } else {
                    return back()->with('error', "Insufficient balance!!!");
                }
            } else {
                return back()->with('error', 'Invalid transaction');
            }
        } else {
            return back()->with('error', "User doesn't exists!!!");
        }
    }
}
