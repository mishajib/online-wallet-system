<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('backend.admin.setting', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'site_name' => "bail|string|required",
            'fixed_charge' => "bail|numeric|required",
            'percent_charge' => "bail|numeric|required",
            'join_bonus' => "bail|numeric|required",
            'currency' => "bail|string|required",
        ]);

        $setting = Setting::findOrFail($id);
        $setting->site_name = $request->site_name;
        $setting->fixed_charge = $request->fixed_charge;
        $setting->percent_charge = $request->percent_charge;
        $setting->join_bonus = $request->join_bonus;
        $setting->currency = $request->currency;
        $setting->save();
        return back()->with('success', 'Site setting successfully updated');
    }
}
