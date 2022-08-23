<?php

namespace App\Http\Controllers\admin;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /*
    returns a view which displays all users cart
     */
    public function index(){
        $carts = Cart::orderBy('created_at', 'Desc')->paginate(7);
        return view('admin.usercart',[
            'carts'=> $carts,
        ]);
    }

    /*
    method to delete user carts from cart table
    */
    public function delete(Cart $cart){
        //get cart from carts table
        $carts = Cart::where('id', $cart->id);

        //delete cart from carts table
       $success = $carts->delete();

       //returns back with cart is successfully deleted
        if($success){
         // Alert::success('message', 'yes it worked');
         return back();
        }else{
         return back();
        }
     }
}
