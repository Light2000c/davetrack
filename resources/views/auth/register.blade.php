@extends('layout.app')


@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('/logo/davetrack login page website (1).jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link text-success" id="signin-tab-2 "  data-toggle="tab">Sign Up</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <!-- beginning of login tab-->

                        <!-- <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2"> -->
                            <form action="{{ route('register') }}" method="post">
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
                                    <label for="register-email-2">Full Name *</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" id="register-email-2" name="name" placeholder="Enter your name..." required>
                                    @error('name')
                                    <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-email-2">Your email address *</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" id="register-email-2" name="email" placeholder="example@gmail.com" required>
                                    @error('email')
                                    <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Password *</label>
                                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Create a password" required>
                                    @error('password')
                                    <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                    @enderror
                                </div><!-- End .form-group -->


                                <div class="form-group">
                                    <label for="register-password-2">Password *</label>
                                    <input type="password" class="form-control" id="register-password" name="password_confirmation" placeholder="Confirm password" required>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control">
                                       <label class="custom-control" >Already have an account? <a href="{{route('login') }}">Sign in</a></label>
                                    </div>

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
