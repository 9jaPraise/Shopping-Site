@extends('admin.adminTemp')

@section('main')


   <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-light"> Order History <a href="{{ route('order.index') }}" class="btn btn-light float-right">New Order</a></h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price </th>
                                <th>status </th>
                                <th>Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($order->updated_at)) }}</td>
                                    <td>{{ $order->tracking_no }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->status == '0' ? 'pending':'completed' }}</td>
                                    <td><a href="{{ route('order.view', $order) }}" class="btn btn-info w-100">View Orders</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>

@endsection
