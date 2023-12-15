@extends('admin.adminTemp')

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Product List</h3>
</div>

<hr>

<div class="col-lg-12">
	<div class="card border-success my-5">
        @include('Includes.flash-message')
		<div class="card-header text-right bg-light">
                <a href="{{ route('product.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Product</a>
		</div>

		<div class="card-body">
            <table class="table my-4 text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name/Title</th>
                    <th scope="col">Discout Price</th>
                    <th scope="col">Real Price</th>
                    <th scope="col">Saved Amount</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->discountPrice }}</td>
                            <td>{{ $post->realPrice }}</td>
                            <td>{{ $post->savedAmount }}</td>
                            <td>{{ $post->category->categoryName }}</td>
                            <td class="text-center">
                                <div class="btn-group">

                                    {{-- edit --}}

                                    <a class="btn btn-primary"  href="{{route('product.edit', $post)}}" >
                                        Edit
                                     </a>

                                    {{-- delete --}}

                                    @include('productPosts.delete-product')

                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>

              </table>

		</div>
	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>

@endsection


