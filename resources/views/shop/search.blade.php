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
                <form action="/search" id="category-form">
                    @if(app('request')->input('keyword'))
                        <input name="keyword" type="hidden" value="{{app('request')->input('keyword')}}">
                    @endif
                    @if(app('request')->input('sort'))
                        <input name="sort" type="hidden" value="{{app('request')->input('sort')}}">
                    @endif
                    <input name="category_id" type="hidden">
                    <input name="category_name" type="hidden">
                    <div class="box list-category">
                            @foreach ($categories as $category)
                                <button type="button" data-name="{{$category->name}}" data-id="{{$category->id}}" class="white {{app('request')->input('category_id') == $category->id ? 'selected' : ''}} category category-round">{{$category->name}}</button>
                            @endforeach
                    </div>
                </form>
            </div>
            <div class="sub-products">
                <div class="box filter-info">
                    <div class="result-count">
                        {{$products->total()}} items found @if(app('request')->input('keyword')) for "{{app('request')->input('keyword')}}" @endif
                    </div>
                    <div class="box">
                        <span style="width: 80px;">Sort by:</span>
                        <form action="/search" method="GET" id="category-sort">
                            @if(app('request')->input('keyword'))
                                <input name="keyword" type="hidden" value="{{app('request')->input('keyword')}}">
                            @endif
                            @if(app('request')->input('category_id'))
                                <input name="category_id" type="hidden" value="{{app('request')->input('category_id')}}">
                            @endif
                            @if(app('request')->input('category_name'))
                                <input name="category_name" type="hidden" value="{{app('request')->input('category_name')}}">
                            @endif
                            <select name="sort" id="result-sort">
                                <option {{app('request')->input('sort') == 'popularity' ? 'selected' : ''}}  value="popularity">Popularity</option>
                                <option {{app('request')->input('sort') == 'relevance' ? 'selected' : ''}} value="relevance">Relevance</option>
                                <option {{app('request')->input('sort') == 'low-high' ? 'selected' : ''}}  value="low-high">Price: low to high</option>
                                <option {{app('request')->input('sort') == 'high-low' ? 'selected' : ''}}  value="high-low">Price: high to low</option>
                                <option {{app('request')->input('sort') == 'newest' ? 'selected' : ''}}  value="newest">Newest</option>
                                <option {{app('request')->input('sort') == 'oldest' ? 'selected' : ''}}  value="oldest">Oldest</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="box wrap">
                    @foreach ($products as $product)
                        @include('partial._product-card',['product' => $product,'numberOfCards' => '4'])
                    @endforeach
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
