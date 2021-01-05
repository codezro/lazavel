@extends('layouts.seller')

@section('content')
<div class="padding-50">
    <div class="white padding-30">
        @foreach($reviews as $review)
            <div class="reviews parent-show-on-hover">
                <div class="box row-reverse">
                    <form action="/seller/review/{{$review->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="#" onclick="$(this).closest('form').submit()"><i class="material-icons red-text tiny text-right show-on-hover">clear</i></a>
                    </form>
                </div>
                <div class="box space-between">
                    <div class="box items-center">
                        <img class="profile" src="https://www.w3schools.com/w3css/img_avatar3.png" alt="profile-images">
                        <span class="padding-left-10">{{ucfirst($review->user->first_name)}} {{ucfirst($review->user->last_name)}}</span>
                    </div>
                    <div class="box">
                        <span class="padding-right-10">{{Str::limit($review->product->name,50)}}</span>
                        <img class="item-review" src="{{Storage::url($review->product->image[count($review->product->image)-1]->url)}}" alt="">
                    </div>
                </div>
                <div class="star">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($review->rating >= $i)
                            <i class="tiny material-icons">star</i>
                        @else
                            <i class="tiny material-icons">star_border</i>
                        @endif
                    @endfor
                    <span class="padding-left-5 date"><sup>{{date('d/m/Y', strtotime($review->created_at))}}</sup></span>
                </div>
                <div>
                    {{$review->details}}
                </div>
            </div>
            <div class="divider"></div>
        @endforeach
    </div>
        {{$reviews->links()}}
</div>
@endsection
