<?php

namespace App\Http\Controllers\products;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ViewProductController extends Controller
{
    public function index(Product $product){

        $cart="";
        $others = Product::where('product_category', $product->product_category)
        ->where('id', '!=', $product->id)->get();
        if(Auth::user()){
        $cart = $product->cart()->where('user_id', Auth::user()->id)->first();
    }
        return view('products.viewProduct',[
            'product' => $product,
            'cart' => $cart,
            'others' => $others,
        ]);
    }

    public function update(Request $request){


        $cart = Cart::where('id', $request->cartId)->first();

        $success = $cart->update([
            'quantity' => $request->quantity,
        ]);

        if($success){
            return json_encode(array('success'=> true));
        }
    }
}
