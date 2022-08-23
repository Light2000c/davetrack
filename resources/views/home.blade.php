@extends('layout.app')

@section('content')

<main class="main">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/logo/davetrack 1.jpg" alt="First slide">
                <div class="intro-content">
                    <h3 class="intro-subtitle">Topsale Collection</h3><!-- End .h3 intro-subtitle -->
                    <h1 class="intro-title">Security<br>Gadgets</h1><!-- End .intro-title -->

                    <a href="{{ route('main-product', ['category' => 'Security gadgets']) }}" class="btn btn-outline-white">
                        <span>SHOP NOW</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div><!-- End .intro-content -->
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/logo/davetrack slider 2.jpg" alt="Second slide">
                <div class="intro-content">
                    <h3 class="intro-subtitle">Access Controls</h3><!-- End .h3 intro-subtitle -->
                    <h1 class="intro-title">New Arrivals</h1><!-- End .intro-title -->

                    <a href="{{ route('main-product', ['category' => 'Access control']) }}" class="btn btn-outline-white">
                        <span>SHOP NOW</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <div class="pt-2 pb-2">
        <div class="container brands">
            <div class="banner-group">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="banner banner-overlay">
                            <a >
                                <img src="/logo/davetrackkk home 3 (1).jpg" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h3 class="banner-title text-white"><a>24/7 Security <br>Coverage</a></h3><!-- End .banner-title -->
                                <a href="{{ route('main-product', 'Security gadgets') }}" class="btn btn-outline-white banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                            </div>
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-4 -->

                    <div class="col-sm-6 col-lg-4">
                        <div class="banner banner-overlay">
                            <a>
                                 <img src="/logo/davetrack home 2 (1).jpg" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h4 class="banner-subtitle"><a >Best in</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title text-white"><a>Surveillance <br></a></h3><!-- End .banner-title -->
                                <a href="{{ route('main-product', 'Surveillance') }}" class="btn btn-outline-white banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-4 -->

                    <div class="col-sm-6 col-lg-4 d-none d-lg-block">
                        <div class="banner banner-overlay">
                            <a>
                            <img src="/logo/davetrackkk home1 (1).jpg" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h3 class="banner-title"><a><strong>Best in<br>Connectivity </strong></a></h3><!-- End .banner-title -->
                                <a href="{{ route('main-product') }}" class="btn btn-outline-white banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .banner-group -->
        </div><!-- End .container -->
    </div><!-- End .bg-lighter -->


    <div class="mb-6"></div><!-- End .mb-6 -->

    <div class="container">
        <div class="heading heading-center mb-3">
            <h2 class="title-lg">Trendy Products</h2><!-- End .title -->

            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab" role="tab" aria-controls="trendy-all-tab" aria-selected="true">Security Gadgets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="trendy-fur-link" data-toggle="tab" href="#trendy-fur-tab" role="tab" aria-controls="trendy-fur-tab" aria-selected="false">Access Controls</a>
                </li>
            </ul>
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                    @foreach($securities as $security)

                    @if($security->old_price)

                    <div class="product product-11 text-center">
                        <figure class="product-media">
                            @if($security->tag)
                            <span class="product-label label-new">{{ $security->tag }}</span>
                            @endif
                            <a href="{{ route('view-product', ['product'=>$security]) }}">
                                <img src="/products/{{ $security->product_image }}" alt="Product image" class="product-image">
                                <img src="/products/{{ $security->product_image }}" alt="Product image" class="product-image-hover">
                            </a>

                            <!-- <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div> -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="{{ route('view-product', ['product'=> $security]) }}">{{ $security->product_name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price"> ₦{{ number_format($security->product_price) }}</span>
                                <span class="old-price">Was ₦{{ number_format($security->old_price) }}</span>

                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <!-- <div class="product-action"> -->




                        <!-- </div> -->
                    </div><!-- End .product -->
                    @else
                    <div class="product product-11 text-center">
                        <figure class="product-media">
                            @if($security->tag)
                            <span class="product-label label-new">{{ $security->tag }}</span>
                            @endif
                            <a href="{{ route('view-product', ['product'=> $security]) }}">
                                <img src="/products/{{ $security->product_image }}" alt="Product image" class="product-image">
                                <img src="/products/{{ $security->product_image }}" alt="Product image" class="product-image-hover">
                            </a>

                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 style="color: #0e6938; " class="product-title"><a href="{{ route('view-product', ['product'=> $security]) }}">{{ $security->product_name}}</a></h3><!-- End .product-title -->
                            <div style="color: #8ec640;" class="product-price">
                                ₦{{ number_format($security->product_price) }}
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <!-- <div class="product-action"> -->

                        <!-- </div> -->
                    </div><!-- End .product -->
                    @endif
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->


            <div class="tab-pane p-0 fade" id="trendy-fur-tab" role="tabpanel" aria-labelledby="trendy-fur-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>


                    @foreach($controls as $control)

                    @if($control->old_price)

                    <div class="product product-11 text-center">
                        <figure class="product-media">
                            @if($control->tag)
                            <span class="product-label label-new">{{ $control->tag }}</span>
                            @endif
                            <a href="{{ route('view-product', ['product'=>$control]) }}">
                                <img src="/products/{{ $control->product_image }}" alt="Product image" class="product-image">
                                <img src="/products/{{ $control->product_image }}" alt="Product image" class="product-image-hover">
                            </a>

                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="{{ route('view-product', ['product'=>$control]) }}">{{ $control->product_name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price"> ₦{{ number_format($control->product_price) }}</span>
                                <span class="old-price">Was ₦{{ number_format($control->old_price) }}</span>

                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->

                    </div><!-- End .product -->
                    @else
                    <div class="product product-11 text-center">
                        <figure class="product-media">
                            @if($control->tag)
                            <span class="product-label label-new">{{ $control->tag }}</span>
                            @endif
                            <a href="{{ route('view-product', ['product'=>$control]) }}">
                                <img src="/products/{{ $control->product_image }}" alt="Product image" class="product-image">
                                <img src="/products/{{ $control->product_image }}" alt="Product image" class="product-image-hover">
                            </a>

                            <!-- <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div> -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="{{ route('view-product', ['product'=>$control]) }}">{{ $control->product_name}}</a></h3><!-- End .product-title -->
                            <div style="color: #8ec640;" class="product-price">
                                ₦{{ number_format($control->product_price) }}
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    @endif
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->




        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="container categories pt-6">
        <h2 class="title-lg text-center mb-4">Shop by Categories</h2><!-- End .title-lg text-center -->

        <div class="row">
            <div class="col-6 col-lg-4">
                <div class="banner banner-display banner-link-anim">
                    <a>
                        <img src="/logo/davetrack site img  3.jpg" alt="Banner">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h3 class="banner-title text-white"><a>Security Gadgets</a></h3><!-- End .banner-title -->
                        <a href="{{ route('main-product', 'Security Gadgets') }}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-sm-6 col-lg-3 -->
            <div class="col-6 col-lg-4 order-lg-last">
                <div class="banner banner-display banner-link-anim">
                    <a>
                        <img src="/logo/davetrack site img  4.jpg" alt="Banner">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h3 class="banner-title text-white"><a>Networking</a></h3><!-- End .banner-title -->
                        <a href="{{ route('main-product', 'Networking') }}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-sm-6 col-lg-3 -->
            <div class="col-sm-12 col-lg-4 banners-sm">
                <div class="row">
                    <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                        <a>
                            <img src="/logo/davetrack site img  5.jpg" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">Tracking Devices</a></h3><!-- End .banner-title -->
                            <a href="{{ route('main-product', 'Tracking Devices') }}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->

                    <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                        <a>
                            <img src="/logo/davetrack site img  6.jpg" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a>Access Control</a></h3><!-- End .banner-title -->
                            <a href="{{ route('main-product', 'Access Controls') }}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div>
            </div><!-- End .col-sm-6 col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
    <div class="mb-5"></div><!-- End .mb-6 -->


        <div class="container for-you">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">Recent Arrivals</h2><!-- End .title -->
                </div><!-- End .heading-left -->

                <div class="heading-right">
                    <a href="{{ route('main-product') }}" class="title-link">View All  Products <i class="icon-long-arrow-right"></i></a>
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->


            <div class="products">
                <div class="row justify-content-center">
                    @foreach($newlyAdded as $new)

                    @if($new->old_price)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-2">
                            <figure class="product-media">
                                @if($new->tag)
                                <span class="product-label label-circle label-sale">{{ $new->tag}}</span>
                                @endif
                                <a href="{{ route('view-product', $new) }}">
                                    <img src="/products/{{ $new->product_image}}" alt="Product image" class="product-image">
                                </a>

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="">{{ $new->product_category}}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{ route('view-product', $new) }}">{{ $new->product_name }}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price"> ₦{{ number_format($new->product_price) }}</span>
                                    <span class="old-price"> ₦{{ number_format($new->old_price) }}</span>
                                </div><!-- End .product-price -->

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    @else
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-2">
                            <figure class="product-media">
                            @if($new->tag)
                                <span class="product-label label-circle label-new">{{ $new->tag}}</span>
                                @endif
                                <a href="{{ route('view-product', $new) }}">
                                    <img src="/products/{{ $new->product_image}}" alt="Product image" class="product-image">
                                </a>

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="">{{ $new->product_category }}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{ route('view-product', $new) }}">{{ $new->product_name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                     ₦{{ number_format($new->product_price) }}
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endif
                    @endforeach
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- End .container -->


        <div class="container">
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-rocket"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                        <p>Free Delivery for orders over ₦100000</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-rotate-left"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                        <p>Free 100% money back guarantee</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-life-ring"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                        <p>Always online feedback 24/7</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
        </div><!-- End .row -->

        <div class="mb-2"></div><!-- End .mb-2 -->

        <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url(/web/assets/images/backgrounds/cta/bg-6.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9 col-xl-8">
                        <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                            <div class="col">
                                <h3 class="cta-title text-white">Sign Up For Affordable Deals</h3><!-- End .cta-title -->
                                <p class="cta-desc text-white">Davetrack Technologies provide the best product for sale.</p><!-- End .cta-desc -->
                            </div><!-- End .col -->

                            <div class="col-auto">
                                <a href="{{ route('register') }}" class="btn btn-outline-white"><span>SIGN UP</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .col-auto -->
                        </div><!-- End .row no-gutters -->
                    </div><!-- End .col-md-10 col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cta -->

</main><!-- End .main -->

@endsection
