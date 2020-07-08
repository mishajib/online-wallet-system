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
        $data['setting'] = Setting::first();
        $data['total_referred_users'] = User::whereNotNull('ref_by')->count();
        $data['transactions'] = Transaction::latest()->take(15)->get();
        return view('backend.admin.dashboard')->with($data);
    }
}
