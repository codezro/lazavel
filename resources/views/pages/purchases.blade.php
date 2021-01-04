@extends('layouts.main')

@section('content')
<div class="main-body width-50">
    <div class="box col width-50 white padding-20">
        @if ($orders->isNotEmpty())
            @foreach($orders as $order)
                <div class="width-100 order box">
                    <div class="flex-1">
                        <img src="{{Storage::url($order->product->image[count($order->product->image)-1]->url)}}" alt="profile-images">
                    </div>
                    <div class="flex-4">
                        <div class="padding-left-10">{{$order->product->name}}</div>
                        <div class="padding-left-10">{{$order->quantity}} pc(s)</div>
                        <div class="padding-left-10">Order Total: {{$order->total_price}}</div>
                        <div class="padding-left-10"><b>Status:</b> {{$order->status}}</div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex-3"><i class="tiny material-icons orange-text">place</i> {{$order->address->street}}, {{$order->address->city}}, {{$order->address->province}}, {{$order->address->postal_code}}</div>
                    <div class="flex-1"><a @if(strtolower($order->status) != 'completed') disabled : '' @endif href="review/{{$order->product_id}}" class="width-100 btn orange darken-4">Rate</a></div>
                </div>
                <div class="divider"></div>
            @endforeach
        @else
            <p class="center">No orders yet.</p>
        @endif
    </div>
</div>
@endsection
