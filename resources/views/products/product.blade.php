@extends('layout.app')

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('/web/assets/images/page-header-bg.jpg')">
        <div class="container-fluid">
            <h1 class="page-title">Products<span></span></h1>
        </div><!-- End .container-fluid -->
    </div><!-- End .page-header -->
    <a class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div><!-- End .container-fluid -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container-fluid">
            <div class="toolbox">

            </div><!-- End .toolbox -->

            <div class="products">
                <div class="row">
                    @if(!$products->count())
                    <div class="alert alert-info col-7" role="alert">
                        Filter didn't return any result
                    </div>
                    @else
                    @foreach($products as $product)

                    @if($product->old_price)
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2">
                        <div class="product product-7">
                            <figure class="product-media">
                                @if($product->tag)
                                <span class="product-label label-sale">{{ $product->tag}}</span>
                                @endif
                                <a href="{{ route('view-product', $product)}}">
                                    <img src="/products/{{ $product->product_image }}" alt="Product image" class="product-image">
                                </a>

                                @if(Auth::user())
                                @if(!$product->hasCart(Auth::user()))
                                <div class="product-action">
                                    <button id="{{ $product->id }}" class="btn-product btn-cart"><span>add to cart</span></button>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("#{{ $product->id}}").on("click", function(e) {

                                            var cartBtn = document.getElementById("{{ $product->id }}").value;
                                            e.preventDefault();
                                            $.ajax({
                                                type: 'POST',
                                                url: "http://127.0.0.1:8000/api/addCart",
                                                data: {
                                                    userId: "{{ Auth::user()->id }}",
                                                    productId: "{{ $product->id }}",
                                                },
                                                success: function(data) {
                                                    res = JSON.parse(data);
                                                    if (res.success) {
                                                        $('#{{ $product->id }}').hide();
                                                        cartCount("{{ Auth::user()->id }}");
                                                    }
                                                }
                                            });
                                            // myCarts("{{ Auth::user()->id }}");
                                        });
                                    });
                                </script>
                                @endif
                                @else
                                <div class="product-action">
                                    <a href="{{ route('cart') }}" id="{{ $product->id }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div>
                                @endif


                            </figure>

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="">{{ $product->product_category }}</a>
                                </div>
                                <h3 class="product-title"><a href="{{ route('view-product',$product) }}">{{ $product->product_name }}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price"> ₦{{ number_format($product->product_price) }}</span>
                                    <span class="old-price"> ₦{{ number_format($product->old_price) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2">
                        <div class="product product-7">
                            <figure class="product-media">
                                @if($product->tag)
                                <span class="product-label label-sale">{{ $product->tag }}</span>
                                @endif
                                <a href="{{ route('view-product', $product) }}">
                                    <img src="/products/{{ $product->product_image }}" alt="Product image" class="product-image">
                                </a>

                                @if(Auth::user())
                                @if(!$product->hasCart(Auth::user()))
                                <div class="product-action">
                                    <button id="{{ $product->id }}" class="btn-product btn-cart"><span>add to cart</span></button>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("#{{ $product->id}}").on("click", function(e) {

                                            var cartBtn = document.getElementById("{{ $product->id }}").value;
                                            e.preventDefault();
                                            $.ajax({
                                                type: 'POST',
                                                url: "http://127.0.0.1:8000/api/addCart",
                                                data: {
                                                    userId: "{{ Auth::user()->id }}",
                                                    productId: "{{ $product->id }}",
                                                },
                                                success: function(data) {
                                                    res = JSON.parse(data);
                                                    if (res.success) {
                                                        $('#{{ $product->id }}').hide();
                                                        cartCount("{{ Auth::user()->id }}");
                                                    }
                                                }
                                            });
                                            // myCarts("{{ Auth::user()->id }}");
                                        });
                                    });
                                </script>
                                @endif
                                @else
                                <div class="product-action">
                                    <a href="{{ route('cart') }}" id="{{ $product->id }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div>
                                @endif

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="">{{ $product->product_category }}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{ route('view-product', $product) }}">{{ $product->product_name }}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    ₦{{ number_format($product->product_price) }}
                                </div><!-- End .product-price -->

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div>
                    @endif

                    @endforeach
                    @endif

                </div><!-- End .row -->

                <div class="load-more-container text-center">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div><!-- End .load-more-container -->
            </div><!-- End .products -->
        </div><!-- End .container-fluid -->



        <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
        <aside class="sidebar-shop sidebar-filter sidebar-filter-banner">
            <div class="sidebar-filter-wrapper">
                <div class="widget widget-clean">
                    <label><i class="icon-close"></i>Filters</label>
                </div>

                <form action="{{ route('main-product') }}" method="post">
                    @csrf
                    <div class="widget">
                        <h3 class="widget-title">
                            Categories
                        </h3><!-- End .widget-title -->

                        <div class="widget-body">
                            <div class="filter-items filter-items-count">

                            @foreach($categories as $category)
                            @if($cc1 == $category->title)
                            <div>
                                    <input type="checkbox" name="check" value="{{ $category->title}}"  checked onclick="onlyOne(this)" value="">
                                    <label for="{{ $category->title}}">{{ $category->title}}</label>
                                </div>
                             @else
                                <div>
                                    <input type="checkbox" name="check" value="{{ $category->title}}" onclick="onlyOne(this)" value="">
                                    <label for="{{ $category->title}}">{{ $category->title}}</label>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div><!-- End .widget-body -->
                    </div><!-- End .widget -->

                    <div class="widget">
                        <h3 class="widget-title">
                            Tags
                        </h3><!-- End .widget-title -->

                        <div class="widget-body">
                            <div class="filter-items filter-items-count">
                            @foreach($tags as $tag)
                            @if($t1 == $tag->title)
                            <div>
                                    <input type="checkbox" checked  name="check2" value="{{ $tag->title}}" onclick="onlyOnenext(this)" value="">
                                    <label for="{{ $tag->title }}">{{ $tag->title}}</label>
                                </div>
                            @else
                                <div>
                                    <input type="checkbox"  name="check2" value="{{ $tag->title}}" onclick="onlyOnenext(this)" value="">
                                    <label for="{{ $tag->title }}">{{ $tag->title}}</label>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div><!-- End .widget-body -->
                    </div><!-- End .widget -->



                    <div class="widget">
                        <h3 class="widget-title">
                            Price Range
                        </h3><!-- End .widget-title -->

                        <div class="widget-body">
                            <div class="filter-items filter-items-count">

                                <div>
                                    <input type="range" value="0" name="range" min="0" max="500000" oninput="this.nextElementSibling.value = this.value">
                                    <output>{{ number_format(0) }}</output>
                                </div>
                            </div>
                        </div><!-- End .widget-body -->
                    </div><!-- End .widget -->

                    <div>
                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">Filter</button>
                    </div>
                </form>

            </div><!-- End .sidebar-filter-wrapper -->
        </aside><!-- End .sidebar-filter -->
    </div><!-- End .page-content -->

</main><!-- End .main -->
@endsection
