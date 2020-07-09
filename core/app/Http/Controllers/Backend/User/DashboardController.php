<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['setting'] = Setting::first();
        $data['user'] = Auth::user();
        $data['transactions'] = $data['user']->transactions()->latest()->paginate(10);
        $data['total_transaction'] = $data['user']->transactions()->sum('amount');
        $data['total_send_money'] = $data['user']->transactions()->where('trx_type', 0)->sum('amount');
        $data['refer_bonus'] = Bonus::where('user_id', $data['user']->id)->sum('refer_bonus');
        $data['transfer_bonus'] = Bonus::where('user_id', $data['user']->id)->sum('transfer_bonus');
        $data['total_bonus'] = $data['refer_bonus'] + $data['transfer_bonus'];

        return view('backend.user.dashboard')->with($data);
    }

    public function refUsers() {
        $refUsers = Auth::user()->referredusers()->latest()->paginate(10);
        return view('backend.user.referred_user', compact('refUsers'));
    }


}
