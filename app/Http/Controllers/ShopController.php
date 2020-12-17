<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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
        $products = Product::getItemsBy(12)->with('image')->get();
        return view('shop.view',['product' => $product,'products' => $products]);
    }

    public function review(Product $product)
    {
        return view('shop.review');
    }
}
