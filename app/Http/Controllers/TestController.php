<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index(){
        return view('mails\orderMail');
    }
    public function totalPrice($userId){
        $total = 0;
     $carts = Cart::where('user_id', $userId)->get();
     $cart_count = $carts->count();

     foreach ($carts as $cart) {
       $new_price = $cart->product->product_price * $cart->quantity;
       $total = $total + $new_price;
     }

     return json_encode(array('total'=> $total, 'cart_count'=> $cart_count));

    }

    public function quantity(Request $request){

     $this->validate($request,[
    'userId'=> 'required',
    'productId'=> 'required',
    'quantity'=> 'required',
     ]);
     $cart = Cart::where('user_id', $request->userId,)
     ->where('product_id', $request->productId)->first();

    $success = $cart->update([
        'quantity'=> $request->quantity,
     ]);

     return $success;
    }
}
