<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use User;

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
        if(Auth::user()){
            if(Auth::user()->usertype == 'admin'){
                return $next($request);
            }
            else{
                return redirect('/userdashboard');
            }
        }
        else{
            return redirect('/');
        }
        
    }
}
