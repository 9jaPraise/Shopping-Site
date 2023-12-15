@extends('admin.adminTemp')

@section('head')
<!-- Ck Editor -->
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Create a New Product Item</h3>
</div>

<hr>

<div class="col-lg-12">
    @include('includes.flash-message')
	<div class="card border-primary my-5">
		<div class="card-body">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Product Name/Title</label>
                  <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                  @error('title')
                  <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="discount price">Discout Price</label>
                    <input type="number" class="form-control" name="discountPrice" value="{{ old('discountPrice') }}">
                    @error('discountPrice')
                    <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="real price">Real Price</label>
                    <input type="number" class="form-control" name="realPrice" value="{{ old('realPrice') }}">
                    @error('realPrice')
                    <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="saved amount">Saved Amount</label>
                    <input type="text" class="form-control" name="savedAmount" value="{{ old('savedAmount') }}">
                    @error('savedAmount')
                    <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                    @error('image')
                    <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Choose a Category</label>
                    <select id="category" class="form-control" name="category_id">
                        <option selected disabled>Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-8">
                      <label for="quantity">Quantity</label>
                      <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}">
                    </div>

                    <div class="form-group col-4 mt-5 px-5">

                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="trending">
                              <label class="form-check-label">
                                Trending
                              </label>
                            </div>

                    </div>
                </div>

                <div class="form-group">
                  <label for="product despription">Product Description</label>
                  <textarea class="form-control" id="body" name="productDescription" rows="3">{{ old('productDescription') }}</textarea>
                  @error('productDescription')
                    <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                </div>

                <div class="card-footer border-top border-info">
                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('product.index') }}" role="button">Close</a>
                    </div>
                </div>
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
