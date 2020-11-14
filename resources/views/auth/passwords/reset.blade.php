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


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
