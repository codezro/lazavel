@extends('layouts.main')

@section('content')


<div class="container padding-top-80">
    <div class="row">
        <div class="col l6 offset-l3 center white padding-20">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <label for="email" class="black-text left">Email</label>
                <input name="email" class="@error('email') invalid @enderror" value="{{ old('email') }}"/>
                @error('email')
                    <div class="red-text align-left" style="text-align:left;">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <label for="password" class="black-text left">Password</label>
                <input name="password" type="password"  class="@error('password') invalid @enderror"/>
                @error('password')
                    <div class="red-text align-left" style="text-align:left;">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <label for="password-confirm" class="black-text left">Confirm Password</label>
                <input name="password_confirmation" class="width-100" type="password"  class="@error('password_confirmation') invalid @enderror"/>
                @error('password_confirm')
                    <div class="red-text align-left" style="text-align:left;">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <button type="submit" class="waves-effect waves-light btn bg-o width-100">Reset Password</button>
            </form>
        </div>
    </div>
</div>
@endsection
