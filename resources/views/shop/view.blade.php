@extends('layouts.main')

@section('content')
<div class="main-body">
    <div class="sub-body">
        <div class="white box padding-20">
            <div class="flex-1 padding-5 level-1">
                @foreach ($product->image->reverse() as $img)
                    <div class="mySlides fade">
                        <img class="view-main materialboxed" src="{{Storage::url($img->url)}}" alt="">
                    </div>
                @endforeach
                <div class="level-2">
                    <a class="prev">&#10094;</a>
                    <a class="next">&#10095;</a>
                </div>
            </div>
            <div class="flex-1 padding-5 thumbnails">
                @foreach ($product->image->reverse() as $img)
                    <img class="view-thumbnail" src="{{Storage::url($img->url)}}" alt="thumbnail">
                @endforeach
            </div>
            <div class="flex-1">
                @if($product->favorite->count())
                    <form action="/favorite/{{$product->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="#" onclick="$(this).closest('form').submit()">
                            <i class="material-icons red-text right">favorite</i>
                        </a>
                    </form>
                @else
                    <form action="/favorite/{{$product->id}}" method="POST">
                        @csrf
                        <a href="#" onclick="$(this).closest('form').submit()">
                            <i class="material-icons red-text right">favorite_border</i>
                        </a>
                    </form>
                @endif
                <div><b>{{$product->name}}</b></div>
                <div>
                    <span class="star padding-left-5">
                        @for ($stars = 1; $stars <= 5; $stars++)
                            @if ($product->review->avg('rating') >= $stars)
                                <i class="tiny material-icons">star</i>
                            @elseif ( round( $product->review->avg('rating') + .25 ) >= $stars )
                                <i class="tiny material-icons">star_half</i>
                            @else
                                <i class="tiny material-icons">star_border</i>
                            @endif
                        @endfor
                    </span>
                    <span class="blue-text">{{number_format($product->review->avg('rating'),1)}}</span>
                </div>
                <div class="view-category">
                    <span>Category:</span>
                    @foreach ($product->categoryProducts as $value)
                        <a href="/search?category_id={{$value->category->id}}" class="category-round blue-text">{{$value->category->name}}</a>
                    @endforeach
                </div>
                <form action="/checkout/{{$product->id}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="view-price-buy">
                        <div class="">
                            <span class="view-price">&#8369; {{number_format($product->sale_price, 2, '.', ',')}}</span>
                        </div>
                        <div class="view-buy">
                                @csrf
                                <button class="view-buy center" @if($product->stock ==0) disabled @endif>Buy Now</button>
                        </div>
                    </div>
                    @if ($product->stock)
                        <div class="input-quantity">
                            <button type="button" class="input-quantity minus"><i class="material-icons">keyboard_arrow_left</i></button>
                            <input name="quantity" class="input-quantity" type="text" value="{{old('quantity') ?? 1}}">
                            <button type="button" class="input-quantity add"><i class="material-icons">keyboard_arrow_right</i></button>
                        </div>
                    @else
                        <div class="red-text">
                        Out of stock.
                        </div>
                    @endif
                    <div>
                        @include('partial._error-msg', ['message' => $errors->first('quantity') ])
                    </div>
                </form>
                <p>Delivery Options</p>
                <div class="box">
                    <div class="delivery-icon">
                        <i class="small material-icons">place</i>
                    </div> 
                    <div>Cebu, Talisay, Lawaan</div>
                </div>
                <div class="box">
                    <div class="delivery-icon">
                        <img class="cod-icon" src="/resources/images/cod.png" alt=""/>
                    </div> 
                    <div>Cash on Delivery</div>
                </div>
            </div>
        </div>

        <div class="space"></div>

        <div class="white padding-20">
            <h5>Product Details</h5>
            <p>{!! nl2br($product->details) !!}</p>
        </div>

        <div class="space"></div>

        <div class="white padding-20">
            @include('partial._review',['reviews'=>$reviews])
            @if($product->review->count() > 5)
                <div class="center padding-10">
                    <a href="/reviews/{{$product->id}}" class="btn grey darken-3 load-more">See More</a>
                </div>
            @endif
            @if($product->review->count() == 0)
                <div class="center padding-10">
                    No reviews yet.
                </div>
            @endif
        </div>

        <div class="space"></div>

        <div class="box wrap products">
            @foreach ($products as $product)
                @include('partial._product-card',['product' => $product,'numberOfCards' => '5'])
            @endforeach
        </div>

    </div>
</div>
@endsection