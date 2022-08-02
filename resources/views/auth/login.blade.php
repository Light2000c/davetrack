@extends('layout\app')


@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('/web/assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link text-success" style="font-weight: bolder;" id="signin-tab-2">Sign In</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <!-- beginning of login tab-->

                        <!-- <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2"> -->
                            <form action="{{ route('login') }}" method="post">
                                @csrf

                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                                <div class="form-group">
                                    <label for="register-email-2">Your email address *</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" id="register-email-2" name="email" placeholder="Enter your email" required>
                                    @error('email')
                                    <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Password *</label>
                                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Provide password" required>
                                    @error('password')
                                    <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                    @enderror
                                </div><!-- End .form-group -->
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>LOG IN</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control">
                                       <label class="custom-control" >Don't have an accout? <a href="#">Sign up</a> *</label>
                                    </div>

                                    <a href="{{ route('forgot-password') }}" class="forgot-link">Forgot Your Password?</a>
                                </div><!-- End .form-footer -->
                            </form>

                        <!-- </div> -->
                        <!-- .End .tab-pane -->

                        <!-- End of login tab-->


                        <!-- beginning of login tab-->


                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->

@endsection
