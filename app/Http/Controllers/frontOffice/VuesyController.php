<?php

namespace App\Http\Controllers\frontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VuesyController extends Controller
{
    //
    public function index(Request $request){
        if(view()->exists($request->path())){
            return view($request->path());
        }
        return view('error-404-basic');
    }
    
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }
}