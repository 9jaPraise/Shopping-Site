<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--CSRF Token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Import bootstrap.css-->
    <link rel="stylesheet" href="{{asset('boot/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!--Import bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Shopping Site</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success"  style="font-size: 17px;">
        <div class="container-fluid">
          <a class="navbar-brand d-none d-lg-block d-xl-block d-xxl-block" href="{{ route('welcome.index') }}">Shopping Home</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav m-auto mb-2">

                        @guest
                            <li class="nav-item">
                                <a class="nav-link {Request::routeIs('login')?'active: ''}" href="{{ route('login') }}">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {Request::routeIs('register')?'active: ''}" href="{{ route('register') }}">Register</a>
                            </li>
                         @endguest

                            <form action="{{ route('welcome.search') }}" class="d-flex px-4">
                                <input class="form-control rounded-0" type="search" placeholder="Search Product" aria-label="Search" name="search" style="width:550px">
                                <button class="btn btn-light rounded-0" type="submit">Search</button>
                            </form>

                            <li class="nav-item ms-4">
                                <a class="btn btn-light rounded-0 {Request::routeIs('cart.view')?'active: ''}" href="{{ route('cart.view') }}">
                                    Cart <span class="badge bg-success">0</span>
                                </a>
                            </li>

                            <li class="nav-item ms-4">
                                <a class="btn btn-light rounded-0 {Request::routeIs('cart.view')?'active: ''}" href="">
                                    Wishlist <span class="badge bg-success">0</span>
                                </a>
                            </li>

                        @auth
                            <li class="nav-item">
                                <a class="nav-link active ps-5">{{ Auth::user()->name }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {Request::routeIs('myOrder.index')?'active: ''}" href="{{ route('myOrder.index') }}">My Orders</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="">Profile</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link {Request::routeIs('logout')?'active: ''}" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endauth
                    </ul>

            </div>
        </div>
      </nav>

        <div class="d-flex bg-success d-sm-block d-block d-lg-none d-xl-none d-xxl-none">


            <div class="d-flex">
                    <div class="p-2 flex-grow-1">
                        <a href="{{ route('welcome.index') }}" class="navbar-brand text-white">Shopping Home</a>
                    </div>

                    <div class="p-2">
                        <a href="" class="nav-link text-white">Login</a>
                    </div>

                    <div class="p-2">
                        <button type="button" class="btn btn-light rounded-0">
                            Cart <span class="badge bg-success">0</span>
                        </button>
                    </div>


                    <div class="p-2">
                        <a class="nav-link text-white">bola</a>
                    </div>
                    <li class="p-2">
                        <a class="nav-link text-white" href="">Profile/Settigs</a>
                    </li>
            </div>
        </div>

        <div class="d-flex mt-2 d-sm-block d-block d-lg-none d-xl-none d-xxl-none">
            <form class="d-flex px-4">
                <input class="form-control rounded-0" type="search Item" placeholder="Search Item" aria-label="Search">
                <button class="btn btn-success rounded-0" type="submit">Search</button>
            </form>
         </div>

         <!--carousel Container-->
         @yield('main')


    <footer>
        <div class="container-fluid bg-dark text-light d-none d-sm-none d-lg-block d-xl-block d-xxl-block">
            <div class="container">
                <div class="row mt-4 py-3">
                    <div class="col-6 col-md-2">
                        <h6><i class="bi bi-envelope"></i> EMAIL SUPPORT</h6>
                        <small>shoppinghome@emal.com</small>
                    </div>

                    <div class="col-6 col-sm-6 col-md-2">
                        <h6><i class="bi bi-telephone-fill"></i> PHONE SUPPORT</h6>
                        <small>09087656543/07098987656</small>
                    </div>

                    <div class="col-6 col-sm-6 col-md-2">
                        <h6><i class="bi bi-whatsapp"></i> WHATSAPP SUPPORT</h6>
                        <small>08000656543/09087098987</small>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <h6><i class="bi bi-chat-square"></i> GET LATEST DEAL</h6>
                        <small>Our best promotion been sent to you directly</small>
                    </div>

                    <div class="col-12 col-sm-12 col-md-3">
                        <form class="d-flex">
                            <input class="form-control rounded-0" type="search" placeholder="Email Address" aria-label="Search">
                            <button class="btn btn-success rounded-0" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

     <!--Import bootsrap.js-->
     <script src="{{asset('boot/js/jquery-3.7.0.min.js')}}"></script>
     <script src="{{asset('boot/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('boot/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('boot/js/script.js')}}"></script>
     @yield('script')
</body>
</html>
