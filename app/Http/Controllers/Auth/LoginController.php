<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\User;

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
    protected function redirectTo()
    {
        // dd(Auth::user()->role);
        if (Auth::user()->role == 1) {
            return '/';
        } elseif (Auth::user()->role == 2 && Auth::user()->is_verified == 1) {
            return '/';
        } elseif (Auth::user()->role == 3 && Auth::user()->is_verified == 1) {
            return '/';
        } else {
            return 'login';
        }
    }
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function credentials(Request $request)
    {


        return array_merge($request->only($this->username(), 'password'), ['is_verified' => 1]);
    }
}
