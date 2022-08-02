<?php

namespace App\Http\Controllers\products;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    public function index()
    {

        $carts = Cart::where('user_id', Auth::user()->id)->paginate(5);
        return view('products\cart', [
            'carts' => $carts,
        ]);
    }

    public function store(Product $product, Request $request)
    {

        $new_code = null;

        $transactionRef = sprintf("%06d", mt_rand(1, 999999));

        $cart_code = Cart::where('user_id', $request->user()->id)->first();

        if ($cart_code) {
            $new_code = $cart_code->code;
        } else {
            $new_code = $transactionRef;
        }

        if($product->hasCart(Auth::user())){
            return abort(403, 'Too many actions');
       }

        $product->cart()->create([
            'user_id' => $request->user()->id,
            'code' => $new_code,
        ]);

        return back();
    }

    public function delete(Product $product, Request $request)
    {

        $request->user()->cart()->where('product_id', $product->id)->delete();

        return back();
    }

    public function update(Product $product, Request $request)
    {

        $request->validate([
            'quantity' => 'required',
        ]);


        $success =  $request->user()->cart()->where('product_id', $product->id)->update([
            'quantity' => $request->quantity,
        ]);

        if (!$success) {
            return back()->with('Error', 'Soemthing went wrong, please try again later.');
        }

        return back()->with('success', 'Your cart has been successfully updated.');
    }
}
