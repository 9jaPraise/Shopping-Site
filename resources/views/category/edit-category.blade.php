@section('head')
<!-- Ck Editor -->
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection
@extends('admin.adminTemp')

@section('main')
    <div class="card">
        <h5 class="pt-4 px-5">Edit a Category</h5>
        <hr>
        <div class="card-body">
        <div class="col-lg-12">

                <form action="{{ route('categories.update', $category) }}" method="post" enctype="multipart/form-data">

                    @method('put')
                    @csrf
                    <div class="form-group">
                    <label for="title">Category Name</label>
                    <input type="text" class="form-control" name="categoryName" value="{{ $category->categoryName }}">
                    @error('categoryName')
                    <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                    </div>

                    <a class="btn btn-secondary" href="{{ route('categories.index') }}">Close</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>

        </div>
        </div>
    </div>
@endsection


@section('script')
<!-- Ck Editor Script-->
    <script>
        CKEDITOR.replace( 'body' );
    </script>
@endsection
