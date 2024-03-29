<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newlyAdded = Product::orderBy('created_at', 'asc')->take(8)->get();
        $controls = Product::where('product_category', 'Door Security & Access Control Systems')->orderBy('created_at', 'asc')->skip(8)->take(8)->get();
        $security = Product::where('product_category', 'Surveillance & CCTV Cameras')->orderBy('created_at', 'asc')->skip(8)->take(8)->get();
        return view('home',[
            'newlyAdded'=> $newlyAdded,
            'controls'=> $controls,
            'securities' => $security,
        ]);
    }
}
