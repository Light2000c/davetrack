@extends('layout.app')


@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/web/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">{{ Auth::user()->name }}<span>Account</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="true">Account Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('transactions') }}">Transactions History</a>
                            </li>
                            <!-- <li class="nav-item">
                                <form action="" method="post">
                                <a class="nav-link" href="#">Log Out</a>
                                </form>
                            </li> -->
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">


                            <div class="tab-pane fade show active" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="{{ route('dashboard') }}" method="post">
                                    @csrf
                                    @method('put')

                                    @if(session('check'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('check') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

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
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Full Name *</label>
                                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
                                            @error('name')
                                            <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                            @enderror

                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Email address *</label>
                                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" required>
                                            @error('email')
                                            <small id="emailHelp" name="name" value="{{ Auth::user()->name }}" class="form-text text-danger mt-1">{{ $message }}</small>
                                            @enderror
                                            <!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <div class="form-group col-lg-12">
                                            <label>Current password (leave blank to leave unchanged)</label>
                                            <input type="password" name="old_password" class="form-control">
                                        </div>

                                        <div class="formg-group col-lg-6">
                                            <label>New password (leave blank to leave unchanged)</label>
                                            <input type="password" name="password" class="form-control">
                                            @error('password')
                                            <small id="emailHelp" name="name" value="{{ Auth::user()->name }}" class="form-text text-danger mt-1">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Confirm new password</label>
                                            <input type="password" name="password_confirmation" class="form-control mb-2">
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SAVE CHANGES</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div>
                                        </div>
                                </form>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>The following addresses will be used on the checkout page by default.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Your Address</h3><!-- End .card-title -->
                                                @if($userAddress)
                                                <p>{{ $userAddress->country }}<br>
                                                    {{ $userAddress->address1 }}<br>
                                                    {{ $userAddress->address2 }}<br>
                                                    {{ $userAddress->landmark }}<br>
                                                    {{ $userAddress->phone }}<br>
                                                    {{ Auth::user()->email }}<br>
                                                    @else
                                                <p>You have not set up this type of address yet.<br>
                                                    @endif
                                                    <a href="{{ route('address') }}">Edit <i class="icon-edit"></i></a>
                                                </p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div>
                            </div><!-- End .col-lg-9 -->

                            <!-- <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Hello <span class="font-weight-normal text-dark">User</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="#">Log out</a>)
                                    <br>
                                    From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.
                                </p>
                            </div> -->

                        </div>
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
