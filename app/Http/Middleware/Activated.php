<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Activated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->isActive()){
            Auth::logout();
            return redirect()->route('login')->with('warning','Please check your email and verify your email address.');
        }
        View::share('admin',Auth::user());
        return $next($request);
    }
}
