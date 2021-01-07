<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::id());
        return view('pages.profile', ['user' => $user]);
    }

    public function edit()
    {
        $user = User::find(Auth::id());
        return view('pages.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => ['required','email',Rule::unique('users')->ignore(Auth::id())],
            'username' => 'required|min:5',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
        ]);
        
        User::find(Auth::id())->update([
            'email' => $request->email,
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);
        return redirect('/profile');
    }
}
