@extends('admin.adminTemp')

@section('main')

   <div class="container py-3" style="font-size:18px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4 class="text-light">User Details <a href="{{ route('user.index') }}" class="float-right btn btn-light">Back</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pt-3" for="role">Role</label>
                                <div class="border border-2 pl-2">{{ $user->role_as == '0' ? 'User':'Admin' }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="pt-3" for="firstname">First Name</label>
                                <div class="border border-2 pl-2">{{ $user->name }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="pt-3" for="lasttname">Last Name</label>
                                <div class="border border-2 pl-2">{{ $user->lastname }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="pt-3" for="email">Email</label>
                                <div class="border border-2 pl-2">{{ $user->email }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="pt-3" for="phonenumber">Phone Number</label>
                                <div class="border border-2 pl-2">{{ $user->phone }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="pt-3" for="address1">Address 1</label>
                                <div class="border border-2 pl-2">{{ $user->addressA }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="pt-3" for="address2">Address 2</label>
                                <div class="border border-2 pl-2">{{ $user->addressB }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="pt-3" for="country">Country</label>
                                <div class="border border-2 pl-2">{{ $user->country }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="pt-3" for="state">State</label>
                                <div class="border border-2 pl-2">{{ $user->state }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="pt-3" for="City">City</label>
                                <div class="border border-2 pl-2">{{ $user->city }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="pt-3" for="pincode">Pin Code</label>
                                <div class="border border-2 pl-2">{{$user->pincode }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>

@endsection
