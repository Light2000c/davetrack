<!DOCTYPE html>
<html lang="en">


<head>
    <title>Mentor - Bootstrap 4 Admin Dashboard Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="/assets2/img/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="/assets2/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="/assets2/css/style.css" />
</head>

<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="/assets2/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h1 class="mb-2">Davetrack Technologies</h1>
                                        <p>Hi Admin welcome back, please login to your account.</p>
                                        <form action="{{ route('admin-login') }}" class="mt-3 mt-sm-5" method="post">
                                            @csrf
                                            <div class="row">
                                                @if(session('msg'))
                                                <div class="alert alert-danger mb-2" role="alert">
                                                    {{ @session('msg') }}
                                                </div>
                                                @endif
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Email*</label>
                                                        <input type="email" class="form-control" name="email" value="{{  old('email')}}" placeholder="Enter Email" />
                                                    </div>
                                                    @error('email')
                                                    <div style="margin-top: -10px;" class="mb-3 text-danger">
                                                        <small>{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password*</label>
                                                        <input type="password" class="form-control" name="password" value="{{  old('password')}}" placeholder="Enter your password" />
                                                    </div>
                                                    @error('password')
                                                    <div style="margin-top: -10px;" class="mb-3 text-danger">
                                                        <small>{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-block d-sm-flex  align-items-center">
                                                        <!-- <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                                            <label class="form-check-label" for="gridCheck">
                                                                Remember Me
                                                            </label>
                                                        </div> -->
                                                        <a href="{{ route('forgot-password') }}"  class="ml-auto">Forgot Password ?</a>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="submit" class="btn btn-primary text-uppercase">Sign In</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="/assets2/img/bg/login.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->



    <!-- plugins -->
    <script src="/assets2/js/vendors.js"></script>

    <!-- custom app -->
    <script src="/assets2/js/app.js"></script>
</body>


</html>
