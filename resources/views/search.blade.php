@extends('layout')

@section('main')
<div class="mt-4"></div>
@include('includes.category')
 <div class="container">

    <div class="d-flex bg-success text-white py-2 px-3 fs-5 mt-2"> 
        Product search result <p class="text-uppercase px-2 fw-bold">{{request()->input('search')}}</p>
    </div>
    <div class="row my-4">

        @forelse ($posts as $post)

            <div class="col-4">
                <div class="card border-0 shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="{{asset($post->image) }}" class="card-img img-fluid rounded-start" id="card-row" alt="...">
                        </div>
                        <div class="col-md-7">
                            <a class="card-body nav-link text-black" href="{{ route('product.show', $post) }}">
                                <p class="card-text">{{ $post->title }}</p>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">₦<strong>{{ $post->discountPrice }}</strong></h5>
                                    </div>

                                    <div class="col">
                                        <small class="card-title text-decoration-line-through">₦{{ $post->realPrice }}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <h5 class="my-5 text-center">Sorry there no product that is related to your search</h5>
        @endforelse

    </div>
 </div>

@endsection
