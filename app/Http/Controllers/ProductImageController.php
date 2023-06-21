<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function destroy(Product $product, ProductImage $image) {
        
        // Delete the specific image based on its ID
        $product->images()->where('id', $image->id)->delete();

        return back();
    }
}
