<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class DemoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->method() == "POST" || $request->method() == "PUT" ||
            $request->method() == "DELETE") {
            return back()->with('error', 'This function is disabled in demo');
        }
        return $next($request);
    }
}
