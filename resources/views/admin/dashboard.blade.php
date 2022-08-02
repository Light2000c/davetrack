@extends('layout\admin\app')

@section('content')

<div class="row ">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Users</h5>
                                <h2 class="mb-3 font-18">10</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Products</h5>
                                <h2 class="mb-3 font-18">10</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Cart</h5>
                                <h2 class="mb-3 font-18 text-success">50</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Orders</h5>
                                <h2 class="mb-3 font-18 text-success">12</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of counts -->



<div class="row">
    <!-- beginning of update profile  -->
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Account Info</h4>
            </div>
            <div class="card-body">
                <div class="jumbotron text-center">
                    <h2>Super Admin</h2>
                    <h5 class="text-muted mt-3">{{ Auth::user()->name }}</h5>
                    <h5 class="text-muted">{{ Auth::user()->email }}</h5>
                    <a class="btn btn-primary mt-3" href="https://getbootstrap.com/docs/4.0/components/forms/" target="_blank" role="button">Learn more</a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form class="{{ route('dashboard') }}" method="POST">
                @csrf
                @method('put')


                @if(session('success'))

                @php
                alert()->success('Success!', session('success'))->persistent('Dismiss');
                @endphp

                @endif

                @if(session('error'))

                @php
                alert()->error('Error!', session('error'))->persistent('Dismiss');
                @endphp

                @endif
                <div class="card-header">
                    <h4>Update Profile</h4>
                </div>
                <div class="card-body">

                    @if(session('error'))
                    <div class="alert alert-danger mb-2" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success mb-2" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name}}" required>
                        @error('name')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                        @error('email')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <!-- end of add team members  -->
</div>


<!-- beginning of team members -->
<div class="row">
    <div class="col-md-6 col-lg-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4>Team Members</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teamMembers as $teamMember)
                            <tr>
                                <td>1</td>
                                <td>{{ $teamMember->name }} </td>
                                <td>{{ $teamMember->email }}</td>
                                @if($teamMember->super_admin == 1 )
                                <td><span class="badge badge-info">Super Admin</span></td>
                                <form action="" method="post">
                                <td><button type="submit" class="btn btn-sm btn-success">Delete</button></td>
                                </form>
                                @else
                                <td><span class="badge badge-primary">Admin</span></td>
                                <td><button class="btn btn-sm btn-success" disabled>Delete</button></td>
                                @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form action="{{ route('searches') }}" method="post">
                @csrf

                @if(session('a-success'))

                @php
                alert()->success('Success!', session('a-success'))->persistent('Dismiss');
                @endphp

                @endif

                @if(session('a-error'))

                @php
                alert()->error('Error!', session('a-error'))->persistent('Dismiss');
                @endphp

                @endif
                <div class="card-header">
                    <h4>Add Team Member</h4>
                </div>
                <input type="text" name="req" value="add-member" hidden>
                <div class="card-body">

                    @if(session('error'))
                    <div class="alert alert-danger mb-2" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success mb-2" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Member Name</label>
                        <input type="text" name="a_name" value="{{ old('a_name') }}" class="form-control" required placeholder="Full Name">
                        @error('a_name')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Member Email</label>
                        <input type="email" name="a_email" value="{{ old('a_email') }}" class="form-control" placeholder="example@gmail.com" required>
                        @error('a_email')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Create a password" required>
                        @error('password')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                    </div>
                </div>
                @if(Auth::user()->super_admin = 1)
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Add Member</button>
                </div>
                @else
                <div class="card-footer text-right">
                    <button  class="btn btn-primary" disabled>Add Member</button>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
<!-- end of team members -->


@endsection
