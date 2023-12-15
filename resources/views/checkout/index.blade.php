@extends('layout')

@section('main')

    <div class="container my-5">
        <form action="{{ route('checkout.store') }}" method="post">
            @csrf
            <h4 class="pb-3 px-3">Checkout Details</h4>
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 pb-3">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="firstname" placeholder="Enter Your First Name">
                                </div>
                                <div class="col-md-6">
                                <label for="lastname pb-3">Last Name</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->lastname }}" name="lastname" placeholder="Enter Your Last Name">
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="firstname">Email</label>
                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Your Email">
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="phonenumber">Phone Number</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" placeholder="0908787655">
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="address1">Address 1</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->addressA }}" name="addressA" placeholder="Enter Your Address 1">
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="address1">Address 2</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->addressB }}" name="addressB" placeholder="Enter Your Address 2">
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="Enter Your City">
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->state }}" name="state" placeholder="Enter Your State">
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Your Country">
                                </div>
                                <div class="col-md-6 pb-3">
                                    <label for="pincode">Pin Code</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Your Pin Code">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">

                            <h6>Order Details</h6>
                            @if($cartItems->IsEmpty())
                                <hr>
                                <h4 class="text-center my-4">Oops your cart is Empty</h4>
                            @else
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    @php $total = 0; @endphp

                                    @foreach ($cartItems as $cart)
                                        <tbody>
                                            <tr>
                                                <td>{{ $cart->posts->title }}</td>
                                                <td>{{ $cart->prod_qty }}</td>
                                                <td>₦{{ $cart->posts->discountPrice }}</td>
                                            </tr>
                                        </tbody>

                                        @php $total += $cart->posts->discountPrice * $cart->prod_qty; @endphp
                                    @endforeach

                                    <td colspan="2"><strong>Total Price </strong></td>
                                    <td>₦<strong>{{ number_format ($total) }}</strong></td>
                                </table>
                                <hr>
                                <button type="submit" class="btn btn-primary w-100">Place Order</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
