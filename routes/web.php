<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/seller/login', function () {
    return view('auth.seller');
})->middleware('guest');

Auth::routes();

Route::get('/', [App\Http\Controllers\ShopController::class, 'index'])->name('home');

Route::get('products/search', [App\Http\Controllers\ProductsController::class,'search']);
Route::patch('products/{id}/status', [App\Http\Controllers\ProductsController::class,'status']);
Route::get('/seller/reviews', [App\Http\Controllers\SellerController::class, 'reviews']);
Route::get('/seller/orders', [App\Http\Controllers\SellerController::class, 'orders']);
Route::resource('products', App\Http\Controllers\ProductsController::class);
Route::patch('/seller/order/{id}', [App\Http\Controllers\SellerController::class, 'order']);
Route::delete('/seller/review/{id}', [App\Http\Controllers\SellerController::class, 'reviewDestroy']);

Route::get('/search', [App\Http\Controllers\ShopController::class, 'search']);
Route::get('/view/{id}', [App\Http\Controllers\ShopController::class, 'view']);
Route::get('/reviews/{id}', [App\Http\Controllers\ShopController::class, 'reviews']);

Route::get('/address', [App\Http\Controllers\AddressesController::class, 'index']);
Route::post('/address', [App\Http\Controllers\AddressesController::class, 'store']);

Route::post('/checkout/{id}', [App\Http\Controllers\OrdersController::class, 'store']);
Route::get('/purchases', [App\Http\Controllers\OrdersController::class, 'index']);

Route::get('/purchases/{id}/review', [App\Http\Controllers\ReviewsController::class, 'create']);
Route::post('/review/{id}', [App\Http\Controllers\ReviewsController::class, 'store']);

Route::post('/favorite/{id}', [App\Http\Controllers\FavoritesController::class, 'store']);
Route::delete('/favorite/{id}', [App\Http\Controllers\FavoritesController::class, 'destroy']);
Route::get('/favorites', [App\Http\Controllers\FavoritesController::class, 'index']);

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit']);
Route::patch('/profile/update', [App\Http\Controllers\ProfileController::class, 'update']);
