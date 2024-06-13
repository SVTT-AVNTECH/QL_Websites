<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $category = Category::all();
        return view('category/list', ['category' => $category]);
    }

    public function create_category()
    {
        return view('category/insert_category');
    }

    public function insert_category(Request $request)
    {
        $category = new category();
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        return redirect('editor/category/list');
    }

    public function edit_category($id)
    {
        $category = Category::findOrFail($id);
        return view('category/edit', compact('category'));
    }


    public function update_category(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        return redirect('editor/category/list');
    }

    public function delete_category($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('editor/category/list');
    }
}
