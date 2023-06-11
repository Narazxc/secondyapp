<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    //
    public function index(Request $request){

        // Get all the products created by currently authenticated user
        $products = Product::where('user_id', $request->user()->id)->get(); 

        return view('products.index', [
            'products' => $products
        ]);
        
    }

    public function create(){

        $categories = Category::get();

        return view('products.create', [
            'categories' => $categories
        ]);
    }


    public function show(Product $product, Request $request){
        return view('products.show', [
            'product' => $product,
            'user' => $request->user()
        ]);
    }

    public function store(Request $request){

        // no validation yet

        // Saving product without relationship involve
        // $product = new Product();
        // $product->title = $request->title;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->category_id = $request->category;
        // // Create and save the product
        // $product->save();

        
        
        // Validation
        $this->validate($request, [
            // Validation rules comes with the Controller class, check laravel doc
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'images' => 'required'
        ]);
        
        // dd($request->all());
        
        // Create product via user and product relationship
        $product = $request->user()->products()->create([
            // Using this relationship set up, behind the scene laravel will automatically fill in user_id for us
            // user_id
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
        ]);
        
        
        // $productID = $request->user()->products->pluck('id')->last();
        $images = $request->file('images');
        
        // Retrieve the product ID
        $productID = $product->id;

        $uploadCount = 0;

        foreach ($images as $image) {
            
            // time_randomstring.png/jpg
            $imageName = time() . '_' . Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            
            // Create and save the image with the product ID
            $productImage = new ProductImage();
            $productImage->image_path = $imageName;
            $productImage->product_id = $productID;
            $productImage->save();
            $uploadCount++;
        }

        if ($uploadCount === count($images)) {
            // Images uploaded successfully
            // return $uploadCount . ' image(s) uploaded successfully.';
            return redirect('/');
        }

    
        
        
        
        

        
        // $request->description;
        // $request->price;

        // dd("$product");



        // return redirect('/');
    }

    public function edit (Product $product)
    {
        $categories = Category::get();

        // dd($product);

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function destroy(Product $product){

        // Laravel native authorization
        $this->authorize('delete', $product); // will throw exception & render 403 view

        $product->delete();

        return back();
    }
}
