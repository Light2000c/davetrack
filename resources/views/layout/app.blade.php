<!DOCTYPE html>
<html lang="en">


<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Davetrack - Electronic Online Shop</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/web/assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/web/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/web/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/web/assets/images/icons/site.html">
    <link rel="mask-icon" href="/web/assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="/web/assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="/web/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="/web/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/web/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/web/assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/web/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <div class="header-dropdown">
                            @if(Auth::user())
                            <a href="#"><i class="icon-user"></i>{{ Auth::user()->name }}</a>
                            <div class="header-menu">
                                <ul>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button class="btn btn-outline-primary-2 btn-order btn-block">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li><a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a></li>
                                    @if(Auth::user())
                                    <li><a href="{{ route('wishlist') }}"><i class="icon-heart-o"></i>My Wishlist <span>({{ $wishess->count() }})</span></a></li>
                                    @else
                                    <li><a href="{{ route('wishlist') }}"><i class="icon-heart-o"></i>My Wishlist <span>()</span></a></li>
                                    @endif
                                    <li><a href="about.html">Categories</a></li>
                                    @if(!Auth::user())
                                    <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                                    @endif
                                    <li id="search-hide">
                                        <span class="mobile-menu-close"><i class="icon-close"></i></span>

                                        <form action="{{ route('searching') }}" method="post" class="mobile-search">
                                            @csrf
                                            <label for="mobile-search" class="sr-only">Search</label>
                                            <input type="search" class="form-control search-hide" name="search" id="mobile-search" placeholder="Search in..." required>
                                            <button type="submit" class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.html" class="logo">
                            <img src="/logo/davetracklogo ggg 2Artboard 1@2x.png" alt="Molla Logo" width="150" height="48">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="{{ route('home') }}" class="sf">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('main-product') }}" class="sf-with-ul">Products</a>

                                    <ul>
                                        @foreach($acategories as $acategory)
                                        <li><a href="elements-products.html">{{ $acategory->title }}</a></li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}" class="sf">About us</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}" class="sf">Contact</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <!-- <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                                </div>
                            </form>
                        </div> -->


                        <div class="dropdown cart-dropdown">
                            <a href="{{ route('cart') }}" class="dropdown-toggle" role="button">
                                <i class="icon-shopping-cart"></i>
                                @if(Auth::user())
                                <span class="cart-count" id="cartTotal">{{ $cartt->count() }}</span>
                                @endif
                            </a>

                            <!--  @if(Auth::user())
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">

                                    @if($cartt->count())
                                    @foreach($cartt as $cart )
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">{{ $cart->product->product_name }}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">{{ $cart->quantity }}</span>
                                                x ${{ $cart->product->product_price }}
                                            </span>
                                        </div>

                                        <figure class="product-image-container">
                                            <a href="{{ route('view-product', $cart->product) }}" class="product-image">
                                                <img src="/products/{{ $cart->product->product_image }}" alt="product">
                                            </a>
                                        </figure>
                                        <form action="{{ route('carts',['product' => $cart->product]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-remove" title="Remove Product"><i class="icon-close"></i></button>
                                        </form>
                                    </div>
                                    @endforeach
                                    @else
                                    you have no cart yet
                                    @endif
                                </div>

                                <div class="dropdown-cart-total">
                                    <span>Total</span>
                                    @php
                                    $cart_total = 0;
                                    foreach($cartt as $cartts){
                                    $newcart = $cartts->product->product_price * $cartts->quantity;
                                    $cart_total = $cart_total + $newcart;
                                    }
                                    @endphp
                                    <span class="cart-total-price">${{ $cart_total }}</span>
                                </div>


                                <div class="dropdown-cart-action">
                                    <a href="{{ route('cart') }}" class="btn btn-primary">View All</a>
                                    <a href="{{ route('main-product') }}" class="btn btn-outline-primary-2"><span>Shop</span><i class="icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                            @endif -->
                        </div>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->


        @yield('content')



        <footer class="footer footer-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="/logo/davetracklogo whiteArtboard 1@2x.png" class="footer-logo" alt="Footer Logo" width="210" height="65">
                                <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

                                <div class="social-icons">
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Quick Links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('contact') }}">Contacts</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    <li><a href="{{ route('login') }}">Log in</a></li>


                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Our Categories</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#"> Access control </a></li>
                                    <li><a href="#">Surveillance</a></li>
                                    <li><a href="#">Time and attendance </a></li>
                                    <li><a href="#">Networkings </a></li>
                                    <li><a href="#">Security gadgets </a></li>
                                    <li><a href="#">Tracking device</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Sign In</a></li>
                                    <li><a href="{{ route('cart') }}">View Cart</a></li>
                                    <li><a href="{{ route('wishlist') }}">My Wishlist</a></li>
                                    <li><a href="{{ route('transactions') }}">Orders</a></li>
                                    <li><a href="{{ route('address') }}">Address</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © 2022 Davetrack Technologies. All Rights Reserved.</p><!-- End .footer-copyright -->
                    <figure class="footer-payments">
                        <img src="/web/assets/images/payments.png" alt="Payment methods" width="272" height="20">
                    </figure><!-- End .footer-payments -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="{{ route('searching') }}" method="post" class="mobile-search">
                @csrf
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class=" active">
                        <a href="index.html" class="">Home</a>
                    </li>
                    <li>
                        <a href="elements-list.html" class="">Products</a>

                        <ul>
                            @foreach($acategories as $acategory)
                            <li><a href="elements-products.html">{{ $acategory->title }}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    <li>
                        <a href="elements-list.html" class="">About us</a>
                    </li>
                    <li>
                        <a href="elements-list.html" class="">Contact</a>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>

                            <!-- check later after the day -->
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="/web/assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div><!-- End .custom-checkbox -->
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="/web/assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Plugins JS File -->
    <script src="/web/assets/js/jquery.min.js"></script>
    <script src="/web/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/web/assets/js/jquery.hoverIntent.min.js"></script>
    <script src="/web/assets/js/jquery.waypoints.min.js"></script>
    <script src="/web/assets/js/superfish.min.js"></script>
    <script src="/web/assets/js/owl.carousel.min.js"></script>
    <script src="/web/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/scripts/cart.js"></script>
    <!-- Main JS File -->
    <script src="/web/assets/js/main.js"></script>
    <script src="/myScript.js"></script>
</body>


<!-- molla/index-2.html  22 Nov 2019 09:55:42 GMT -->

</html>
