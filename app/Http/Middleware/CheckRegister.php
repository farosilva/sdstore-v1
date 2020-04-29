<?php

namespace App\Http\Middleware;

use Closure;

class CheckRegister
{
    public function handle($request, Closure $next)
    {
        if(auth()->check() == false or count(auth()->user()->contacts) && count(auth()->user()->addresses) > 0){
            return $next($request);
        }else{
            return redirect()->route('register');
        }

        if(!auth()->check() && count(auth()->user()->contacts) && count(auth()->user()->addresses) > 0){
            return $next($request);
        }else{
            return redirect()->route('register');
        }

    }
}
