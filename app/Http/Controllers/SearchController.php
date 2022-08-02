<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //return view that displays the search result
    public function index($search)
    {

        $searchResult = Product::where('product_name', 'Like', '%' . $search . '%')->paginate(8);
        return view('search', [
            'searchResults' => $searchResult,
        ]);
    }

    public function search(Request $request)
    {
        //Get a validation for an incoming request
        $this->validate($request, [
            'search' => 'required',
        ]);

        //redirects to search page
        return redirect()->route('search-result', $request->search);
    }
}
