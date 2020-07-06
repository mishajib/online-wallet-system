<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('logs')->latest()->paginate(10);
        return view('backend.admin.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $transactions = $user->transactions()->paginate(10);
        $referredUsers = $user->referreduser()->paginate(10);
        return view('backend.admin.user.show', compact('user', 'transactions', 'referredUsers'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.admin.user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $request->validated();

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $user->save();
        return redirect()->back()->with('success', 'User updated successfully');


    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->password = $request->password;
        $user->save();
        return back()->with('success', 'Password reset successful');
    }


}
