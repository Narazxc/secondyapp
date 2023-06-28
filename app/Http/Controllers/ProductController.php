<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Jorenvh\Share\ShareFacade;
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
        // $products = Product::where('user_id', $request->user()->id)->get(); 

        // Added table search and paginate the table
        // $products = Product::where('user_id', $request->user()->id)->filter(request()->only('tableSearch'))->paginate(5); 
        $products = $request->user()->products()->filter(request()->only('tableSearch'))->paginate(5); 
        
        // dd($products->categories);
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

        $currentProductId = $product->id; // Replace with the ID of the current product
        $categoryID = $product->category_id; // Replace with the desired category ID

        $products = Product::paginate(8);

        // get all product with the same category
        $sameCategoryProducts = Product::where('category_id', $product->category_id)->paginate(8);


        // get product with the same category exclude the current product
        $sameCategoryProductsExceptTheOneViewing = Product::where('category_id', $categoryID)
                    ->where('id', '!=', $currentProductId)
                    ->get();


        // This will generate html
        // ShareFacade::page('https://www.youtube.com/watch?v=89EsyytYUXw', $product->title)
        
        $shareComponent = ShareFacade::currentPage($product->title)
                ->facebook()
                ->twitter()
                ->reddit()
                ->telegram();

        return view('products.show', [
            'product' => $product,
            'user' => $request->user(),  // For displaying user in the navbar (homepage / product-detail)
            'relatedProducts' => $sameCategoryProductsExceptTheOneViewing,
            'products' => $products,
            'shareComponent' => $shareComponent,
        ]);
    }

    public function store(Request $request){

        // Input validation
        $this->validate($request, [
            // Validation rules comes with the Controller class, check laravel doc
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
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
            'tags' => $request->tags,
            'category_id' => $request->category,
        ]);
        
        
        // No file type validation yet
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


    public function update (Request $request, Product $product){

        // dd($request->status);

        // Input validation
        $this->validate($request, [
            // Validation rules comes with the Controller class, check laravel doc
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'tags' => 'required',
            'category' => 'required',
        ]);


        // Can't use $request->all() because of the confliction with product category_id & $request->category (naming)
        // $product->update($request->all());
     
        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'tags' => $request->tags,
            'category_id' => $request->category,
            'status' => $request->status
        ]);


        // No file type validation yet
        $images = $request->file('images');

        // If user don't update any images
        if($images === null){
            return redirect()->route('products.index');
        }

        // dd($product);
        
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
            return redirect()->route('products.index');
        }


    }


    public function destroy(Product $product){

        // Laravel native authorization
        $this->authorize('delete', $product); // will throw exception & render 403 view

        // delete any image_path related to the product
        $product->images()->where('product_id', $product->id)->delete();
        // delete the product
        $product->delete();

        return back();
    }
}
