<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.user.profile');
    }

    public function updateProfile(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => "bail|required|string",
            "username" => "bail|string|unique:users,id,:id",
            "email" => "bail|required|email|unique:users,id,:id",
            "phone" => "bail|required",
            "address_1" => "bail|required|string",
            "address_2" => "bail|nullable|string",
            "country" => "bail|required",
            'city' => "bail|required",
            'postcode' => "bail|required|numeric",
        ]);

        if ($validate->fails()) {
            return back()->with('errors', $validate->messages()->all()[0])->withInput();
        }
        $user = User::findOrFail(Auth::id());
        $user->profile()->name = $request->name;
        $user->username = Auth::user()->username;
        $user->email = Auth::user()->email;
        $user->profile()->phone = $request->phone;
        $user->profile()->adress_1 = $request->addess_1;
        $user->profile()->adress_2 = $request->addess_2;
        $user->profile()->country = $request->country;
        $user->profile()->city = $request->city;
        $user->profile()->postcode = $request->postcode;
        $user->save();
        return back()->with('success', 'User profile has been successfully updated');

    }

    public function updateProfileImage(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "image" => "bail|image|max:3096",
        ], [
            "image.max" => "Maximum file size to upload is 3MB (3096 KB). If you are uploading a photo, try to reduce its resolution to make it under 3MB",
        ]);
        if ($validate->fails()) {
            return back()->with("toast_error", $validate->messages()->all()[0])->withInput();
        }

        try {
            $user = User::findOrFail(Auth::id());
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $slug = Str::slug(Auth::user()->name);
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('profile')) {
                    Storage::disk('public')->makeDirectory('profile');
                }
                //delete old image from slider directory
                if (Storage::disk('public')->exists('profile/' . $user->image)) {
                    Storage::disk('public')->delete('profile/' . $user->image);
                }

                $profile = Image::make($image)->resize(260, 260)->save();
                Storage::disk('public')->put('profile/' . $imagename, $profile);
            } else {
                $imagename = $user->image;
            }
            $user->image = $imagename;
            $user->save();
            notify()->success('Image successfully updated...');
            return back();
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back();
        }

    }

    public function updatePassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        if ($validate->fails()) {
            return back()->with('toast_error', $validate->messages()->all()[0])->withInput();
        }

        $hashedPassword = Auth::user()->getAuthPassword();
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                notify()->success('Password successfully changed...');
                return redirect(route('login'))->with(Auth::logout());
            } else {
                return back()->with("toast_error", "New password can't be the same as old password !");
            }
        } else {
            return back()->with("toast_error", "Current password does not matched!!!");
        }
    }
}
