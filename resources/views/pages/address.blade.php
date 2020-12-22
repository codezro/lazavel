@extends('layouts.main')

@section('content')
<div class="main-body">
    <div class="box col width-50 white padding-20">
        @if(!empty($address))
            <div class="box-inline padding-5">
                <div class="width-25 text-right padding-right-10 grey-text text-darken-2">Name</div>
                <div>{{$address->name}}</div>
            </div>

            <div class="box-inline padding-5">
                <div class="width-25 text-right padding-right-10 grey-text text-darken-2">Contact</div>
                <div>+63{{$address->contact}}</div>
            </div>

            <div class="box-inline text-right padding-5">
                <div class="width-25 text-right padding-right-10 grey-text text-darken-2">Address</div>
                <div class="text-left">
                    {{$address->street}} street, <br/>
                    {{$address->city}} city, <br/> 
                    {{$address->province}}, {{$address->postal_code}}
                </div>
            </div>
        @else
            <form action="/address" method="POST">
                @csrf
                <label for="name" class="black-text left">Name</label>
                <input name="name" class="@error('name') invalid @enderror" value="{{ old('name') }}"/>
                @include('partial._error-msg', ['message' => $errors->first('name') ])

                <label for="contact" class="black-text left">Contact</label><br/>
                <div class="box items-center">
                    <span class="padding-5">+63</span>
                    <input name="contact" class="@error('contact') invalid @enderror" value="{{ old('contact') }}"/>
                </div>
                @include('partial._error-msg', ['message' => $errors->first('contact') ])

                <label for="street" class="black-text left">Street</label>
                <input name="street" class="@error('street') invalid @enderror" value="{{ old('street') }}"/>
                @include('partial._error-msg', ['message' => $errors->first('street') ])

                <label for="province" class="black-text left">Province</label>
                <input name="province" class="@error('province') invalid @enderror" value="{{ old('province') }}"/>
                @include('partial._error-msg', ['message' => $errors->first('province') ])

                <label for="city" class="black-text left">City</label>
                <input name="city" class="@error('city') invalid @enderror" value="{{ old('city') }}"/>
                @include('partial._error-msg', ['message' => $errors->first('city') ])

                <label for="postal_code" class="black-text left">Postal code</label>
                <input name="postal_code" class="@error('postal_code') invalid @enderror" value="{{ old('postal_code') }}"/>
                @include('partial._error-msg', ['message' => $errors->first('postal_code') ])
                
                <button type="submit" class="waves-effect waves-light btn bg-o width-100">Submit</button>
            </form>
        @endif
    </div>
</div>
@endsection
