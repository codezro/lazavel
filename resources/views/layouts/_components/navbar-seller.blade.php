<div class="box navbar flex-end padding-10">
    <div class="item"><a class="black-text" href="#" >{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a></div>
    <div class="item"><a class="black-text" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>