<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{
    public function index()
    {
        $interests = Interest::latest()->paginate(10);
        return view('backend.admin.interest.index', compact('interests'));
    }

    public function create()
    {
        return view('backend.admin.interest.create');
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
        $interest = Interest::findOrFail($id);
        return view('backend.admin.interest.edit', compact('interest'));
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

        if (!empty($users)) {
            foreach ($users as $user) {
                $current_balance = $user->balance;
                $give_interest = ($interest->percent * $current_balance) /100;
                $new_balance = $current_balance + $give_interest;
                $user->balance = $new_balance;
                $user->save();
            }
            return back()->with('success', "Interest successfully sent");
        } else {
            return back()->with('error', 'No user found');
        }

    }


}