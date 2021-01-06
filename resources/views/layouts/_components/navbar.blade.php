<nav class="top">
    <div class="nav-wrapper">
        @guest
            <ul id="nav-mobile" class="right navbar">
                <li><a href="{{ route('login') }}">Login</a></li>
                <li>|</li>
                <li><a  href="{{ route('register') }}">Register</a></li>
            </ul>
        @else
            <ul id="nav-mobile" class="right navbar">
                <li><a href="#" class="dropdown-trigger link" data-target="user-settings">{{ Auth::user()->username }}</a></li>
                <li>|</li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <button type="submit" class="alink link">Logout</button>
                    </form>
                </li>
            </ul>
            
            <ul id='user-settings' class='dropdown-content'>
                <li><a href="/address"> Address</a></li>
                <li><a href="/purchases">Purchases</a></li>
                <li><a href="/favorites">Favorites</a></li>
                <li><a href="/profile">Profile</a></li>
            </ul>
        @endguest
    </div>
</nav>
<nav class="bottom">
    <div class="row">
        <div class="col s1 offset-s1 padding-top-10"><a href="/"><img src="/resources/images/lazavel2.png" class="logo"/></a></div>
        <div class="col s7 row offset-s3 padding-top-15">
            <form action="/search" method="GET">
                <input name="keyword" class="col s8 search-bar" value="{{app('request')->input('keyword')}}"/>
            </form>
            <div class="bg-o col s1 search-icon"><i class="white-text large material-icons">search</i></div>
        </div>
    </div>
</nav>