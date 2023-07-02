<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductFavoriteController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\SearchResultsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// function () {

//     $products = [
//         ['title' => 'cup', 'price' => 2000, 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/Cup_and_Saucer_LACMA_47.35.6a-b_%281_of_3%29.jpg/640px-Cup_and_Saucer_LACMA_47.35.6a-b_%281_of_3%29.jpg'],
//         ['title' => 'shoes', 'price' => 500, 'image' => 'https://cdn.vox-cdn.com/thumbor/LXInRMZr79bUxYyQxOGM0_EW9Og=/0x0:2000x1284/1200x800/filters:focal(840x482:1160x802)/cdn.vox-cdn.com/uploads/chorus_image/image/56473521/pizza_shoe12.0.jpg'],
//         ['title' => 'skateboard', 'price' => 50, 'image' => 'https://contents.mediadecathlon.com/p2073788/k$f6d20332b5e2a45d729ed5fe6baed6cb/kids-skateboard-size-75quote-cp100-mid-geometric.jpg?format=auto&quality=40&f=452x452'],
//         ['title' => 'cap', 'price' => 10, 'image' => 'https://oneclickshopping.pk/wp-content/uploads/2023/02/Fashion-hip-hop-baseball-cap-poker-embroidery-personalized-hat-wild-hat-t-600x600.webp'],
//     ];
//     return view('homepage', ['products' => $products]);
// }

// Route::group(['middleware' => 'wizard-completed'], function () {
//     // Routes that require the user to have completed the wizard
// });
Route::get('/userpreference', function() {
    return view('userpreference');
})->name('userpreference');

Route::delete('/products/{product:title}/edit/{image}', [ProductImageController::class, 'destroy'])->name('product.images.destroy');

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/results', [SearchResultsController::class, 'search']);




Route::get('/products/u/favorites', [ProductFavoriteController::class, 'index'])->name('favorites.index');
Route::post('/products/{product}/favorites', [ProductFavoriteController::class, 'store'])->name('products.favorites');
Route::delete('/products/{product}/favorites', [ProductFavoriteController::class, 'destroy'])->name('favorites.destroy');


// categories
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// only return view without the data
// Route::get('/yourproducts', function () {
//     return view('products.index');
// });

Route::get('/u/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product:title}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show')->withoutMiddleware(['auth']);
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
