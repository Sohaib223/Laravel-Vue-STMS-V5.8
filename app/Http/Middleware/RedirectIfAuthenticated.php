<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->role == 1) {
                return redirect('/admin/home');
            }
            elseif (Auth::user()->role == 2 && Auth::user()->is_verified == 1) {
                return redirect('/police/home');
            }
            elseif (Auth::user()->role == 3 && Auth::user()->is_verified == 1) {
                return redirect('/user/home');
            }else{
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
