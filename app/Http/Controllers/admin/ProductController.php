<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // returns view which display the list of products in database

    public function index()
    {
        $products = Product::orderBy('created_at', 'Desc')->paginate(15);
        return view('admin.products', [
            'products' => $products
        ]);
    }

    // function to delete a product

    public function delete(Product $product)
    {
        //get product from and store in a variable $product
        $products = Product::where('id', $product->id);

        //delete product from data base
        $success = $product->delete();

        //returns back with a success message or an error message
        if (!$success) {
            return back()->with('error', 'Soemthing went wrong, Please try again later.');
        }
        return back()->with('success', 'Product has been successfully deleted.');
    }
}
