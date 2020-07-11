<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['total_transactions'] = Transaction::sum('amount');
        $data['total_users'] = User::count();
        $data['revenue'] = User::sum('balance');
        $data['total_referred_users'] = User::whereNotNull('ref_by')->count();
        $data['transactions'] = Transaction::latest()->take(15)->with('user')->get();
        $data['title'] = 'Admin Dashboard';
        return view('backend.admin.dashboard')->with($data);
    }
}
