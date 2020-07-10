<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('user')->latest()->paginate(10);
        return view('backend.admin.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $transactions = $user->transactions()->paginate(10);
        $referredUsers = $user->referredusers()->paginate(10);
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
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Password reset successful');
    }

    public function loginUsingId($id)
    {
        $user = Auth::guard('web')->loginUsingId($id);
        if ($user->status == 0) {
            return back()->withInput()->with('error', 'Inactive user');
        }
        return redirect()->route('user.dashboard')->with('success', 'Login successful as ' . Auth::guard('web')->user()->name);
    }

    public function active($id)
    {
        $user = User::findOrFail($id);
        if ($user->status == false) {
            $user->status = true;
            $user->save();
            Session::flash('success', 'User has been activated');
        } else {
            Session::flash('error', 'User is already been activated');
        }
        return back();
    }

    public function deactive($id)
    {
        $user = User::findOrFail($id);
        if ($user->status == true) {
            $user->status = false;
            $user->save();
            return back()->with('success', 'User has been deactivated');
        } else {
            return back()->with('error', 'User is already been deactivated');
        }

    }


}
