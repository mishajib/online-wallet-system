<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;

class ReferController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('ref_by')->with('user')->latest()->paginate(10);
        return view('backend.admin.user.referred_users', compact('users'));
    }

    public function referralUsers()
    {
        $users = User::whereNull('ref_by')->latest()->paginate(10);
        return view('backend.admin.user.referral_users', compact('users'));
    }

    public function referralTransactions()
    {
        $users = User::whereNull('ref_by')->get();
        foreach ($users as $user) {
            $trans = Transaction::where('user_id', $user->id)->with('user')->latest()->paginate(10);
        }

        return view('backend.admin.user.referral_users_transactions', compact('trans'));
    }

    public function referredTransactions()
    {
//        $users = User::whereNotNUll('ref_by')->get();
//        foreach ($users as $user) {
//            $trans = Transaction::where('user_id', $user->id)->with('user')->latest()->paginate(10);
//        }


         $trans = Transaction::with('user')->latest()
            ->whereHas('user', function ($user) {
             $user->where('ref_by', '!=', NULL);
            })->paginate(10);

        return view('backend.admin.user.referred_users_transactions', compact('trans'));
    }
}