<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $transactions = $user->transactions()->latest()->paginate(10);
        return view('backend.user.dashboard', compact('transactions'));
    }

    public function refUsers() {
        $refUsers = Auth::user()->referredusers()->latest()->paginate(10);
        return view('backend.user.referred_user', compact('refUsers'));
    }


}
