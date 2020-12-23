<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Order;
use App\Models\User;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('pages.purchases',['orders'=>$orders]);
    }

    public function store($productId, OrderRequest $request)
    {
        if(!$this->checkAddress()) return redirect('/address')->withError('Please add address first.');
        Order::create([
            'product_id' => $productId,
            'user_id' => Auth::id(),
            'address_id' => Auth::user()->address->pluck('id')->first(),
            'quantity' => $request->quantity,
            'total_price' => calculateTotalPrice($productId,$request->quantity),
            'status' => 'Processing order',
        ]);
        Product::find($productId)->decrement('stock', $request->quantity);
        return redirect('/purchases');
    }

    public function checkAddress()
    {
        $address = Address::where('user_id',Auth::id())->get();
        return $address->count() > 0? true : false;
    }
}
