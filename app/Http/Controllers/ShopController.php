<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::getItemsBy(12)->with('image')->get();
        $categories = Category::all();
        return view('home',['products' => $products, 'categories' => $categories]);
    }
    
    public function list()
    {
        $products = Product::where('status',1)->with('image')->get();
        $categories = Category::all();
        return view('shop.list',['products' => $products, 'categories' => $categories]);
    }

    public function view($id)
    {
        $product = Product::with('image')->find($id);
        $reviews = Review::where('product_id',$id)->limit(5)->get();
        $products = Product::where('status',1)->limit(10)->with('image')->get();
        return view('shop.view',['product' => $product,'products' => $products,'reviews'=> $reviews]);
    }

    public function reviews($productId)
    {
        $reviews = Review::where('product_id',$productId)->paginate(10);
        return view('shop.reviews',['reviews'=>$reviews]);
    }
}
