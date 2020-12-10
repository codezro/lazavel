@extends('layouts.main')

@section('content')


<div class="container padding-top-80">
    <div class="row">
        <div class="col l6 offset-l3 center white padding-20">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email" class="black-text left">Email</label>
                <input name="email" class="@error('email') invalid @enderror" value="{{ old('email') }}"/>
                @include('partial._error-msg', ['message' => $errors->first('email') ])
                <label for="password" class="black-text left">Password</label>
                <input name="password" type="password" class="@error('password') invalid @enderror"/>
                @include('partial._error-msg', ['message' => $errors->first('password') ])
                <button type="submit" class="waves-effect waves-light btn bg-o width-100">Login</button>
            </form>
            <div class="space"></div>
            @if (Route::has('password.request'))
                <a class="grey-text" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            @endif
        </div>
    </div>
</div>
@endsection
