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
    <div class="box sub categories">
        @foreach ($categories as $category)
            <a href="" class="btn">{{$category->name}}</a>
        @endforeach
    </div>
    <div class="box sub space"><b>Just for you</b></div>
    <div class="box sub products">
        @foreach ($products as $product)
            <div class="product card">
                <div class="card-image">
                    <a href="/details/{{$product->id}}"><img src="{{Storage::url($product->image[count($product->image)-1]->url)}}"></a>
                </div>
                <div class="card-content">
                    <a href="/details/{{$product->id}}">{{Str::limit($product->name,30)}}</a>
                </div>
                <div class="card-action">
                    <a href="/details/{{$product->id}}">&#8369; {{sprintf('%0.2f', $product->sale_price)}}</a>
                </div>
                <span class="star padding-left-5">
                    <i class="material-icons tiny">star</i>
                    <i class="material-icons tiny">star</i>
                    <i class="material-icons tiny">star</i>
                    <i class="material-icons tiny">star</i>
                    <i class="material-icons tiny">star</i>
                </span>
            </div>
        @endforeach
    </div>
</div>
<div class="center padding-20">
    <a href="/list" class="btn grey darken-3 load-more">Load More</a>
</div>
@endsection
