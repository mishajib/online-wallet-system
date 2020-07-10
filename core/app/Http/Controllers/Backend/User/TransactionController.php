<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $bonuses = Bonus::whereNotNull('refer_bonus')->where('user_id',
            Auth::user()->id)
            ->latest()
        ->paginate(10);
        return view('backend.user.refer_bonus', compact('bonuses'));
    }

    public function transferBonus()
    {
        $bonuses = Bonus::whereNotNull('transfer_bonus')->where
        ('user_id', Auth::user()->id)->latest
    ()->paginate(10);
        return view('backend.user.transfer_bonus', compact('bonuses'));
    }
}
