<?php

namespace App\Http\Controllers\payment;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('payment\checkout',[
            'carts' => $carts,
        ]);
    }
}
