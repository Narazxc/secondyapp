<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        
        // dd($request->user()->products);
        $categories = Category::get();


        return view('categories.index', [
            "categories" => $categories
        ]);
    }

    // public function create()
    // {

    // }



    public function store(Request $request)
    {

    // // Validation
    // $this->validate($request, [
    //     'category' => 'required'
    // ]);

    // for debugging purposes
    // dd($request->all());


    // Store/create
    Category::create(['name' => $request->category]);

        return redirect()->route('categories');
    }


    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories');
    }


}
