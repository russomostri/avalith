<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class SalesmanMiddleware
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
        //dd($next($request));
        if(Auth::user()->isSalesman()){
            return $next($request);
        }
        
        
    }
}
