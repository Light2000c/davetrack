<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // returns the view which displays product on the wishlis
    public function index(){
        $wishes = wishlist::where('user_id', Auth::user()->id)->paginate(5);
        return view('products.wishlist',[
            'wishes'=> $wishes,
        ]);
    }

    // validate the user request and add product to wishlist
    public function store(Request $request,Product $product){

        //create a new instance of wishlist

        if($product->hasWishlist(Auth::user())){
          return back();
        }
      $success =  $product->wishlist()->create([
            'user_id'=> $request->user()->id,
        ]);

        if($success){
            return back();
        }
    }

    //delete product fromuser wishlist
    public function delete(Product $product){
//remove product fromuser wishlist
        $product->wishlist()->where('user_id', Auth::user()->id)->delete();

        return back();
    }
}
