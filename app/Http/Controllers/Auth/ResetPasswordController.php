<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
use Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    ///reset 

    public function reset(Request $request){
        $this->validate($request,[
            'token'=>'required',
            'email'=>'required|email',

            'password'=>'required|confirmed',
        ]);

        if($request->token){
            $password=Hash::make($request->password);
          
            $user=User::where('email',$request->email)->exists();

                if($user){
                    $resetuser=User::where('email',$request->email)->update([
                        'password'=>$password
                    ]);
                    //return to office of user 

                    $office=User::where('email',$request->email)->value('office');

                    return Redirect::to('/')->with('success','Password was successfully reset');

                 
                }

                else{
                    return back()->with('error','Invalid email Address');
                }
           
        }

        else{
            return back()->with('error','Unauthorized request');
        }
    }
}
