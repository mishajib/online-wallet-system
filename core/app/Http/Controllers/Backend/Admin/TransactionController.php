<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->latest()->paginate(10);
        return view('backend.admin.transaction.transaction', compact('transactions'));
    }

    public function manageBalance()
    {
        return view('backend.admin.user.manage_balance');
    }

    public function balanceOperation(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'amount' => 'bail|required|numeric|min:1',
        ]);

        $user = User::where('username', $request->username)->first();
        $setting = Setting::first();
        if ($user) {
            if ($request->op == "add") {
                $user->balance += $request->amount;
                $message = $request->amount . ' ' . $setting->currency . " added to " . $user->username . " balance";
            } else {
                if ($user->balance < $request->amount) {
                    return back()->with('error', 'Doesn\'t have balance!!!')->withInput();
                } else {
                    $user->balance -= $request->amount;
                    $message = $request->amount . ' ' . $setting->currency . " subtracted from " . $user->username . " balance";
                }
            }
            $trx = new Transaction();
            $trx->user_id = $user->id;
            $trx->trx_num = Str::random(12);
            if ($request->op == 'add') {
                $trx->trx_type = true;
                $trx->details = $request->amount . ' ' . $setting->currency . ' recharged by admin';
            } else {
                $trx->trx_type = false;
                $trx->details = $request->amount . ' ' . $setting->currency . ' substracted by admin';
            }
            $trx->amount = $request->amount;
            $trx->remaining_balance = $user->balance;
            $trx->save();
            $user->save();
            return back()->with('success', $message);
        } else {
            return back()->with('error', 'User doesn\'t exists!!!');
        }

    }

    public function userTransaction($slug)
    {
        $user = User::where('slug', $slug)->first();
        $transactions = $user->transactions()->paginate(10);
        return view('backend.admin.transaction.user-transaction', compact('user', 'transactions'));
    }
}
