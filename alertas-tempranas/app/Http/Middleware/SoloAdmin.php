<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
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
        if(auth::user()->fullacces == 'yes'){
            return $next($request);
        }else if(auth::user()->fullacces == 'no'){
            return redirect('tecnico');
        } else if(auth::user()->fullacces == 'revisor'){
            return redirect('tecnico');
        }
    }
    public function terminate($request, $response)
    {
        switch(auth::user()->fullacces){
            case('yes'):
                return redirect('/datos');
             //si es admin redirige a home
            case('no'):
                return redirect('/tecnico'); //si es user redirige a user
            case('revisor'):return redirect('/tecnico');
        }
    }
}
