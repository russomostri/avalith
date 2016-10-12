<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        
        /*
        if($this->auth->guest()){
            return redirect()->back();
        }
        */
        //dd($role);
        $roles = explode('|', $role);

        //dd($roles);
        $user = auth::user();
        $cont = 0;  

        foreach($roles as $role){

           /* if($user->user_type == $role){

                return $next($request);
            }*/

            if($user->hasRole( $role)){

                return $next($request);
            }

            $cont ++;
        }
        //dd($cont);
         return abort('404');
    }
}
