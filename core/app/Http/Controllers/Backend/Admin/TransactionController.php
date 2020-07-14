<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\AddMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
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
        if (!$user) {
            return back()->with('error', 'User doesn\'t exists!!!');
        }
        if ($request->op == "add") {
            $user->balance += $request->amount;
            $message = $request->amount . ' ' . $setting->currency . " added to " . $user->username . " balance";
            $details = [
                'greeting' => 'Hi ' . $user->name,
                'body' => 'You have received ' . $request->amount . ' ' . $setting->currency . ' for recharged.',
                'user_id' => $user->id,
            ];
            Notification::send($user, new AddMoney($details));
        } else {
            if ($user->balance < $request->amount) {
                return back()->with('error', 'Doesn\'t have balance!!!')->withInput();
            } else {
                $user->balance -= $request->amount;
                $message = $request->amount . ' ' . $setting->currency . " subtracted from " . $user->username . " balance";

                $subject = "You account has been debited by admin";
                $mailMessage = "Your account has been debited by " . $request->amount . ' ' .
                    $setting->currency;
                sendMail($user->email, $subject, $mailMessage);
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
    }

    public function userTransaction($slug)
    {
        $user = User::where('slug', $slug)->first();
        $title = $user->name . ' Transactions';
        $transactions = $user->transactions()->paginate(10);
        return view('backend.admin.transaction.user-transaction', compact('user', 'transactions', 'title'));
    }

    public function transactionSearch(Request $request)
    {
        $request->validate([
            'query' => 'bail|required|string'
        ]);
        $query = $request->input('query');
        $title = $query;
        $trxs = Transaction::where('trx_num', $query)->get();
        if ($trxs->isEmpty()) {
            return back()->with('error', 'Invalid transaction ID!!!');
        }
        return view('backend.admin.search.transaction_search', compact('query', 'trxs', 'title'));
    }
}
