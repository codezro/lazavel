@extends('layouts.main')

@section('content')


<div class="container padding-top-80">
    <div class="row">
        <div class="col l6 offset-l3 center white padding-20">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <label for="email" class="black-text left">Email</label>
                <input name="email" class="@error('email') invalid @enderror" value="{{ old('email') }}"/>
                @error('email')
                    <div class="red-text align-left" style="text-align:left;">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <button type="submit" class="waves-effect waves-light btn bg-o width-100">Send Password Reset Link</button>
            </form>
        </div>
    </div>
</div>

@endsection
