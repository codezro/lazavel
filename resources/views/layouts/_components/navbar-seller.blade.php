<div class="box navbar flex-end padding-10">
    <div class="item"><a class="black-text link" href="#" >{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a></div>
    <div class="item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            <button type="submit" class="alink link">Logout</button>
        </form>
    </div>
</div>