@extends('layouts.main')

@section('content')
<div class="main-body">
    <div class="box col width-50 white padding-20">
        <div class="box order items-center padding-10">
            <div class="flex-1">
                <img src="{{Storage::url($order->product->image[count($order->product->image)-1]->url)}}" alt="profile-images">
            </div>
            <div class="flex-4">
                <div class="padding-left-10">{{$order->product->name}}</div>
            </div>
        </div>
        <form action="/review/{{$order->id}}" method="POST">
            @csrf
            <textarea name="details" id="" cols="30" rows="5">{{old('details')?? ''}}</textarea>
            @include('partial._error-msg', ['message' => $errors->first('details') ])
            <div>
                <input class="star star-5" id="star-5" type="radio" name="rating" value="5"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="rating" value="4"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="rating" value="3"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="rating" value="2"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="rating" value="1"/>
                <label class="star star-1" for="star-1"></label>
            </div>
            @include('partial._error-msg', ['message' => $errors->first('rating') ])
            <br><br><br>
            <button class="btn orange darken-4 width-100">Submit Review</button>
        </form>
    </div>
</div>
@endsection
