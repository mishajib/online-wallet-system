<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;

class TrackController extends Controller
{
    public function index()
    {
        $logs = Log::latest()->paginate(10);
//        foreach ($logs as $log) {
//            $location = \Location::get($log->ip);
//    }
//    dd($location);
        return view('backend.admin.track', compact('logs'));
    }
}
