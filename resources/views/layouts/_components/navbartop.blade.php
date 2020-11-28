w<nav class="top">
    <div class="nav-wrapper">
        @guest
            <ul id="nav-mobile" class="right">
                <li><a href="{{ route('login') }}">Login</a></li>
                <li>|</li>
                <li><a  href="{{ route('register') }}">Register</a></li>
            </ul>
        @else
            <ul id="nav-mobile" class="right">
                <li><a href="#">{{ Auth::user()->username }}</a></li>wtt
                <li>|</li>
                <li><a  href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
    </div>
</nav>