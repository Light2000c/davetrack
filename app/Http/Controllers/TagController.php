<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.tagCategory', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function tagCategory(Request $request)
    {

        $success = "";
        if ($request->has('category')) {
            //validate an incoming request id it has category
            $this->validate($request, [
                'category_title' => 'required|Unique:categories,title',
            ]);

            //create a new instance of category
            $success = Category::create([
                'title' => $request->category_title,
            ]);

            //return success of an error message depending on the result
            if ($success) {
                return back()->with('success', 'you have successfully added to categories');
            } else {
                return back()->with('error', 'Something went wrong, Please try again later');
            }
        }

        if ($request->has('tag')) {
            //validate an incoming request id it has tag
            $this->validate($request, [
                'tag_title' => 'required|Unique:tags,title',
            ]);

            //create a new instance of tag
            $success = Tag::create([
                'title' => $request->tag_title,
            ]);

            //return success of an error message depending on the result
            if ($success) {
                return back()->with('success', 'you have successfully added a new tag.');
            } else {
                return back()->with('error', 'Something went wrong, Please try again later.');
            }
        }
    }

    public function delete($id, Request $request)
    {


        if ($request->has('category')) {

            $success = Category::where('id', $id)->delete();

            if ($success) {
                return back();
            } else {
                return back();
            }
        }

        if ($request->has('tag')) {
            $success = Tag::where('id', $id)->delete();

            if ($success) {
                return back();
            } else {
                return back();
            }
        }
    }
}
