<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Visitor
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
        if (Auth::check() && Auth::user()->privilege=='visitor') {
            return $next($request);
        } else {
            return redirect('/login');
        }
        
    }
}
