<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verify.seller']);
    }

    public function order($orderId, Request $request){
        Order::where('id',$orderId)->update([
            'status' => $request->status
        ]);
        return back();
    }

    public function orders(){
        $orders = Order::latest('updated_at')->orderBy('created_at', 'ASC')->paginate(5);
        return view('seller.orders',['orders'=>$orders]);
    }

    public function reviews()
    {
        return view('seller.reviews');
    }
}
