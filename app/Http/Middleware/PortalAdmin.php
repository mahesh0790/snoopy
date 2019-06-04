<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PortalAdmin
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
        
            if(Auth::user()->role == 'super' || Auth::user()->role == 'portal'){
            return $next($request);
            }
        
        abort(403);
    }
}
