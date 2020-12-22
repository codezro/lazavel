<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;

class AddressesController extends Controller
{
    public function __consctruct(){
        $this->middleware('auth');
    }

    public function index(){
        $address = Address::where('user_id','=',Auth::id())->first();
        return view('pages.address',['address'=> $address]);
    }

    public function store(AddressRequest $request){
        $address = Address::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'contact' => $request->contact,
            'street' => $request->street,
            'province' => $request->province,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
        ]);
        return redirect('/address');
    }
}
