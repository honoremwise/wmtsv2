<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        if ($guard == "registror" && Auth::guard($guard)->check()) {
          return redirect()->route('registror.dashboard');
        }
        if ($guard == "admin" && Auth::guard($guard)->check()) {
          return redirect()->route('admin.dashboard');
        }
        if ($guard == "lecturer" && Auth::guard($guard)->check()) {
          return redirect()->route('lecturer.dashboard');
        }
        if ($guard == "head" && Auth::guard($guard)->check()) {
          return redirect()->route('program.dashboard');
        }
        if ($guard == "student" && Auth::guard($guard)->check()) {
          return redirect()->route('home');
        }
        if ($guard == "admission" && Auth::guard($guard)->check()) {
          return redirect()->route('admissions.dashboard');
        }
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
