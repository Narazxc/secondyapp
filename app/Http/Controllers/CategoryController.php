<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        // dd(Category::get());
        // dd($request->user()->products);
        // No filter
        // $categories = Category::get();

        // With filter
        // $favorites = $user->favorites()->filter(request(['tableSearch']))->get();


        $categories = Category::latest()->filter(request(['tableSearch']))->paginate(10);


        return view('categories.index', [
            "categories" => $categories
        ]);
    }

    // public function create()
    // {

    // }



    public function store(Request $request)
    {

        // dd($request->all());


    // Validation
    $rules = [
        'name' => 'required|unique:categories',
    ];

    $messages = [
        'name.unique' => 'The category name already exists.',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // for debugging purposes
    // dd($request->all());


    // Store/create
    Category::create(['name' => $request->name]);

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
            // 'name' => 'required'
            'name' => [
            'required',
                Rule::unique('categories')->ignore($category->id),
            ],
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
