@extends('layouts.main')

@section('content')
<div class="main-body">
    <div class="sub-body">
        <div class="white box padding-20">
            <div class="flex-1 padding-5">
                <img class="view-main" src="{{Storage::url($product->image[count($product->image)-1]->url)}}" alt="">
            </div>
            <div class="flex-1 padding-5 view-thumbnail">
                @foreach ($product->image as $img)
                    <img class="view-thumbnail" src="{{Storage::url($img->url)}}" alt="thumbnail">
                @endforeach
            </div>
            <div class="flex-1">
                <i class="material-icons red-text right">favorite_border</i>
                <div><b>{{$product->name}}</b></div>
                <div>
                    <span class="star padding-left-5">
                        <i class="material-icons tiny">star</i>
                        <i class="material-icons tiny">star</i>
                        <i class="material-icons tiny">star</i>
                        <i class="material-icons tiny">star</i>
                        <i class="material-icons tiny">star</i>
                    </span>
                    <span class="blue-text">5.0</span>
                </div>
                <div class="view-category">
                    <span>Category:</span>
                    @foreach ($product->categoryProducts as $value)
                        <span class="category-round blue-text">{{$value->category->name}}</span>
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
                                <button class="view-buy center">Buy Now</button>
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
            <div class="review">
                <div class="box">
                    <img class="profile" src="https://www.w3schools.com/w3css/img_avatar3.png" alt="profile-images">
                    <span class="padding-left-10">John Doe</span>
                </div>
                <div class="star">
                    <i class="tiny material-icons">star</i>
                    <i class="tiny material-icons">star</i>
                    <i class="tiny material-icons">star</i>
                    <i class="tiny material-icons">star_half</i>
                    <i class="tiny material-icons">star_border</i>
                    <span class="padding-left-10 date"><sup>11/11/2020</sup></span>
                </div>
                <div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
            </div>
            <div class="divider"></div>

            <div class="center padding-10">
                <a href="/review/{{$product->id}}" class="btn grey darken-3 load-more">See More</a>
            </div>
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