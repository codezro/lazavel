<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function list(){
        return view('shop.list');
    }

    public function detail($id){
        return view('shop.detail');
    }

    public function review($id){
        return view('shop.review');
    }
}
