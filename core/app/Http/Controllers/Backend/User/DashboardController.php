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
        $transactions = $user->transaction()->latest()->paginate(10);
        return view('backend.user.dashboard', compact('transactions'));
    }


}
