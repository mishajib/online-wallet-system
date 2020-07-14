<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InterestMail;
use App\Models\Interest;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InterestController extends Controller
{
    public function index()
    {
        $title = "All Interest";
        $interests = Interest::latest()->paginate(10);
        return view('backend.admin.interest.index', compact('interests', 'title'));
    }

    public function create()
    {
        $title = "Create Interest";
        return view('backend.admin.interest.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|string',
            'percent' => 'bail|required|numeric',
        ]);

        $interest = new Interest();
        $interest->name = $request->name;
        $interest->percent = $request->percent;
        $interest->save();
        return redirect()->route('admin.interest.all')->with('success', 'Interest added successfully');
    }

    public function edit($id)
    {
        $title = "Edit Interest";
        $interest = Interest::findOrFail($id);
        return view('backend.admin.interest.edit', compact('interest', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required|string',
            'percent' => 'bail|required|numeric',
        ]);

        $interest = Interest::findOrFail($id);
        $interest->name = $request->name;
        $interest->percent = $request->percent;
        $interest->save();
        return redirect()->route('admin.interest.all')->with('success', 'Interest updated successfully');
    }

    public function destroy($id)
    {
        $interest = Interest::findOrFail($id);
        $interest->delete();
        return back()->with('success', 'Interest deleted successfully');
    }

    public function give($id)
    {
        $interest = Interest::findOrFail($id);
        $users = User::all();
        $setting = Setting::first();

        if ($users->isEmpty()) {
            return back()->with('error', 'No user found');
        }
        foreach ($users as $user) {
            $current_balance = $user->balance;
            $give_interest = ($interest->percent * $current_balance) / 100;
            $new_balance = $current_balance + $give_interest;
            $user->balance = $new_balance;

            $trx = new Transaction();
            $trx->user_id = $user->id;
            $trx->trx_num = Str::random(12);
            $trx->trx_type = true;
            $trx->details = $give_interest . ' ' . $setting->currency . ' received ' . Str::lower($interest->name);
            $trx->amount = $give_interest;
            $trx->remaining_balance = $user->balance;
            $trx->interest = true;

            Mail::to($user)->send(new InterestMail($give_interest, $setting));
            sleep(1);

            $trx->save();
            $user->save();

        }
        return back()->with('success', "Interest successfully sent");
    }

    public function transactions()
    {
        $title = "Interest Transactions";
        $trxs = Transaction::where('interest', true)->latest()->paginate(10);
        return view('backend.admin.interest.interest_transactions', compact('trxs', 'title'));
    }

}
