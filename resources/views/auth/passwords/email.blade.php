@extends('layout\app')


@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('/logo/davetrack login page website (1).jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link text-success" style="font-weight: bolder;" id="signin-tab-2">RESET PASSWORD</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <!-- beginning of login tab-->

                        <!-- <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2"> -->
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="register-email-2">Email Address *</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>Send Password Reset Link</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </div><!-- End .form-footer -->
                        </form>


                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->

@endsection
