@extends('layout')

@section('main')
<div class="container-fluid bg-light">
    <div class="container">
        <p class="fs-2 py-3"><strong>{{ $post->category->categoryName }} category</strong></p>
    </div>
</div>
    <div class = "container product_data">
        <div class="row mt-2 py-4 bg-light">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                <div class="text-center">
                    <img src="{{ asset($post->image) }}" class="img-fluid product-img" alt="...">
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mt-2">
                @if($post->trending == '1' )
                <label class="badge bg-danger float-end" style="font-size:15px"> Trending</label>
                @endif
                <h3>{{ $post->title }}</h3>
                <small>Product Code: {{ $post->productCode }}</small>
                <hr>
                    <div class="row">
                        <div class="col-3 col-lg-2 col-md-4 col-sm-4">
                            <h4>₦<strong>{{ number_format($post->discountPrice) }}</strong></h4>
                        </div>

                        <div class="col-3 col-lg-2 col-md-4 col-sm-4">
                            <small class="card-title text-decoration-line-through">₦{{ $post->realPrice }}</small>
                        </div>

                        <div class="col-6 col-lg-8 col-md-4 col-sm-4">
                            <small class="text-dark"><strong>{{ $post->savedAmount }}</strong></small>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-6 col-sm-8 col-md-3">
                            <input type="hidden" value="{{ $post->id }}" class="post_id">
                            <label for="quantity">Quantity</label>
                            <div class="input-group">
                                <button class="input-group-text decreament-btn"> - </button>
                                <input type="text" name="quantity" value="1" class="form-control text-center qty_input">
                                <button class="input-group-text increment-btn"> + </button>
                            </div>
                        </div>

                        <div class="col-6 col-sm-4 col-md-8 my-4">
                            @if($post->quantity > 0)
                            <label class="badge bg-success float-end" style="font-size:15px"> In Stock</label>
                            @else
                            <label class="badge bg-danger float-end" style="font-size:15px"> Out of Stock</label>
                            @endif

                            @if($post->quantity == 0)

                            @elseif($post->quantity <= 5)
                                <label class="badge bg-danger" style="font-size:14px">Hurry we only have {{ $post->quantity }} Item Remaining</label>
                            @endif
                        </div>
                    </div>
                <hr>
                @if($post->quantity > 0)
                    <button type="button" class="btn btn-primary btn-lg px-5 addToCart">Buy Now</button>
                @endif
                <button type="button" class="btn btn-success btn-lg px-5">Add to Wishlist</button>
            </div>
        </div>

        <div class="row mt-3 bg-light">
            <div class="col py-3">
                <h4>Product Description</h4>
                {{ $post->productDescription }}
            </div>
        </div>

        <div class="row mt-3">
             <!--Related Row-->
            <div class="d-flex bg-success  text-white py-2 px-3 fs-5 mt-2"> Related Product </div>
            <div class="row my-3">
                @foreach ($relatedProducts as $relatedproduct)
                    <div class="col-4">
                        <div class="card border-0 shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset($relatedproduct->image) }}" class="card-img img-fluid rounded-start" id="card-row">
                                </div>
                                <div class="col-md-7">
                                    <a class="card-body text-start nav-link text-black" href="{{ route('product.show', $relatedproduct) }}">
                                        <p class="card-text">{{ $relatedproduct->title }}</p>
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">₦<strong>{{ number_format($relatedproduct->discountPrice) }}</strong></h5>
                                            </div>

                                            <div class="col">
                                                <small class="card-title text-decoration-line-through">₦{{ $relatedproduct->realPrice }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection




