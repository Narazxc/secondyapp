<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductFavoriteController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request){

        // dd($request->user()->favorites->product);
        

        // Current authenticated user
        $user = $request->user();

            

        // dd($user->favorites);


        // Grab user favorite products
        // $favorites = $user->favorites()->filter(request(['tableSearch']))->get(5);
        $favorites = $user->favorites()->filter(request()->only('tableSearch'))->paginate(5);



        return view('favorites.index', [
            'favorites' => $favorites
        ]);
    }

 



    public function store(Product $product, Request $request)
    {

        

        // dd($product->favoritedBy($request->user()));
        if($product->favoritedBy($request->user())) {
            return response(null, 409);
        }

        $product->favorites()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }


    public function destroy (Product $product, Request $request)
    {
        $request->user()->favorites()->where('product_id', $product->id)->delete();

        return back();
    }

}
