@extends('layouts.main')

@section('content')
<div class="carousel carousel-slider">
    @php
        $count = 1;
        foreach ($products as $product)
        {
            if ($count%4 == 1)
            {  
                echo '<div class="carousel-item row">';
            }
                echo '<a href="/view/'.$product->id.'"><img class="col s3" src="'.Storage::url($product->image[count($product->image)-1]->url).'"></a>';
                
            if ($count%4 == 0)
            {
                echo '</div>';
            }
            $count++;
        }
    @endphp
        
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
