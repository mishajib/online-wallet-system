<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest:web');
    }

    public function showRegistrationForm($user = null)
    {
        if ($user) {
            $ref_user = User::where('username', $user)->first();
            if (!$ref_user)
            {
                return back()->with('error', 'Invalid referal link!!!');
            }
            return view('auth.register', compact('ref_user'));
        } else {
            $ref_user = 0;
            return view('auth.register', compact('ref_user'));
        }



    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:80'],
            'username' => ['required', 'alpha_num', 'max:40', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
            'city' => ['required'],
            'postcode' => ['required'],
            'refer' => ['alpha_num', 'nullable'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $setting = Setting::first();
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'postcode' => $data['postcode'],
            'balance' => $setting->join_bonus,
            'ref_by' => $referUser->id ?? null,
            'slug' => Str::slug($data['username']),
            'status' => true,
            'password' => Hash::make($data['password']),
        ]);
        $trx_num = Str::random(12);
        Transaction::create([
            'user_id' => $user->id,
            'trx_num' => $trx_num,
            'trx_type' => true,
            'amount' => $setting->join_bonus,
            'remaining_balance' => $user->balance,
            'details' => number_format($setting->join_bonus, 2) . ' ' . $setting->currency . ' received join bonus',
        ]);

        if (!empty($data['refer'])) {
            $referUser = User::where('username', $data['refer'])->first();
            $refer_bonus = $setting->join_bonus * ($setting->refer_bonus/100);
            $referUser->balance += $refer_bonus;
            Transaction::create([
                'user_id' => $referUser->id,
                'trx_num' => $trx_num,
                'trx_type' => true,
                'amount' => $refer_bonus,
                'remaining_balance' => $user->balance,
                'details' => number_format($refer_bonus, 2) . ' ' . $setting->currency . ' received referral bonus',
            ]);
            $bonus = new Bonus();
            $bonus->user_id = $referUser->id;
            $bonus->refer_bonus = $refer_bonus;
            $bonus->transfer_bonus = null;
            $bonus->save();
            $referUser->save();
        }


        return $user;
    }

    public function registered(Request $request, $user)
    {
        if ($user) {
            return redirect(route('verification.notice'))->with('success', 'User registered successfully. Please verify your mail!!!');
        } else {
            return redirect()->route('register');
        }
    }
}
