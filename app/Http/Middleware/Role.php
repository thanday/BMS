<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $admin, $user)
{
   // where $admin= 0 & $guest = 1
   if (Auth::user()->role == $admin) { // if the current role is Administrator
       return $next($request);
   } else if (Auth::user()->role === $user) {
       abort(403, "Cannot access to restricted page");
   }  
    
}
}