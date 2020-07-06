<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransferController extends Controller
{
    public function index()
    {
        return view('backend.user.transfer');
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'username' => 'bail|string|required',
            'amount' => 'bail|numeric|required',
        ]);

        $receiver = User::where('username', $request->username)->first();
        $sender = Auth::user();
        $setting = Setting::first();
        if ($receiver) {
            $charge = $request->amount * ($setting->percent_charge/100) + $setting->fixed_charge;
            $totalAmount = $request->amount + $charge;
            if ($totalAmount <= $sender->balance) {
                $trx_num = Str::random(12);
                $receiver->balance += $request->amount;
                $receiver->transactions()->create([
                    'user_id' => $receiver->id,
                    'trx_num' => $trx_num,
                    'trx_type' => $request->amount . " " . $setting->currency . " has been credited",
                    'amount' => $request->amount,
                    'remaining_balance' => $receiver->balance,
                    'details' => $request->amount . " " . $setting->currency . " received from " . $sender->username,
                ]);
                $receiver->save();

                $sender->balance -= $totalAmount;
                $sender->transactions()->create([
                    'user_id' => $sender->id,
                    'trx_num' => $trx_num,
                    'trx_type' => $totalAmount . " " . $setting->currency . " has been debited",
                    'amount' => $totalAmount,
                    'remaining_balance' => $sender->balance,
                    'details' => $request->amount . " " . $setting->currency . " sent to " . $receiver->username,
                ]);
                $sender->save();

                return back()->with('success', "Transfer successful");

            } else {
                return back()->with('error', "Insufficient balance!!!");
            }
        } else {
            return back()->with('error', "User doesn't exists!!!");
        }
    }
}
