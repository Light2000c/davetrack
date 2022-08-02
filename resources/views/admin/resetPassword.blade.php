@extends('layout\admin\app')

@section('content')

<!-- begin app-main -->
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Change Member Password</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reset-password') }}" method="post">
                            @csrf
                            @method('put')

                            @if(session('info'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('info') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="exampleInputPassword1">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="exampleInputPassword1" placeholder="Enter new password">
                                @error('old_password')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter new password">
                                @error('password')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm New Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" placeholder="Confirm new password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>
</div>

</div>
<!-- end container-fluid -->
</div>
<!-- end app-main -->
@endsection
