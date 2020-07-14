<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;

class TrackController extends Controller
{
    public function index()
    {
        $title = "User Ip Logs";
        $logs = Log::latest()->with('user')->paginate(10);
        return view('backend.admin.track', compact('logs', 'title'));
    }
}
