<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

         abort(403, 'You dont have access, Please contact Administrator!' );

         if (auth()->check() && auth()->user()->isUser()) {
            return $next($request);
        }

         abort(403 );
    }
}
