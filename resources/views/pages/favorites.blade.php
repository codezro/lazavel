@extends('layouts.main')

@section('content')
<div class="main-body">
    <div class="sub-body">
    <h5>Favorites</h5>
    <div class="box wrap">
        @if ($favorites->isNotEmpty())
            @foreach($favorites as $favorite)
                @include('partial._product-card',['product' => $favorite->product,'numberOfCards' => '6'])
            @endforeach
        @else
            <p class="center">No favorites yet.</p>
        @endif
    </div>
    </div>
</div>
@endsection
