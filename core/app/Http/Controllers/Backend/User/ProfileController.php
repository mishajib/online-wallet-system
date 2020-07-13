<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
        $title = "User Profile";
        return view('backend.user.profile', compact('title'));
    }

    public function updateProfile(UserRequest $request)
    {
        $request->validated();
        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->username = Auth::user()->username;
        $user->email = Auth::user()->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->postcode = $request->postcode;
        $subject = "Profile updation notification";
        $message = view('emails.profile_update');
        sendMail(Auth::user()->email, $subject, $message);
        $user->save();
        return back()->with('success', 'User profile has been successfully updated');

    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            "image" => "bail|image|max:3096",
        ], [
            "image.max" => "Maximum file size to upload is 3MB (3096 KB). If you are uploading a photo, try to reduce its resolution to make it under 3MB",
        ]);

        $user = User::findOrFail(Auth::id());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $slug = Str::slug(Auth::user()->username);
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('assets/uploads/profile')) {
                mkdir('assets/uploads/profile', 0777, true);
            }
            if (file_exists('assets/uploads/profile/' . $user->image)) {
                unlink('assets/uploads/profile/' . $user->image);
            }
            $image->move('assets/uploads/profile/', $imagename);
            $user->image = $imagename;
        }
        $user->save();
        return back()->with('success', 'User image successfully updated');
    }

    public function updatePassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        if ($validate->fails()) {
            return back()->with('error', $validate->messages()->all()[0])->withInput();
        }

        $hashedPassword = Auth::user()->getAuthPassword();
        if (!Hash::check($request->old_password, $hashedPassword)) {
            return back()->with("error", "Current password does not matched!!!");
        }
        if (Hash::check($request->password, $hashedPassword)) {
            return back()->with("error", "New password can't be the same as old password!");
        }
        $user = User::findOrFail(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash('success', 'User password successfully changed');
        return redirect(route('login'))->with(Auth::logout());
    }

    public function referPage()
    {
        $title = "Refer a friend";
        return view('backend.user.refer', compact('title'));
    }

    public function sendLink(Request $request)
    {
        $request->validate([
            'refer_link' => 'bail|required|email',
        ]);
        $subject = "Join Online Wallet System by this link";
        $message = view('emails.refer_mail');
        sendMail($request->refer_link, $subject, $message, Auth::user()->email);
        return back()->with('success', "Referral link sent successfully");
    }
}
