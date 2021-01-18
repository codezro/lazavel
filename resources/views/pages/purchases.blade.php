@extends('layouts.main')

@section('content')
<div class="main-body width-50">
    <div class="box col width-50 white padding-20">
        @if ($orders->isNotEmpty())
            @foreach($orders as $order)
                <div class="width-100 order box">
                    <div class="flex-1">
                        <a href="/view/{{$order->product->id}}"><img src="{{Storage::url($order->product->image[count($order->product->image)-1]->url)}}" alt="product-image"></a>
                    </div>
                    <div class="flex-4">
                        <div class="padding-left-10"><a href="/view/{{$order->product->id}}">{{$order->product->name}}</a></div>
                        <div class="padding-left-10">{{$order->quantity}} pc(s)</div>
                        <div class="padding-left-10">Order Total: {{number_format($order->total_price, 2, '.', ',')}}</div>
                        <div class="padding-left-10"><b>Status:</b> {{$order->status}}</div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex-3"><i class="tiny material-icons orange-text">place</i> {{$order->address->street}}, {{$order->address->city}}, {{$order->address->province}}, {{$order->address->postal_code}}</div>
                    <div class="flex-1">
                        @if($order->review->count())
                            <a class="waves-effect waves-light btn width-100 grey white-text">Reviewed</a>
                        @else
                            <a href="/purchases/{{$order->id}}/review" class="waves-effect width-100 btn orange darken-4" @if(strtolower($order->status) != 'completed') disabled : '' @endif >Rate</a>
                        @endif
                    </div>
                </div>
                <div class="divider"></div>
            @endforeach
        @else
            <p class="center">No orders yet.</p>
        @endif
    </div>
</div>
@endsection
