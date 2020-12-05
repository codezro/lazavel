@extends('layouts.seller')

@section('content')
<div class="padding-50">
    <div class="box flex-end first-section">
        <div class="box search">
            <input class="search"/>
            <i class="material-icons">search</i>
        </div>
        <a href="/products/create"><button class="bg-o add">Add Item</button></a>
    </div>
    <div class="space"></div>
    <div>
        <table class="product-list">
            <thead>
                <tr>
                    <td>Product Name</td>
                    <td>Product ID</td>
                    <td>Retail Price</td>
                    <td>Sale Price</td>
                    <td>Available</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><a href="#">{{Str::limit($product->name,30)}}</a></td>
                        <td>{{$product->sku}}</td>
                        <td>{{sprintf('%0.2f', $product->retail_price)}}</td>
                        <td>{{sprintf('%0.2f', $product->sale_price)}}</td>
                        <td>{{$product->stock}}</td>
                        <td><button class="status {{$product->status? 'active' : 'in-active'}}">{{$product->status? 'Active' : 'In-active'}}</button></td>
                        <td>
                            <a class='dropdown-trigger btn' href='#' data-target='dropdown{{$product->id}}'>actions<i class="large material-icons">arrow_drop_down</i></a>
                            <!-- Dropdown Structure -->
                            <ul id='dropdown{{$product->id}}' class='dropdown-content'>
                                <li><a href="/products/{{$product->id}}/edit">edit</a></li>
                                <li>
                                    <form id="delProd{{$product->id}}" action="/products/{{$product->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="" type="submit">delete</button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
