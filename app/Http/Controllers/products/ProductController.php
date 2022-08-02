<?php

namespace App\Http\Controllers\products;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

  public function index(){
    $categories = Category::get();
    $products = Product::paginate(8);

    return view('products\product',[
        'products' => $products,
        'categories'=> $categories,
    ]);
  }
}
