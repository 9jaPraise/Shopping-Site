@extends('admin.adminTemp')

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Create a New Category</h3>
</div>

<hr>
@include('includes.flash-message');
<div class="col-lg-12">
	<div class="card border-primary my-5">
		<div class="card-body">
            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Category Name</label>
                  <input type="text" class="form-control" name="categoryName" value="{{ old('categoryName') }}">
                  @error('categoryName')
                  <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                  @enderror
                </div>


                <div class="card-footer border-top border-info">
                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('categories.index') }}" role="button">Close</a>
                    </div>
                </div>
              </form>

  	    </div>

	</div>
</div>

@endsection
