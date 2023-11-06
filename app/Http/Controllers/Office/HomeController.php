<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //office home dashboard

    public function __construct()
    {
        $this->middleware(['auth:office']);
    }

    public function officehome(){
        return view('office.home');
    }
}
