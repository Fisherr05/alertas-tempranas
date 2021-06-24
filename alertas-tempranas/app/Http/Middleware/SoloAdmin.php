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
        switch(auth::user()->fullacces){
            case('yes'):
                return $next($request);
             //si es admin redirige a home
            case('no'):
                return redirect('tecnico');
                return redirect('datos'); //si es user redirige a user
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
        }
    }
}
