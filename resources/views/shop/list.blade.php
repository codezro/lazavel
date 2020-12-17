@extends('layouts.main')

@section('content')
<div class="main-body">
    <div class="sub-body">
        <div class="box breadcrumb">
            <a href="/" class="breadcrumb active">Home</a>
            <a href="#!" class="breadcrumb">Search Results</a>
        </div>
        <div class="box-inline padding-top-30">
            <div class="sub-categories">
                <h5>Categories</h5>
                <div class="box list-category">
                    @foreach ($categories as $category)
                        <a href="" class="category-round">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="sub-products">
                <div class="box filter-info">
                    <div class="result-count">
                        {{$products->count()}} items found
                    </div>
                    <div class="box">
                        <span style="width: 80px;">Sort by:</span>
                        <select name="" id="">
                            <option value="">Popularity</option>
                            <option value="">Relevance</option>
                            <option value="">Price: low to high</option>
                            <option value="">Price: high to low</option>
                            <option value="">Newest</option>
                            <option value="">Oldest</option>
                        </select>
                    </div>
                </div>
                <div class="box wrap">
                    @foreach ($products as $product)
                        @include('partial._product-card',['product' => $product,'numberOfCards' => '4'])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
