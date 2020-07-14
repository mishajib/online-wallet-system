<?php

namespace App\Http\Controllers\Backend\Admin\Authentication;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function username()
    {
        return 'username';
    }

    public function showLoginForm()
    {
        $title = "Admin Login";
        if (Auth::guard('admin')->user()) {
            return redirect(route('admin.dashboard'));
        }
        return view('backend.admin.authentication.login', compact('title'));
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    public function authenticated(Request $request, $user)
    {
        if ($user) {
            Session::flash('success', $user->username . ' welcome back!');
            return redirect()->route('admin.dashboard');
        } else {
            return redirect(route('admin.login.page'));
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.page')->with('success', 'Logged out successfully...');
    }
}
