@extends('layouts.main')

@section('content')

<div class="container padding-top-80">
    <div class="row">
        <div class="col l6 offset-l3 center white padding-20">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label for="email" class="black-text left">Email</label>
                <input name="email" class="@error('email') invalid @enderror" value="{{ old('email') }}"/>
                @include('partial._error-msg', ['message' => $errors->first('email') ])
                <label for="username" class="black-text left">Username</label>
                <input name="username" class="@error('username') invalid @enderror" value="{{ old('username') }}"/>
                @include('partial._error-msg', ['message' => $errors->first('username') ])
                <label for="first_name" class="black-text left">First Name</label>
                <input name="first_name" class="@error('first_name') invalid @enderror" value="{{ old('first_name') }}"/>
                @include('partial._error-msg', ['message' => $errors->first('first_name') ])
                <label for="last_name" class="black-text left">Last Name</label>
                <input name="last_name" class="@error('last_name') invalid @enderror" value="{{ old('last_name') }}"/>
                @include('partial._error-msg', ['message' => $errors->first('last_name') ])
                <label for="password" class="black-text left">Password</label>
                <input name="password" type="password"  class="@error('password') invalid @enderror"/>
                @include('partial._error-msg', ['message' => $errors->first('password') ])
                <label for="password-confirm" class="black-text left">Confirm Password</label>
                <input name="password_confirmation" class="width-100" type="password"  class="@error('password_confirmation') invalid @enderror"/>
                @include('partial._error-msg', ['message' => $errors->first('password_confirmation') ])
                <button type="submit" class="waves-effect waves-light btn bg-o width-100">Sign Up</button>
            </form>
        </div>
    </div>
</div>

@endsection
