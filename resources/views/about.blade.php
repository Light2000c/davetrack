@extends('layout.app')


@section('content')
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{  route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container">
	        	<div class="page-header page-header-big text-center" style="background-image: url('/logo/dacetrackabout us.jpg')">
        			<h1 class="page-title text-white text-start">About us<span class="text-white">Who we are</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <h2 class="title">Our Vision</h2><!-- End .title -->
                            <p>To be the leading enterprise at securing our clients/customers by providing them with substantial products that meet their needs. </p>
                        </div><!-- End .col-lg-6 -->

                        <div class="col-lg-6">
                            <h2 class="title">Our Mission</h2><!-- End .title -->
                            <p>Our mission is to ensure that our customers can rely on the efficiency of our products as we secure their homes, offices and the likes.More so create innovative ways to aid the world's technology.</p>
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->

                    <div class="mb-5"></div><!-- End .mb-4 -->
                </div><!-- End .container -->

                <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
                    <div class="container">
                        <div class="row d-flex">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <h2 class="title">Who We Are</h2><!-- End .title -->
                                <p> Davetrack Technologies is bent on serving different clients through it's innnovative gadgets,It was founded in 2022,Davetrack Technologies provides a vast range of physical security and access control gadgets.These gadgets helps in securing our customers they include security gadgets,networking gadgets,tracking devices and of course access control.</p>
                            </div><!-- End .col-lg-5 -->

                            <div class="col-lg-6 offset-lg-1">
                                <div class="about-images">
                                    <!-- <img src="/web/assets/images/about/img-1.jpg" alt="" class="about-img-front">
                                    <img src="/web/assets/images/about/img-2.jpg" alt="" class="about-img-back"> -->
                                </div><!-- End .about-images -->
                            </div><!-- End .col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .bg-light-2 pt-6 pb-6 -->

        </main><!-- End .main -->
@endsection
