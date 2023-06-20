<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchResultsController extends Controller
{
    public function search (Request $request) 
    {

        $products = Product::latest()->filter(request(['tag', 'search']))->get();

        // dd(request()->tag);
        $user = $request->user();

        return view('results', [
            'search' => request()->search,
            'tag' => request()->tag,
            'user' => $user,
            'products' => $products
            
        ]);
    }
}
