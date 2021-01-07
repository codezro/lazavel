@extends('layouts.main')

@section('content')
<div class="main-body">
    <div class="box col width-50 white padding-20">
        <form action="/profile/update" method="POST">
            @csrf
            @method('PATCH')
            <div class="box padding-5">
                <div class="width-15 text-right"><h6>Edit Profile</h6></div>
            </div>
            <div class="box padding-5">
                <div class="width-15 text-right padding-right-10 grey-text text-darken-2">Email</div>
                <div>
                    <input name="email" type="text" value="{{$user->email}}">
                    @include('partial._error-msg', ['message' => $errors->first('email') ])
                </div>
            </div>
                
            <div class="box padding-5">
                <div class="width-15 text-right padding-right-10 grey-text text-darken-2">Username</div>
                <div><input name="username" type="text" value="{{$user->username}}">
                    @include('partial._error-msg', ['message' => $errors->first('username') ])
                </div>
            </div>
            <div class="box padding-5">
                <div class="width-15 text-right padding-right-10 grey-text text-darken-2">First Name</div>
                <div><input name="first_name" type="text" value="{{$user->first_name}}">
                    @include('partial._error-msg', ['message' => $errors->first('first_name') ])
                </div>
            </div>
            <div class="box padding-5">
                <div class="width-15 text-right padding-right-10 grey-text text-darken-2">Last Name</div>
                <div><input name="last_name" type="text" value="{{$user->last_name}}">
                    @include('partial._error-msg', ['message' => $errors->first('last_name') ])
                </div>
            </div>
            <div class="box padding-5">
                <button class="width-100 btn bg-o">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
