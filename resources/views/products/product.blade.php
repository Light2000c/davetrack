@extends('layout\app')

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('/web/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Products<span></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('main-product') }}">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">

        <div class="container">
            <div class="heading heading-center mb-1">
                <h2 class="title-lg">Top Products</h2><!-- End .title -->

                <!-- <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab" role="tab" aria-controls="trendy-all-tab" aria-selected="true">Top Products</a>
                </li>
            </ul> -->
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
                                        "items":5
                                    },
                                    "1200": {
                                        "items":5,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                        @foreach($products as $product)

                        @if($product->old_price)

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                @if($product->tag)
                                <span class="product-label label-new">{{ $product->tag }}</span>
                                @endif
                                <a href="{{ route('view-product', ['product'=>$product]) }}">
                                    <img src="/products/{{ $product->product_image }}" alt="Product image" class="product-image">
                                    <img src="/products/{{ $product->product_image }}" alt="Product image" class="product-image-hover">
                                </a>

                                <!-- <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div> -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('view-product', ['product'=>$product]) }}">{{ $product->product_name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price"> ${{ $product->product_price }}</span>
                                    <span class="old-price">Was ${{ $product->old_price}}</span>

                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <!-- <div class="product-action"> -->




                            <!-- </div> -->
                        </div><!-- End .product -->
                        @else
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                @if($product->tag)
                                <span class="product-label label-new">{{ $product->tag }}</span>
                                @endif
                                <a href="{{ route('view-product', ['product'=>$product]) }}">
                                    <img src="/products/{{ $product->product_image }}" alt="Product image" class="product-image">
                                    <img src="/products/{{ $product->product_image }}" alt="Product image" class="product-image-hover">
                                </a>

                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('view-product', ['product'=>$product]) }}">{{ $product->product_name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    ${{ $product->product_price }}
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <!-- <div class="product-action"> -->
                            <!-- </div> -->
                        </div><!-- End .product -->
                        @endif
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->


            </div><!-- End .tab-content -->
        </div><!-- End .container -->



        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9">
                    <div class="toolbox">

                        <div class="toolbox-right">
                            <!-- <div class="toolbox-sort">
                                <label for="sortby">Category:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option selected="selected">All</option>
                                        @foreach($categories as $category)
                                        <option value="rating">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->

                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center">

                            <!-- <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">New</span>
                                                <a href="product.html">
                                                    <img src="/web/assets/images/products/product-4.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="/web/popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                </div>

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div>
                                            </figure>

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Women</a>
                                                </div>
                                                <h3 class="product-title"><a href="product.html">Brown paperbag waist pencil skirt</a></h3>
                                                <div class="product-price">
                                                    $60.00
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                    </div>
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div>

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/web/assets/images/products/product-4-thumb.jpg" alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/web/assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                                                    </a>

                                                    <a href="#">
                                                        <img src="/web/assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                            @foreach($products as $product)

                            @if($product->old_price)
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        @if($product->tag)
                                        <span class="product-label label-new">{{ $product->tag  }} </span>
                                        @endif
                                        <a href="{{ route('view-product', ['product'=>$product]) }}">
                                            <img src="/products/{{ $product->product_image }}" alt="Product image" class="product-image">
                                        </a>
                                        @if(Auth::user())
                                        @if(!$product->hasCart(Auth::user()))
                                        <div class="product-action">
                                            <button href="" id="{{ $product->id }}" class="btn-product btn-cart"><span>add to cart</span></button>
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
                                            <a href="{{ route('view-product', ['product'=>$product]) }}">{{ $product->product_category }}</a>
                                        </div>
                                        <h3 class="product-title"><a href="product.html">{{ $product->product_name }}</a></h3>
                                        <div class="product-price">
                                            <span class="new-price">${{ $product->product_price }}</span>
                                            <span class="old-price">Was ${{ $product->old_price}}</span>

                                        </div>


                                        <div class="product-nav product-nav-thumbs">
                                            <a href="" class="active">
                                                <img src="/products/{{ $product->product_image }}" alt="product desc">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else

                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        @if($product->tag)
                                        <span class="product-label label-new">{{ $product->tag  }} </span>
                                        @endif
                                        <a href="{{ route('view-product', ['product'=>$product]) }}">
                                            <img src="/products/{{ $product->product_image }}" alt="Product image" class="product-image">
                                        </a>

                                        @if(Auth::user())
                                        @if(!$product->hasCart(Auth::user()))
                                        <div class="product-action">
                                            <button href="" id="{{ $product->id }}" class="btn-product btn-cart"><span>add to cart</span></button>
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
                                            <a href="{{ route('view-product', ['product'=>$product]) }}">{{ $product->product_category }}</a>
                                        </div>
                                        <h3 class="product-title"><a href="product.html">{{ $product->product_name }}</a></h3>
                                        <div class="product-price">
                                            ${{ $product->product_price }}
                                        </div>


                                        <div class="product-nav product-nav-thumbs">
                                            <a href="" class="active">
                                                <img src="/products/{{ $product->product_image }}" alt="product desc">
                                            </a>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div><!-- End .row -->
                    </div><!-- End .products -->


                    <nav aria-label="Page navigation">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </nav>
                </div><!-- End .col-lg-9 -->


                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear"></a>
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach($categories as $category)
                                        <div class="filter-item">
                                            <a href="index.html">
                                                <div>
                                                    <label>{{ $category->title }}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <!-- <span class="item-count">3</span> -->
                                            </a>
                                        </div><!-- End .filter-item -->
                                        @endforeach


                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Tags
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach($categories as $category)
                                        <div class="filter-item">
                                            <a href="index.html">
                                                <div>
                                                    <label>{{ $category->title }}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <!-- <span class="item-count">3</span> -->
                                            </a>
                                        </div><!-- End .filter-item -->
                                        @endforeach


                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
