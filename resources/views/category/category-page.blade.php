@extends('admin.adminTemp')

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Category List</h3>
</div>

<hr>

<div class="col-lg-12">
	<div class="card border-success my-5">
        @include('Includes.flash-message')
		<div class="card-header text-right bg-light">
                <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Category</a>
		</div>

		<div class="card-body">
            <table class="table my-4 text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->categoryName }}</td>

                            <td class="text-center">
                                <div class="btn-group">

                                    {{-- edit --}}

                                    <a class="btn btn-primary" href="{{ route('categories.edit', $category) }}">
                                        Edit
                                    </a>

                                    {{-- delete --}}

                                    <i class="fa fa-trash"></i> @include('category.delete-category')

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


