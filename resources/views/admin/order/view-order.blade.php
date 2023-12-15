@extends('admin.adminTemp')

@section('main')

   <div class="container py-3" style="font-size:18px;">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="text-light">Order View <a href="{{ route('order.index') }}" class="float-right btn btn-light">Back</a></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Shipping Details</h4>
                        <hr>
                                <label class="pt-2" for="firstname">First Name</label>
                                <input type="text" class="form-control" disabled  value="{{ $order->firstname }}">
                                <label class="pt-2" for="lastname">Last Name</label>
                                <input type="text" class="form-control" disabled  value="{{ $order->lastname }}">
                                <label class="pt-2" for="email">Email</label>
                                <input type="text" class="form-control" disabled  value="{{ $order->email }}">
                                <label class="pt-2" for="phonenumber">Phone Number</label>
                                <input type="text" class="form-control" disabled  value="{{ $order->phone }}">
                                <label class="pt-2" for="shipping address">Shipping Address</label>
                                <div class="border border-2 pl-3 py-2 shadow-sm">
                                    {{ $order->addressA }} <hr>
                                    {{ $order->addressB }} <hr>
                                    {{ $order->country }}<hr>
                                    {{ $order->state }}<hr>
                                    {{ $order->city }}
                                </div>
                                <label class="pt-2" for="pincode">Pin Code</label>
                                <input type="text" class="form-control" disabled  value="{{ $order->pincode }}">
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
                                @foreach ($order->orderitems as $orders)
                                    <tr>
                                        <td>{{ $orders->posts->title }}</td>
                                        <td>{{ $orders->quantity }}</td>
                                        <td>{{ $orders->price}}</td>
                                        <td><img src="{{ asset($orders->posts->image) }}" width="70" alt="Product Image"></td>
                                    </tr>
                                @endforeach
                                <td colspan="2"><strong>Total Price </strong></td>
                                <td colspan="2">₦<strong>{{ number_format ($order->total_price) }}</strong></td>
                            </tbody>
                        </table>

                        <h5>Order Status</h5>
                        <form action="{{ route('order.update', $order) }}" method="post">
                            @method('put')
                            @csrf
                            <select class="custom-select" name="order_status">
                                <option {{ $order->status == '0' ? 'selected': '' }} value="0">Pending</option>
                                <option {{ $order->status == '1' ? 'selected': '' }} value="1">Completed</option>
                            </select>
                            <button type="submit" class="btn btn-info float-right mt-2">Update</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
   </div>

@endsection
