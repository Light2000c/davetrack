<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class productDetails extends Controller
{

    // returns view that displays a particular product
    public function index(Product $product)
    {
        $tags = [
            'new',
            'hot',
        ];
        $category = Category::get();
        return view('admin\product-details', [
            'product' => $product,
            'categories' => $category,
            'tags' => $tags,
        ]);
    }

    // function that updates a product detail
    public function update(Request $request, Product $product)
    {
        /*
        conditional statement to check if the user is update just an image or the whole product data
        */
        if ($request->has('product_image')) {

            //validates the request to update image
            $this->validate($request, [
                'product_image' => 'required|mimes:jpg,png,jpeg,jfif,',

            ]);
            //sends image to a public folder product
            !$newImage = time() . '-' . $request->product_name . '-' . $request->file('product_image')->guessExtension();

            //if image is not successfully saved in the product folder it return back with an error message
            if (!$request->file('product_image')->move('products', $newImage)) {
                return back()->with('error', 'something went wrong please try again later');
            }

            //if successfully save, update the product imageame on databas
            $success = $product->update([
                'product_image' => $newImage,
            ]);

            //if successfully updated on database returns back with a success message or errormessage if not successful
            if (!$success) {
                return back()->with('error', 'Update wasn\'t successful, Please try again later');
            }
            return back()->with('success', 'Updating of product was successful');
        } else {

            //validates the form to update product information

            //checks if product name is same name as old name because the name has to be unique
            if ($product->product_name == $request->product_name) {

                //if product name is same as old name

                //validate the form
                $this->validate($request, [
                    'product_category' => 'required',
                    'product_name' => 'required',
                    'product_slug' => 'required',
                    'product_price' => 'required',
                    'product_description' => 'required',
                ]);

                //get ptoduct and save in a variable product
                $product = Product::where('id', $product->id);

                //update product details on database
                $success = $product->update([
                    'product_category' => $request->product_category,
                    'tag' => $request->tag,
                    'old_price' => $request->old_price,
                    'product_name' => $request->product_name,
                    'product_slug' => $request->product_slug,
                    'product_price' => $request->product_price,
                    'product_description' => $request->product_description,
                    'updated_by' => Auth::user()->name,
                ]);
            } else {
                //if product name is not same as old name

                //validate the form and make product name being sent to be unique

                $this->validate($request, [
                    'product_category' => 'required',
                    'product_name' => 'required|Unique:products',
                    'product_slug' => 'required',
                    'product_price' => 'required',
                    'product_description' => 'required',
                ]);

                //get ptoduct and save in a variable product
                $product = Product::where('id', $product->id);

                //update product details on database
                $success = $product->update([
                    'product_category' => $request->product_category,
                    'tag' => $request->tag,
                    'old_price' => $request->old_price,
                    'product_name' => $request->product_name,
                    'product_slug' => $request->product_slug,
                    'product_price' => $request->product_price,
                    'product_description' => $request->product_description,
                    'updated_by' => Auth::user()->name,
                ]);
            }

            //if product has been successfully or no success return with either a success message or amn error message
            if (!$success) {
                return back()->with('error', 'Update wasn\'t successful, Please try again later');
            }
            return back()->with('success', 'Updating of product was successful');
        }
    }
}
