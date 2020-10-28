<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class UserMV
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
        if (isset(Auth::user()->id) && Auth::user()->role == 2 ) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
