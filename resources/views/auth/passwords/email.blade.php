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


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
