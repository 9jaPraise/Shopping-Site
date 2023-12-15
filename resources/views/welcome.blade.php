@extends('layout')

@section('main')
    <div class="container">

        <!--Carousel Slide-->
        <div class="row mt-4">
            @include('includes.category')
            @include('includes.flash-message')
            <div class="col-lg-8 col-md-12 col-sm-12 mb-2">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/1.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/2.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/3.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/4.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6 col-6">

            <div class="card mb-3">
                <img src="{{ asset('img/cloth.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <a href="" class="btn btn-light" role="button">Shop Now</a>
                </div>
            </div>

            <div class="card">
                <img src="{{ asset('img/shoe.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <a href="" class="btn btn-light" role="button">Shop Now</a>
                </div>
            </div>

            </div>

            <div class="col-lg-2 col-md-6 col-sm-6 col-6">

            <div class="card mb-3">
                <img src="{{ asset('img/drink.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <a href="" class="btn btn-light" role="button">Shop Now</a>
                </div>
            </div>

            <div class="card">
                <img src="{{ asset('img/fridge.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <a href="" class="btn btn-light" role="button">Shop Now</a>
                </div>
            </div>

            </div>
        </div>


                <!--clothings Row-->
                <div class="d-flex bg-success text-white py-2 px-3 fs-5 mt-2">Clothing Category </div>
                <div class="row my-3">

                    @foreach ($postClothings as $cloth)

                        <div class="col-4">
                            <div class="card border-0 shadow-sm">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{asset($cloth->image) }}" class="card-img img-fluid rounded-start" id="card-row" alt="...">
                                    </div>
                                    <div class="col-md-7">
                                        <a class="card-body nav-link text-black" href="{{ route('product.show', $cloth) }}">
                                            <p class="card-text">{{ $cloth->title }}</p>
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title">₦<strong>{{  number_format($cloth->discountPrice) }}</strong></h5>
                                                </div>

                                                <div class="col">
                                                    <small class="card-title text-decoration-line-through">₦{{ $cloth->realPrice }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

                <!--Electronics Row-->
                <div class="d-flex bg-success text-white py-2 px-3 fs-5 mt-2">Electronics Category </div>
                <div class="row my-3">

                    @foreach ($postElectronics as $electro)

                        <div class="col-4">
                            <div class="card border-0 shadow-sm">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{asset($electro->image) }}" class="card-img img-fluid rounded-start" id="card-row" alt="...">
                                    </div>
                                    <div class="col-md-7">
                                        <a class="card-body nav-link text-black" href="{{ route('product.show', $electro) }}">
                                            <p class="card-text">{{ $electro->title }}</p>
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title">₦<strong>{{  number_format($electro->discountPrice) }}</strong></h5>
                                                </div>

                                                <div class="col">
                                                    <small class="card-title text-decoration-line-through">₦{{ $electro->realPrice }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>


            <!--Drinks Row-->
            <div class="d-flex bg-success text-white py-2 px-3 fs-5 mt-2">Drinks Category </div>
            <div class="row my-3">

                @foreach ($postDrinks as $drinks)

                    <div class="col-4">
                        <div class="card border-0 shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{asset($drinks->image) }}" class="card-img img-fluid rounded-start" id="card-row" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <a class="card-body nav-link text-black" href="{{ route('product.show', $drinks) }}">
                                        <p class="card-text">{{ $drinks->title }}</p>
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">₦<strong>{{  number_format($drinks->discountPrice) }}</strong></h5>
                                            </div>

                                            <div class="col">
                                                <small class="card-title text-decoration-line-through">₦{{ $drinks->realPrice }}</small>
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
@endsection
