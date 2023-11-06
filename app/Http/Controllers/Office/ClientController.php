<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Meeting;
use App\User;
use Auth;

class ClientController extends Controller
{
    //client home

    public function home(){
        return view('client.home');
    }

    //client schedule pagee

    public function schedule(){
        $members=User::where('office',Auth::user()->office)->where('name','!=',Auth::user()->name)->get();
        $withme=Meeting::where('office',Auth::user()->office)->where('participant',Auth::user()->name)->get();
        $meets=Meeting::where('office',Auth::user()->office)->where('creator',Auth::user()->name)->get();
        return view('client.schedule',compact('members','withme','meets'));
    }
}
