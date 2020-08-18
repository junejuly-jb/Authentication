<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMiddleware
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
            if(Auth::user()->usertype == 'user'){
                return $next($request);
            }
            else{
                return redirect('admindashboard');
            }
        }
        else{
            return redirect('/');
        }
        
    }
}
