<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //return a view with search results from users
    public function index($search){
        $userResult = User::where('name', 'Like', '%'.$search.'%')->get();
        $productResult = Product::where('product_name', 'Like', '%'.$search.'%')->paginate(7);
        return view('admin\search',[
            'products'=> $productResult,
            'users' => $userResult,
        ]);
    }


}
