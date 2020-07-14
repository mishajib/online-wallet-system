<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $title = "Refer Bonus";
        $bonuses = Bonus::whereNotNull('refer_bonus')->where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('backend.user.refer_bonus', compact('bonuses', 'title'));
    }

    public function transferBonus()
    {
        $title = "Transfer Bonus";
        $bonuses = Bonus::whereNotNull('transfer_bonus')->where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('backend.user.transfer_bonus', compact('bonuses', 'title'));
    }

    public function searchTransaction(Request $request)
    {
        $request->validate([
            'query' => 'bail|required|string'
        ]);
        $query = $request->input('query');
        $title = $query;
        $trxs = Transaction::where('trx_num', $query)->where('user_id', Auth::user()->id)->get();
        if ($trxs->isEmpty()) {
            return back()->with('error', 'No transaction found!!!');
        }
        return view('backend.user.search_transaction', compact('query', 'trxs', 'title'));
    }
}
