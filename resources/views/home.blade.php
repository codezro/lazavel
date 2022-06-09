@extends('layouts.main')

@section('content')
<div class="carousel carousel-slider">
    <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/800/400/food/6"></a>
    <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/800/400/food/7"></a>
    <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/800/400/food/5"></a>
    <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/800/400/food/4"></a>
</div>
<div class="main">
    <div class="space"></div>
    <form action="/search" id="category-form" method="GET">
        <input type="hidden" name="category_id">
        <input type="hidden" name="category_name">
        <div class="box sub categories">
            @foreach ($categories as $category)
                <button type="button" data-name="{{$category->name}}" data-id="{{$category->id}}" class="category btn">{{$category->name}}</button>
            @endforeach
        </div>
    </form>
    <div class="box sub space"><b>Just for you</b></div>
    <div class="box sub products">
        @foreach ($products as $product)
            @include('partial._product-card',['product' => $product,'numberOfCards' => '6'])
        @endforeach
    </div>
</div>
<div class="center padding-20">
    <a href="/search" class="btn grey darken-3 load-more">Load More</a>
</div>
@endsection
