<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Dashbord</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro&family=Literata" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('sidebar/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('sidebar/css/style.css') }}">
        @yield('head')
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="px-4 pt-3">
                    <img src="{{ asset('img/logo.png') }}" class="logo rounded-circle mb-4 mt-5" alt="...">

                    <div>
                        <h4 class="text-white mb-4">Shopping Home</h4>
                    </div>

	        <ul class="list-unstyled components mb-5">
	          <li class="">
	            <a href="{{route('dashboard.admin')}}">Home</a>
	          </li>

	          <li>
                <a href="#productMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product</a>
                <ul class="collapse list-unstyled" id="productMenu">
                        <li>
                            <a href="{{route('product.create')}}">Add Product</a>
                        </li>
                        <li>
                            <a href="{{ route('product.index') }}">Product List</a>
                        </li>
                </ul>
	          </li>

              <li>
                <a href="#categoryMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Category</a>
                <ul class="collapse list-unstyled" id="categoryMenu">
                        <li>
                            <a href="{{ route('categories.create') }}">Add Category</a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}">Category List</a>
                        </li>
                </ul>
	          </li>

              <li>
                <a href="{{ route('order.index') }}">Orders</a>
              </li>

              <li>
                <a href="{{ route('user.index') }}">Users</a>
              </li>


	          <li>
              <a href="#">Contact</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <ul class="nav navbar-nav ml-auto" style="font-size: 18px">
                    <li class="nav-item">
                        <a class="nav-link active">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Profile/Settigs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {Request::routeIs('logout')?'active: ''}" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
              </ul>

            </div>

          </div>
        </nav>

            @yield('main')

      </div>
		</div>

    <script src="{{ asset('sidebar/js/jquery.min.js') }}"></script>
    <script src="{{ asset('sidebar/js/popper.js') }}"></script>
    <script src="{{ asset('sidebar/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('sidebar/js/main.js') }}"></script>
    @yield('script')
  </body>
</html>
