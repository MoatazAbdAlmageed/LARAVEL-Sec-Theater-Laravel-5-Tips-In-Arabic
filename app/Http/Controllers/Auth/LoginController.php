<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function field()
    {
        return filter_var(request()->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    }


    public function login(Request $request)
    {
        if (Auth::attempt([
            $this->field() => request()->username,
            'password' => request()->password,
        ])) {
            return redirect()->intended('/');

        } else {
            return redirect()->back()->withInput('username');
        }
    }
}
