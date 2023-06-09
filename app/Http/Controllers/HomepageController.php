<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();


        return view('homepage', ['products' => $products, 'user' => $user]);
    }
}
