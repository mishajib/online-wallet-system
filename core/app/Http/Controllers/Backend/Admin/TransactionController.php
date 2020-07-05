<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
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

    public function addBalancePage()
    {
        $users = User::with('transaction')->latest()->get();
        return view('backend.admin.user.add_balance', compact('users'));
    }

    public function addBalance(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'amount' => 'bail|required|numeric|min:1',
        ]);

        $user = User::findOrFail($request->username);
        $user->balance += $request->amount;
        $user->save();
        $user->transaction()->create([
            'trx_num' => Str::random(12),
            'trx_type' => "Balance add from admin",
            'amount' => $request->amount,
            'remaining_balance' => $user->balance,
            'details' => "Balance added to " . $user->username . " balance",
        ]);
        return back()->with('success', "Balance added successful");
    }

    public function userTransaction($slug)
    {
        $user = User::where('slug', $slug)->first();
        $transactions = $user->transaction()->paginate(10);
        return view('backend.admin.transaction.user-transaction', compact('user', 'transactions'));
    }
}
