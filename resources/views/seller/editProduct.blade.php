@extends('layouts.seller')

@section('content')
<div class="padding-50">
    <div class="">Register Product</div>
    <div class="space"></div>
    <form method="POST" action="{{ route('/products/1') }}">
        @csrf
        <div class="white padding-30">
            <div class="box col">
                <div class="box col">
                    <label for="name" class="black-text">Name</label>
                    <input name="name" class="@error('name') invalid @enderror" value="{{ old('name') }}"/>
                    @inlcude('partial/_error-msg.blade.php', ['attribute' => 'name'])
                </div>

                <div class="box col">
                    <label for="name" class="black-text">Category</label>
                    <select name="category" id="" class="custom half invalid @error('category') invalid @enderror" value="{{ old('category') }}">
                        <option value="">categories</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    @inlcude('partial/_error-msg.blade.php', ['attribute' => 'category'])
                </div>

                <div class="space"></div>

                <div class="box col">
                    <label for="retail_price" class="black-text">Retail Price</label>
                    <input name="retail_price" class="half @error('retail_price') invalid @enderror" value="{{ old('retail_price') }}"/>
                    @inlcude('partial/_error-msg.blade.php', ['attribute' => 'retail_price'])
                </div>

                <div class="box col">
                    <label for="sale_price" class="black-text">Sale Price</label>
                    <input name="sale_price" class="half @error('sale_price') invalid @enderror" value="{{ old('sale_price') }}"/>
                    @inlcude('partial/_error-msg.blade.php', ['attribute' => 'sale_price'])
                </div>

                <div class="box col">
                    <label for="details" class="black-text">Sale Price</label>
                    <textarea name="details" class="@error('details') invalid @enderror" value="{{ old('details') }}" id="" cols="30" rows="10"></textarea>
                    @inlcude('partial/_error-msg.blade.php', ['attribute' => 'details'])
                </div>
                
                <div class="space"></div>

                <div class="box col">
                    <div class="box">
                        <label for="status" class="black-text">Should display?</label>
                    </div>
                    <div class="box">
                        <p>
                        <label>
                            <input name="status" type="radio" value="1" />
                            <span>Yes</span>
                        </label>
                        </p>
                        <div class="space"></div>
                        <p>
                        <label>
                            <input name="status" type="radio" value="0"/>
                            <span>No</span>
                        </label>
                        </p>
                    </div>
                    @inlcude('partial/_error-msg.blade.php', ['attribute' => 'status'])
                </div>

                <div class="box upload">
                    <div class="box item-12 img-upload">
                    <input class="item-12" type="file" multiple>
                    <i class="item-12 medium material-icons">image</i>
                    <p  class="item-12" >Drag & drop your image file here</p>
                    </div>
                </div>

            </div>

        </div>
        <br/>
        <div class="box flex-end padding-top-20">
            <a href="/produts"><button type="submit" class="waves-effect waves-light btn grey">Cancel</button></a>
            <div class="padding-5"></div>
            <button type="submit" class="waves-effect waves-light btn bg-o">Save</button>
        </div>
    </form>
</div>
@endsection
