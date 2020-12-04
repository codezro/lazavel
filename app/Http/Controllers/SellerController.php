<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','verify.seller']);
    }

    public function reviews(){
        return view('seller.reviews');
    }
}
