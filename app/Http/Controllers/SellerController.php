<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','isSeller']);
    }

    public function reviews(){
        return view('seller.reviews');
    }
}
