<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ReferController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('ref_by')->latest()->paginate(10);
        return view('backend.admin.user.referred_users', compact('users'));
    }

    public function referralUsers()
    {
        $users = User::whereNull('ref_by')->latest()->paginate(10);
        return view('backend.admin.user.referral_users', compact('users'));
    }
}
