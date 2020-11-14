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
</head>
<body>
    <div id="app">
        <nav class="top">
            <div class="nav-wrapper">
            @guest
                <ul id="nav-mobile" class="right">
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li>|</li>
                    <li><a  href="{{ route('register') }}">Register</a></li>
                </ul>
            @else
                <ul id="nav-mobile" class="right">
                    <li><a href="#">{{ Auth::user()->username }}</a></li>
                    <li>|</li>
                    <li><a  href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
            </div>
        </nav>
        <nav class="bottom">
            <div class="row">
                <div class="col s1 offset-s1 padding-top-10"><img src="/resources/images/lazavel2.PNG" class="logo"/></div>
                <div class="col s7 row offset-s3 padding-top-15"><input class="col s8 search-bar"/><div class="bg-o col s1 search-icon"><i class="white-text large material-icons">search</i></div></div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
        
        <div class="footer">Copy Right Codex Bootcamp</div>
    </div>
</body>
</html>