<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lazavel') }}</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('resources/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('resources/app.js') }}" defer></script>
    <style>
    button{
        background-color: #485056 !important;
    }
    button.bg-o:hover{
        background-color: #485056 !important;
    }
    div.padding-top{
        padding-top: 15%;
    }
    
    </style>
</head>
<body>
    <div id="app">

        <main class="">
            
            <div class="container padding-top">
                <div class="row">
                    <div class="col l4 offset-l4 center white padding-20 ">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label for="email" class="black-text left">Email</label>
                            <input name="email" class="@error('email') invalid @enderror" value="{{ old('email') }}"/>
                            @error('email')
                                <div class="red-text text-left" style="text-align:left;">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <label for="password" class="black-text left">Password</label>
                            <input name="password" type="password" class="@error('password') invalid @enderror"/>
                            @error('password')
                                <div class="red-text text-left" style="text-align:left;">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <button type="submit" class="waves-effect waves-light btn width-100">Login</button>
                        </form>

                        @if (Route::has('password.request'))
                            <a class="grey-text" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </main>
        
    </div>
</body>
</html>