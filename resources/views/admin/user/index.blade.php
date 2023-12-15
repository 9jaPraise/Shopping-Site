@extends('admin.adminTemp')

@section('main')


   <div class="container py-5" style="font-size:17px;">
    @include('includes.flash-message')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-light">Registered Users</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email </th>
                                <th>Phone Number </th>
                                <th>Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                    <td>{{ $user->name.' '. $user->lastname}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td><a href="{{ route('user.view', $user) }}" class="btn btn-info w-100">View Users</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>

@endsection
