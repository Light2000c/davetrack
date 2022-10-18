<?php

namespace App\Http\Controllers\products;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index($category = null, $tag = null, $price = null)
    {

        $products = "";
        if (!$category && !$tag && !$price) {
            $products = Product::paginate(8);
        } elseif ($category != null && $tag == null && $price == null) {
            $category = $category;
            $products = Product::where('product_category', $category)->paginate(8);
        }
         elseif ($category != 'category' && $tag == 'tag' && $price == null) {
            $category = $category;
            $products = Product::where('product_category', $category)->paginate(8);
        } elseif ($category == 'category' && $tag != 'tag' && $price == null) {

            $category = $category;
            $products = Product::where('tag', $tag)->paginate(8);
        } elseif ($category == 'category' && $tag == 'tag' && $price != null) {
            $category = $category;
            $products = Product::where('product_price', '<=', $price)->paginate(8);
        } elseif ($category != 'category' && $tag != 'tag' && $price == null) {

            $category = $category;
            $products = Product::where('product_category', $category)->where('tag', $tag)->paginate(8);
        } elseif ($category != 'category' && $tag == 'tag' && $price != null) {

            $category = $category;
            $products = Product::where('product_category', $category)->where('product_price', '<=', $price)->paginate(8);
        } elseif ($category != 'category' && $tag == 'tag' && $price == null) {

            $category = $category;
            $products = Product::where('tag', $tag)->where('product_price', '<=', $price)->paginate(8);
        } else {
            $products = Product::paginate(8);
        }



        $tags = Tag::get();
        $categories = Category::get();
        return view('products.product', [
            'products' => $products,
            'categories' => $categories,
            'tags' => $tags,
            'c1' => $category,
            't1' => $tag,
            'p1' => $price,
        ]);
    }

    public function filter(Request $request)
    {
        $price = "";
        $category = "";
        $tag = "";

        if ($request->range == 0) {
            $price = $price;
        } else {
            $price = $request->range;
        }

        if ($request->check == "") {
            $category = 'category';
        } else {
            $category = $request->check;
        }

        if ($request->check2 == "") {
            $tag = 'tag';
        } else {
            $tag = $request->check2;
        }

        return redirect()->route('main-product', ['category' => $category, 'tag' => $tag, 'price' => $price]);
    }
}
