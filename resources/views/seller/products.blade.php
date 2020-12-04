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
                <tr>
                    <td><a href="#">Product A</a></td>
                    <td>P1098384</td>
                    <td>1000php</td>
                    <td>100php</td>
                    <td>1</td>
                    <td><button class="status active">Active</button></td>
                    <td>
                        <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>actions<i class="large material-icons">arrow_drop_down</i></a>
                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="#!">update</a></li>
                        <li><a href="#!">delete</a></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td><a href="#">Product A</a></td>
                    <td>P1098384</td>
                    <td>1000php</td>
                    <td>100php</td>
                    <td>1</td>
                    <td><button class="status in-active">In-active</button></td>
                    <td>
                        <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>actions<i class="large material-icons">arrow_drop_down</i></a>
                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="#!">update</a></li>
                        <li><a href="#!">delete</a></li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
