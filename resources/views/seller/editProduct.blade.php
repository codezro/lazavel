@extends('layouts.seller')

@section('content')
<div class="padding-50">
    <div class="">Update Product</div>
    <div class="space"></div>
    
    <form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data" files="true">
        @csrf
        @method('PATCH')
        <div class="white padding-30">
            <div class="box col">
                <div class="box col">
                    <label for="name" class="black-text">Name</label>
                    <input name="name" class="@error('name') invalid @enderror" value="{{$product->name}}"/>
                    @include('partial._error-msg', ['message' => $errors->first('name') ])
                </div>

                <div class="box col">
                    <label for="sku" class="black-text">SKU</label>
                    <input name="sku" class="half @error('sku') invalid @enderror" value="{{$product->sku}}"/>
                    @include('partial._error-msg', ['message' => $errors->first('sku') ])
                </div>

                <div class="box col">
                    <label for="name" class="black-text">Category</label>
                    <select name="category" id="" class="custom half invalid @error('category') invalid @enderror">
                        <option value="">Categories</option>
                        @foreach($categories as $category)
                            <option {{ $product->categoryProducts[0]->category_id == $category->id ? "selected" : "" }} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @include('partial._error-msg', ['message' => $errors->first('category') ])
                </div>

                <div class="space"></div>

                <div class="box col">
                    <label for="retail_price" class="black-text">Retail Price</label>
                    <input name="retail_price" class="half @error('retail_price') invalid @enderror" value="{{sprintf('%0.2f', $product->retail_price)}}"/>
                    @include('partial._error-msg', ['message' => $errors->first('retail_price') ])
                </div>

                <div class="box col">
                    <label for="sale_price" class="black-text">Sale Price</label>
                    <input name="sale_price" class="half @error('sale_price') invalid @enderror" value="{{sprintf('%0.2f', $product->sale_price)}}"/>
                    @include('partial._error-msg', ['message' => $errors->first('sale_price') ])
                </div>

                <div class="box col">
                    <label for="stock" class="black-text">No. of Items Available</label>
                    <input name="stock" class="half @error('stock') invalid @enderror" value="{{$product->stock}}"/>
                    @include('partial._error-msg', ['message' => $errors->first('stock') ])
                </div>

                <div class="box col">
                    <label for="details" class="black-text">Product Details</label>
                    <textarea name="details" class="@error('details') invalid @enderror" cols="30" rows="10">{{$product->details}}</textarea>
                    @include('partial._error-msg', ['message' => $errors->first('details') ])
                </div>

                <div class="space"></div>

                <div class="box col">
                    <div class="box">
                        <label for="status" class="black-text">Should display?</label>
                    </div>
                    <div class="box">
                        <p>
                        <label>
                            <input name="status" type="radio" value="1" {{$product->status == 1? "checked" : ""}}/>
                            <span>Yes</span>
                        </label>
                        </p>
                        <div class="space"></div>
                        <p>
                        <label>
                            <input name="status" type="radio" value="0" {{$product->status == 0? "checked" : ""}}/>
                            <span>No</span>
                        </label>
                        </p>
                    </div>
                    @include('partial._error-msg', ['message' => $errors->first('status') ])
                </div>

                <div class="box col upload">
                    <div class="box item-12 ">
                        @foreach($product->image as $img)
                            <img class="uploadHolder" src="{{Storage::url($img->url)}}" alt="thumbnail" />
                        @endforeach
                    </div>
                    @include('partial._error-msg', ['message' => $errors->first('image') ])
                    @include('partial._error-msg', ['message' => $errors->first('image.*') ])
                    <!-- PENDING PRODUCT IMAGE UPDATE -->
                    <!-- <div class="box item-12 img-upload">
                        <input class="upload item-12" name="image[]" type="file" multiple>
                        <i class="item-12 medium material-icons">image</i>
                        <p  class="item-12" >Drag & drop your image file here</p>
                    </div>
                    @error('image.*')
                        <div class="item-12 red-text text-left">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror -->
                </div>

            </div>

        </div>
        <br/>
        <div class="box flex-end padding-top-20">
            <a href="/products" class="btn grey">Cancel</a>
            <div class="space"></div>
            <button type="submit" class="waves-effect waves-light btn bg-o">Save</button>
        </div>
    </form>

</div>
@endsection
