@extends('layout\app')


@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Address</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('/web/assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Address</a>
                        </li>

                    </ul>
                    @if($userAddress)
                    <div class="tab-content">
                        <!-- beginning of login tab-->

                        <!-- <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2"> -->
                        <form action="{{ route('address') }}" method="post">
                            @csrf
@method('put')
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
                                <label for="register-email-2">Country *</label>
                                <select type="text" class="form-control" name="country" required>
                                    <option value="Nigeria" selected>{{ $userAddress->country }}</option>
                                    <option value="Nigeria">Nigeria</option>
                                </select>
                                @error('country')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="register-email-2">Address Line 1 *</label>
                                <input type="text" class="form-control" id="register-email-2" name="address1" value="{{ $userAddress->address1 }}" placeholder="Enter your address" required>
                                @error('address1')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="register-password-2">Address Line 2 *</label>
                                <input type="text" class="form-control" id="register-password" name="address2" value="{{ $userAddress->address2 }}" placeholder="Optional">
                                @error('address2')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->


                            <div class="form-group">
                                <label for="register-password-2">Landmark *</label>
                                <input type="text" class="form-control" id="register-password" name="landmark" value="{{ $userAddress->landmark }}" placeholder="Enter closest landmark" required>
                                @error('landmark')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="register-password-2">Phone Number *</label>
                                <input type="tel" class="form-control" id="register-password" name="phone" value="{{ $userAddress->phone }}" placeholder="Provide a phone number" required>
                                @error('phone')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>SAVE CHANGES</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>

                            </div><!-- End .form-footer -->
                        </form>
                        <!-- </div> -->
                        <!-- .End .tab-pane -->
                        <!-- End of login tab-->
                        <!-- beginning of login tab-->
                    </div><!-- End .tab-content -->
                    @else

                    <div class="tab-content">
                        <!-- beginning of login tab-->

                        <!-- <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2"> -->
                        <form action="{{ route('address') }}" method="post">
                            @csrf

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
                                <label for="register-email-2">Country *</label>
                                <select type="text" class="form-control" name="country" required>
                                    <option value="" selected>Select a country</option>
                                    <option value="Nigeria">Nigeria</option>
                                </select>
                                @error('country')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="register-email-2">Address Line 1 *</label>
                                <input type="text" class="form-control" id="register-email-2" name="address1" placeholder="Enter your address" required>
                                @error('address1')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="register-password-2">Address Line 2 *</label>
                                <input type="text" class="form-control" id="register-password" name="address2" placeholder="Optional">
                                @error('address2')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->


                            <div class="form-group">
                                <label for="register-password-2">Landmark *</label>
                                <input type="text" class="form-control" id="register-password" name="landmark" placeholder="Enter closest landmark" required>
                                @error('landmark')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="register-password-2">Phone Number *</label>
                                <input type="tel" class="form-control" id="register-password" name="phone" placeholder="Provide a phone number" required>
                                @error('phone')
                                <small id="emailHelp" class="form-text text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>SAVE ADDRESS</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>

                            </div><!-- End .form-footer -->
                        </form>
                        <!-- </div> -->
                        <!-- .End .tab-pane -->
                        <!-- End of login tab-->
                        <!-- beginning of login tab-->
                    </div><!-- End .tab-content -->


                    @endif

                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->

@endsection
