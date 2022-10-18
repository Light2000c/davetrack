<?php

namespace App\Http\Controllers\admin;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteTagCat extends Controller
{
    public function catTag($id, Request $request){

        if ($request->has('category')) {

            $success = Category::where('id', $id)->delete();

            if ($success) {
                return back();
            }
        }

        if ($request->has('tag')) {
            $success = Tag::where('id', $id)->delete();

            if ($success) {
                return back();
            }
        }
    }
}
