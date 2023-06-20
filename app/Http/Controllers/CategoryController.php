<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        // dd(Category::get());
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

    public function edit (Category $category) {
        // dd($category);


        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('categories');
    }


    public function destroy(Request $request, Category $category)
    {
        // Laravel native authorization
        // $this->authorize('manage', $category); // will throw exception & render 403 view
        

        $category->delete();
        return redirect()->route('categories');
  
    }


}
