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
        $title = "All Transactions";
        $transactions = Transaction::with('user')->latest()->paginate(10);
        return view('backend.admin.transaction.transaction', compact('transactions', 'title'));
    }

    public function manageBalance()
    {
        $title = "Add / Subtract Balance";
        return view('backend.admin.user.manage_balance', compact('title'));
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

                $sender_email = "no-reply@ows.com";
                $receiver_email = $user->email;
                $subject = "You account has been credited by admin";
                $mailMessage = "You have received " . $request->amount . ' ' .
                    $setting->currency . ' for recharged.';
                $headers = "From: $setting->site_name <$sender_email> \r\n";
                $headers .= "Reply-To: <$receiver_email> \r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=utf-8\r\n";
                @mail($receiver_email, $subject, $mailMessage, $headers);
            } else {
                if ($user->balance < $request->amount) {
                    return back()->with('error', 'Doesn\'t have balance!!!')->withInput();
                } else {
                    $user->balance -= $request->amount;
                    $message = $request->amount . ' ' . $setting->currency . " subtracted from " . $user->username . " balance";

                    $sender_email = "no-reply@ows.com";
                    $receiver_email = $user->email;
                    $subject = "You account has been debited by admin";
                    $mailMessage = "Your account has been debited by " . $request->amount . ' ' .
                        $setting->currency;
                    $headers = "From: $setting->site_name <$sender_email> \r\n";
                    $headers .= "Reply-To: <$receiver_email> \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
                    @mail($receiver_email, $subject, $mailMessage, $headers);
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
        $title = $user->name . ' Transactions';
        return view('backend.admin.transaction.user-transaction', compact('user', 'transactions', 'title'));
    }

    public function transactionSearch(Request $request) {
        $request->validate([
            'query' => 'bail|required|string'
        ]);
        $query = $request->input('query');
        $title = $query;
        $trxs = Transaction::where('trx_num', $query)->get();
        if (!$trxs->isEmpty()) {
            return view('backend.admin.search.transaction_search', compact('query', 'trxs', 'title'));
        } else {
            return back()->with('error', 'Invalid transaction ID!!!');
        }
    }
}
