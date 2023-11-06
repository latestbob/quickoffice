<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //////////////////////////////////////////////////

        switch ($guard){
            case 'office':  // for shop login
                if(Auth::guard($guard)->check()){
                    return redirect()->route('office.home');
                }
                break;
            
            case 'admin': //for admin
                if(Auth::guard($guard)->check()){
                    return redirect()->route('mainadmin.home');
                }
                break;

            
            default:  // default for customer login
                if(Auth::guard($guard)->check()){
                    //return redirect()->route('home');

                    if(Auth::user()->position =='admin'){
                        return redirect()->route('admin.home');
                    }
                    elseif(Auth::user()->position =='account'){
                        return redirect()->route('account.home');
                    }
                    elseif(Auth::user()->position =='staff'){
                        return redirect()->route('home');
                    }

                    elseif(Auth::user()->position =='client'){
                        return redirect()->route('client.home');
                    }

                }
                break;
        }

        return $next($request);
    }
}
