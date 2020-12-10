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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('products/search', [App\Http\Controllers\ProductsController::class,'search']);
Route::patch('products/{id}/status', [App\Http\Controllers\ProductsController::class,'status']);
Route::get('/seller/reviews', [App\Http\Controllers\SellerController::class, 'reviews']);
Route::resource('products', App\Http\Controllers\ProductsController::class);