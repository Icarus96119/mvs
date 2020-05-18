<?php

namespace MVS\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class Status
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
        if (Auth::user()->admin == 0) {
            return redirect('/home');
        }
        return $next($request);
    }
}
