<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;


class AdminMiddleware
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
        //dd($request);

        if(Auth::user()->isAdmin())
            return $next($request);
       return abort('404');
       
    }
}
