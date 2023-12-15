@extends('layout')

@section('main')

<div class="container">
    <h4 class="py-5">CART SUMMARY</h4>
    <div class="card">
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($cartItems as $cart)
                <div class="row my-4 product_data">
                    <div class="col-3 col-md-2">
                        <img src="{{ asset($cart->posts->image) }}" class="img-fluid rounded-start" style="hight:90px; width:90px">
                    </div>

                            <div class="col-6 col-md-3">
                                <h5>{{ $cart->posts->title }}</h5>
                            </div>

                            <div class="col-3 col-md-2">
                                <h5> ₦{{ number_format($cart->posts->discountPrice) }} </h5>
                            </div>

                            <hr class="mt-3 d-sm-block d-lg-none d-xl-none d-xxl-none">

                            <div class="col-6 col-md-3">
                                    <input type="hidden" class="post_id" value="{{ $cart->post_id }}">
                                    @if($cart->posts->quantity >= $cart->prod_qty)
                                        <div class="input-group" style="width:140px">
                                            <button class="input-group-text quantity-btn decreament-btn"> - </button>
                                            <input type="text" name="quantity" value="{{ $cart->prod_qty}}" class="form-control text-center qty_input">
                                            <button class="input-group-text quantity-btn increment-btn"> + </button>
                                        </div>
                                        @php $total += $cart->posts->discountPrice * $cart->prod_qty ; @endphp
                                    @else
                                        <h6>Out of Stock</h6>
                                    @endif
                            </div>

                            <div class="col-6 col-md-2">
                                <button class="btn btn-danger delete-cart-btn float-end">Remove</button>
                            </div>
                </div>
                <hr>
            @endforeach

            @if ($cartItems->isEmpty())
                <div class="text-center">
                    <h4>Opps Your Cart is currently empty!</h4>
                    <p>Browse through our category to check for our best deals!!</p>
                    <a href="{{ route('welcome.index') }}" class="btn btn-success fs-5">Start Shopping</a>
                </div>
            @else
                <h5>Total Price : ₦{{ number_format($total) }}

                    <a class="btn btn-success float-end" href="{{ route('checkout.index') }}"> Proceed to Check Out</a>
                </h5>
            @endif

        </div>
    </div>
</div>

@endsection

