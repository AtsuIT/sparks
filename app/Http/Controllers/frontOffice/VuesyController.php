<?php

namespace App\Http\Controllers\frontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

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

    public function trackingOrder()
    {
        return view('trackings.tracking-order');
    }

    public function trackingOrderResult(Request $request)
    {
        $order = Order::with('trackings','events')->where('uuid',$request->uuid)->first();
        $html = view('trackings.tracking-order-result',['order'=> $order])->render();
        return response()->json(['success'=>true,'data'=>$html]);
    }
}
