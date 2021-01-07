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
    
    public function search(Request $request)
    {   
        $products = Product::searchName($request->keyword)
                ->filterCategory($request->category_id)
                ->sortResultBy($request->sort)
                ->with('image')->where('status', 1)
                ->paginate(12);
        $categories = Category::all();
        return view('shop.search',['products' => $products, 'categories' => $categories]);
    }

    public function view($id)
    {
        $product = Product::with('image')->find($id);
        $reviews = Review::where('product_id',$id)->limit(5)->get();
        $products = Product::getItemsBy(10)->with('image')->get();
        return view('shop.view',['product' => $product,'products' => $products,'reviews'=> $reviews]);
    }

    public function reviews($productId)
    {
        $reviews = Review::where('product_id',$productId)->paginate(10);
        return view('shop.reviews',['reviews'=>$reviews]);
    }
}
