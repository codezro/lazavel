@extends('layouts.seller')

@section('content')
<div class="padding-50">
    <div class="white order padding-20">
        <table>
            <thead>
                <tr>
                    <td>Product</td>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Total Price</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td><img src="{{Storage::url($order->product->image[count($order->product->image)-1]->url)}}" alt="profile-images"></td>
                        <td>{{Str::limit($order->product->name,55)}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{number_format($order->total_price, 2, '.', ',')}}</td>
                        <form action="/seller/order/{{$order->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <td>
                                <select name="status" id="">
                                    <option value="{{$order->status}}">{{$order->status}}</option>
                                    <option value="Item Booked">Item Booked</option>
                                    <option value="Item accepted by courier">Item accepted by courier</option>
                                    <option value="Parcel In-transit">Parcel In-transit</option>
                                    <option value="Left Sorting Center">Left Sorting Center</option>
                                    <option value="Arrival at delivery point">Arrival at delivery point</option>
                                    <option value="Item ready for delivery">Item ready for delivery</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </td>
                            <td><button type="submit" class="btn">Update</button></td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
</div>
@endsection
