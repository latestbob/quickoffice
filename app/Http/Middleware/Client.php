<?php

namespace App\Http\Middleware;

use Closure;

class Client
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
        if(auth()->user()->position == 'client'){
            return $next($request);
        }
        

        return redirect(route('office.home'))->with('error',"Only Client can access!");
    }
}
