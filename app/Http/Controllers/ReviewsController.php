<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Order;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($orderId)
    {
        $order = Order::find($orderId);
        return view('pages.purchase-review',['order'=>$order]);
    }

    public function store($orderId, ReviewRequest $request)
    {
        $order = Order::find($orderId);
        Review::create([
            'product_id' => $order->product_id,
            'user_id' => Auth::id(), 
            'order_id' => $order->id, 
            'details' => $request->details,
            'rating' => $request->rating,
        ]);
        return redirect('/purchases');
    }
}
