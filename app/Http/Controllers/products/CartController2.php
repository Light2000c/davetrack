<?php

namespace App\Http\Controllers\products;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController2 extends Controller
{
   public function index(){}

   public function addToCart(Request $request){
    $new_code = null;

    $request->validate([
        'userId' => 'required',
        'productId' => 'required',
    ]);

    $transactionRef = sprintf("%06d", mt_rand(1, 999999));

    $cart_code = Cart::where('user_id', $request->userId)->first();

    if ($cart_code) {
        $new_code = $cart_code->code;
    } else {
        $new_code = $transactionRef;
    }

    $user = User::where('id', $request->userId)->first();
    $product = Product::where('id', $request->productId)->first();

    if($product->hasCart($user)){
        return json_encode(array('error'=> 'something went wrong'));
   }

   $success = Cart::create([
        'user_id' => $request->userId,
        'product_id' => $request->productId,
        'code' => $new_code,
    ]);

    if($success){
      return json_encode(array('success'=> true));
    }else{
        return json_encode(array('success'=> false));
    }

   }

}
