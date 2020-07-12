<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class ReferController extends Controller
{
    public function index()
    {
        $title = "Referred Users";
        $users = User::whereNotNull('ref_by')->with('user')->latest()->paginate(10);
        return view('backend.admin.user.referred_users', compact('users', 'title'));
    }

    public function referralUsers()
    {
        $title = "Non Referred Users";
        $users = User::whereNull('ref_by')->latest()->paginate(10);
        return view('backend.admin.user.referral_users', compact('users', 'title'));
    }

    public function referralTransactions()
    {
        $title = "Non-Referred User Transactions";
        $trans = Transaction::latest()->with('user')->whereHas('user', function ($user) {
            $user->whereNull('ref_by');
        })->paginate(10);

        return view('backend.admin.user.referral_users_transactions', compact('trans', 'title'));
    }

    public function referredTransactions()
    {
        $title = "Referred User Transactions";
        $trans = Transaction::latest()->with('user')
            ->whereHas('user', function ($user) {
                $user->whereNotNull('ref_by');
            })->paginate(10);

        return view('backend.admin.user.referred_users_transactions', compact('trans', 'title'));
    }

    public function referralUserSearch(Request $request) {
        $request->validate([
            'query' => 'bail|required|string'
        ]);
        $query = $request->input('query');
        $title = $query;
        $user = User::where('username', $query)->whereNull('ref_by')->first();
        if ($user) {
            return view('backend.admin.search.user_search', compact('query', 'user', 'title'));
        } else {
            return back()->with('error', 'User doesn\'t exists!!!');
        }
    }

    public function referredUserSearch(Request $request) {
        $request->validate([
            'query' => 'bail|required|string'
        ]);
        $query = $request->input('query');
        $title = $query;
        $user = User::where('username', $query)->whereNotNull('ref_by')->first();
        if ($user) {
            return view('backend.admin.search.user_search', compact('query', 'user', 'title'));
        } else {
            return back()->with('error', 'User doesn\'t exists!!!');
        }
    }
}
