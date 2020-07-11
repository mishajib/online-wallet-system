<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;

class TrackController extends Controller
{
    public function index()
    {
        $logs = Log::latest()->with('user')->paginate(10);
//        foreach ($logs as $log) {
//            $location = \Location::get($log->ip);
//    }
//    dd($location);
        $title = "User Ip Logs";
        return view('backend.admin.track', compact('logs', 'title'));
    }
}
