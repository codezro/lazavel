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
    <link href="{{ asset('resources/dashboard.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('resources/app.js') }}" defer></script>
</head>
<body >
    <div id="app" class="box stretch">
        @include('layouts._components.sidenav-seller')
        
        <div class="item-11 box col">
            @if(session('success') || session('error'))
                <div class="flash_message @if(session('success')) success @endif @if(session('error')) error @endif">
                    <p>{{ session('success')? session('success') : session('error') }}</p>
                </div>
            @endif
            
            @include('layouts._components.navbar-seller')
            @yield('content')
        </div>
    </div>
</body>
</html>