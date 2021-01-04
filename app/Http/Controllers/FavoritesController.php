<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($productId)
    {
        Favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
        ]);
        return back();
    }

    public function destroy($productId)
    {
        Favorite::where('product_id',$productId)->where('user_id',Auth::id())->delete();
        return back();
    }
}
