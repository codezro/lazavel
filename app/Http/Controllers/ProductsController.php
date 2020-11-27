<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','isSeller']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(3);
        return view('seller.products',['products' => $products]);
    }

    public function search(Request $request)
    {
        $products = Product::where('name','LIKE','%'.$request->search.'%')
                            ->orWhere('sku','LIKE','%'.$request->search.'%')
                            ->paginate(3);
        return view('seller.products',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('seller.createProduct',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'required|mimes:jpeg,png',
        ]);
        $product = Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'sku' => $request->sku,
            'retail_price' => $request->retail_price,
            'sale_price' => $request->sale_price,
            'stock' => $request->stock,
            'details' => $request->details,
            'status' => $request->status,
        ]);
        $product->categoryProducts()->create([
            'category_id' => $request->category,
        ]);

        foreach($request->file('image') as $file)
        {
            $path[] = $file->store('public/products');
        }
        $product->image()->create([
            'url' => json_encode($path)
        ]);
        return redirect('/products')->withSuccess('You have listed new product.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //reserve
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $images = json_decode($product->image[0]->url);
        return view('seller.editProduct',['product' => $product , 'categories'=>$categories, 'images'=>$images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product = Product::find($product->id);
        $product->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'retail_price' => $request->retail_price,
            'sale_price' => $request->sale_price,
            'stock' => $request->stock,
            'details' => $request->details,
            'status' => $request->status,
        ]);
        $product->categoryProducts()->update([
            'category_id' => $request->category,
        ]);
        return redirect('/products')->withSuccess('Product updated successfully.');
    }

    public function status($id){
        $product = Product::find($id);
        $product['status'] = !$product->status;
        $product->save();
        return back()->withSuccess('Status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        Product::find($productId)->delete();
        return redirect('/products')->withError('Product has been deleted.');
    }
}
