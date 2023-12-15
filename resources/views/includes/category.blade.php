<ul class="nav justify-content-center">

    {{-- <li class="nav-item mb-3 px-2">
        <a class="nav-link text-dark fs-5"> Categories  </a>  
    </li> --}}

    @foreach ($categories as $category)
        <li class="nav-item mb-3 px-2">
            <a class="nav-link btn btn-danger text-white rounded-pill" href="{{ route('welcome.search', ['category'=>$category->categoryName]) }}">
                {{ $category->categoryName }}
            </a>
        </li>
    @endforeach
  </ul>
