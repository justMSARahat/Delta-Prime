<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard == "customer" && Auth::guard('customer')->check()) {
            return redirect('/customer/home');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

    }
}
