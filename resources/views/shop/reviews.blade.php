@extends('layouts.main')

@section('content')
<div class="main-body">
    <div class="sub-body">
        <h5>Rating & Reviews</h5>
        <div class="white box col padding-30">
            @include('partial._review',['reviews'=>$reviews])
            {{$reviews->links()}}
        </div>
    </div>
</div>
@endsection
