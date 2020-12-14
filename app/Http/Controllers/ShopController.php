<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function list(){
        $products = Product::where('status',1)->with('image')->get();
        $categories = Category::all();
        return view('shop.list',['products' => $products, 'categories' => $categories]);
    }

    public function detail($id){
        return view('shop.detail');
    }

    public function review($id){
        return view('shop.review');
    }
}
