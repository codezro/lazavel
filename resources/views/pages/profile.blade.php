@extends('layouts.main')

@section('content')
<div class="main-body">
    <div class="box col width-50 white padding-20">
        <span class="text-right"><a href="/profile/edit">Edit</a></span>
        <h6>My Profile</h6>
        <div class="box-inline padding-5">
            <div class="width-15 text-right padding-right-10 grey-text text-darken-2">Email</div>
            <div>{{$user->email}}</div>
        </div>
        <div class="box-inline padding-5">
            <div class="width-15 text-right padding-right-10 grey-text text-darken-2">Username</div>
            <div>{{$user->username}}</div>
        </div>
        <div class="box-inline padding-5">
            <div class="width-15 text-right padding-right-10 grey-text text-darken-2">Full Name</div>
            <div>{{$user->first_name}} {{$user->last_name}}</div>
        </div>
        <div class="divider"></div>
        <h6>Billing Information</h6>
        @foreach($user->address as $address)
            <div class="box-inline padding-5">
                <div class="width-15 text-right padding-right-10 grey-text text-darken-2">Name</div>
                <div>{{$address->name}}</div>
            </div>
            <div class="box-inline padding-5">
                <div class="width-15 text-right padding-right-10 grey-text text-darken-2">Contact</div>
                <div>+63{{$address->contact}}</div>
            </div>
            <div class="box-inline padding-5">
                <div class="width-15 text-right padding-right-10 grey-text text-darken-2">Address</div>
                <div>{{$address->street}}, {{$address->city}}, {{$address->province}}, {{$address->postal_code}}</div>
            </div>
        @endforeach
        @if($user->address->count() == 0)
            <div class="padding-20 row">
                <a href="/address" class="white btn blue-grey-text">Add address</a>
            </div>
        @endif
    </div>
</div>
@endsection
