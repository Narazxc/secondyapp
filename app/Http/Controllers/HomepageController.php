<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomepageController extends Controller
{
    //
    public function home()
    {
        $user = Auth::user();
        $products = Product::orderBy('created_at', 'desc')->paginate(8);
        
        $preferredCategories = [];
        $preferredProducts = [];
        
        
        $categorySections = [];
        $recommendedProducts = null;
        
        $categories = Category::all();






        
        

        if ($user && $user->preference) {
            $preferenceCategoryIds = json_decode($user->preference->category); // array of 3 category ids
            $priceRange = $user->preference->price_range;
            list($minPrice, $maxPrice) = explode('-', $priceRange);

            $recommendedProducts = Product::whereIn('category_id', $preferenceCategoryIds)
                ->where('price', '>=', (int)$minPrice)
                ->where('price', '<=', (int)$maxPrice)
                ->get();

            // dd($preferenceCategoryIds, $recommendedProducts, $minPrice, $maxPrice);
            
            
            // get all product from each of the 3 category ids
            // foreach ($preferenceCategoryIds as $categoryId) {
            //     $productsFromEachCategory = Product::where('category_id', $categoryId)->get();

            //     $preferenceCategories[] = $productsFromEachCategory;
            // }

            foreach ($preferenceCategoryIds as $categoryId) {
                $category = Category::find($categoryId);

                $preferredCategories[] = $category;
            }


            foreach ($preferredCategories as $category) {
                $preferredProducts[] = Product::where('category_id', $category->id)->paginate(8);
            } 

            
            // list($cat1, $cat2, $cat3) = $preferredProducts;
            // dd($cat1, $cat2, $cat3, $preferredCategories);


            // foreach($preferredProducts as $preferredProduct){
            //     foreach($preferredProduct as $item){
            //         echo $item . ' ';
            //     }
            // }

            list($cat1, $cat2, $cat3) = $preferredProducts;

            $categorySections = [
            [
                'name' => $preferredCategories[0]->name,
                'products' => $cat1
            ],
            [
                'name' => $preferredCategories[1]->name,
                'products' => $cat2
            ],
            [
                'name' => $preferredCategories[2]->name,
                'products' => $cat3
            ]
        ];

       

        } else {
            $preferredCategories = null; // set this variable to null
            $preferredProducts = null;
            
        }

    // the top one is recommendation (make use of priceRange)

    // foreach categories create section


        
    

  

    // dd($categories);

    return view('homepage', [
        'products' => $products,
        'user' => $user, 
        'preferredCategories' => $preferredCategories,
        // 'cat1' => $cat1,
        // 'cat2' => $cat2,
        // 'cat3' => $cat3,
        'preferredProducts' => $preferredProducts, // array of collections
        'categorySections' => $categorySections,
        'recommendedProducts' => $recommendedProducts,
        'categories' => $categories

    ]);

    }

    public function productIndex()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $user = Auth::user();
        $categories = Category::all();

        return view('productIndex', [
            'user' => $user, 
            'products' => $products,
            'categories' => $categories
        ]);
    }



    public function categoryIndex(Category $category)
    {
        $user = Auth::user();
        $categories = Category::all();
        
        // get product according to category
        // $products = Product::where('category', $category)->get();
        $products = $category->products;


        return view('categoryIndex', [
            'user' => $user, 
            'products' => $products,
            'categories' => $categories,
            'category' => $category
        ]);
    }


}
