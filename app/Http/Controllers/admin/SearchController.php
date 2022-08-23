<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //return a view with search results from users
    public function index($search){
        $userResult = User::orderBy('created_at', 'Desc')->where('name', 'Like', '%'.$search.'%')->where('is_admin', 0)->paginate(10);
        $productResult = Product::orderBy('created_at', 'Desc')->where('product_name', 'Like', '%'.$search.'%')->paginate(10);
        return view('admin.search',[
            'products'=> $productResult,
            'users' => $userResult,
        ]);
    }


}
