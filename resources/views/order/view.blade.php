@extends('layout')

@section('main')

   <div class="container py-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>My Order View <a href="{{ route('myOrder.index') }}" class="float-end btn btn-light">Back</a></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Shipping Details</h4>
                        <hr>
                            <label class="pt-2" for="firstname">First Name</label>
                            <input type="text" class="form-control" disabled  value="{{ $orders->firstname }}">
                            <label class="pt-2" for="lastname">Last Name</label>
                            <input type="text" class="form-control" disabled  value="{{ $orders->lastname }}">
                            <label class="pt-2" for="email">Email</label>
                            <input type="text" class="form-control" disabled  value="{{ $orders->email }}">
                            <label class="pt-2" for="phonenumber">Phone Number</label>
                            <input type="text" class="form-control" disabled  value="{{ $orders->phone }}">
                            <label class="pt-2" for="shipping address">Shipping Address</label>
                            <div class="border border-2 ps-3 py-2 shadow-sm">
                                {{ $orders->addressA }} <hr>
                                {{ $orders->addressB }} <hr>
                                {{ $orders->country }}<hr>
                                {{ $orders->state }}<hr>
                                {{ $orders->city }}
                            </div>
                            <label class="pt-2" for="pincode">Pin Code</label>
                            <input type="text" class="form-control" disabled  value="{{ $orders->pincode }}">
                    </div>

                    <div class="col-md-6">
                        <h4>Order Details</h4>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name </th>
                                    <th>Qunatity </th>
                                    <th>Price </th>
                                    <th>Image </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders->orderitems as $order)
                                    <tr>
                                        <td>{{ $order->posts->title }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->price}}</td>
                                        <td><img src="{{ asset($order->posts->image) }}" width="70" alt="Product Image"></td>
                                    </tr>
                                @endforeach
                                <td colspan="2"><strong>Total Price </strong></td>
                                <td colspan="2">₦<strong>{{ number_format ($orders->total_price) }}</strong></td>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
   </div>

@endsection
