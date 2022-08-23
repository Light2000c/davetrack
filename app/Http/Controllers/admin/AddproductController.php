<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddproductController extends Controller
{

    // method that returns the add-product view

    public function index(){
        $categories = Category::get();
        return view('admin.addproduct', [
            'categories' => $categories,
        ]);
    }

    /* validates the request gotten from add-product
    page and store product in database */

    public function store(Request $request){
        /*
        validates the upload product form
         */
        $this->validate($request,[
            'product_category'=> 'required',
            'product_name'=> 'required|Unique:products',
            'product_slug'=>  'required|',
            'product_price' => 'required|between:0,99.99',
            'product_description' => 'required|',
            'product_image' => 'required|mimes:jpg,png,jpeg,jfif,',

        ]);

        //sends image file to the a public product folder
        $newImage = time().'-'.$request->product_name.'-'.$request->file('product_image')->guessExtension();

        //checks if the image has been successfully saved to the folder
        if(!$request->file('product_image')->move('products',$newImage)){
          return back()->with('error', 'Something went wrong');
        }

        /*
        send the image details to the database
         */
      $success =  Product::create([
        'product_category' => $request->product_category,
        'tag' => $request->tag,
          'product_name' => $request->product_name,
          'product_slug' => $request->product_slug,
          'product_price' => $request->product_price,
          'product_description' => $request->product_description,
          'product_image' => $newImage,
          'created_by' => Auth::user()->name,
        ]);

      if(!$success){
        return back()->with('error','Something went wrong, Please try again later.');
      }

      return back()->with('success','Product successfully added');

    }
}
