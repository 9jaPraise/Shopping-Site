@section('head')
<!-- Ck Editor -->
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

 @extends('admin.adminTemp')

 @section('main')
    <div class="card">
        <h4 class="pt-4 px-5">Edit a Product Item</h4>
        <hr>
            <div class="card-body">
                <div class="col-lg-12">

                        <form action="{{ route('product.update', $post) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                            <label for="title">Product Name/Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                            @error('title')
                            <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="discount price">Discout Price</label>
                                <input type="text" class="form-control" name="discountPrice" value="{{ $post->discountPrice }}">
                                @error('discountPrice')
                                <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="real price">Real Price</label>
                                <input type="text" class="form-control" name="realPrice" value="{{ $post->realPrice }}">
                                @error('realPrice')
                                <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="saved amount">Saved Amount</label>
                                <input type="text" class="form-control" name="savedAmount" value="{{ $post->savedAmount }}">
                                @error('savedAmount')
                                <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image">
                               <img src="{{ asset($post->image) }}" alt="" style="height:55px; width:55px">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-8">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" name="quantity" value="{{ $post->quantity }}">
                                </div>

                                <div class="form-group col-4 mt-5 px-5">

                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="trending"  {{ $post->trending == "1" ? 'checked' : "" }}>
                                        <label class="form-check-label">
                                            Trending
                                        </label>
                                        </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product despription">Product Description</label>
                                <textarea class="form-control" id="body" name="productDescription" rows="3">{{ $post->productDescription }}</textarea>
                                @error('productDescription')
                                <p style="color:red; margin-bottom:25px;">{{$message}}</p>
                                @enderror
                            </div>
                            <hr>
                            <div class="float-right">
                                <a class="btn btn-secondary text-white" href="{{ route('product.index') }}">Close</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
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
