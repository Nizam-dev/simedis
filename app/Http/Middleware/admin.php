<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class admin
{

    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect('/login');
        }

        if(Auth::user()->role == "Admin"){
            return $next($request);
        }else{
            return redirect('/');
        }
        
    }
}
