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
                        <div class="product card list-4">
                            <div class="card-image">
                                <a href="/view/{{$product->id}}"><img src="{{Storage::url($product->image[count($product->image)-1]->url)}}"></a>
                            </div>
                            <div class="card-content">
                                <a href="/view/{{$product->id}}">{{Str::limit($product->name,30)}}</a>
                            </div>
                            <div class="card-action">
                                <a href="/view/{{$product->id}}">&#8369; {{sprintf('%0.2f', $product->sale_price)}}</a>
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
        </div>
    </div>
</div>
@endsection
