@extends('layout\app')

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('/web/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Grid 4 Columns<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Grid 4 Columns</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
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
                                        <option value="rating">another</option>
                                    </select>
                                </div>
                            </div> -->

                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->
                    @if(!$searchResults->count())
                    <div class="alert alert-info alert-dismissible fade show mt-2 mb-2" role="alert">
                        You search did't return any result
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @else

                    <div class="products mb-3">
                        <div class="row">

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


                            @foreach($searchResults as $result)

                            @if($result->old_price)
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        @if($result->tag)
                                        <span class="product-label label-new">{{ $result->tag  }} </span>
                                        @endif
                                        <img src="/products/{{ $result->product_image }}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div>
                                        @if(Auth::user())
                                        @if(!$result->hasCart(Auth::user()))
                                        <form action="{{ route('carts', ['product' => $result]) }}" method="post">
                                            @csrf
                                            <div class="product-action">
                                                <button type="submit" class="btn btn-product btn-no-border btn-cart"><span>add to cart</span></button>
                                            </div>
                                        </form>
                                        @else
                                        <form action="{{ route('carts', ['product' => $result]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="product-action">
                                                <button type="submit" class="btn btn-product btn-no-border btn-cart"><span>remove from cart</span></button>
                                            </div>
                                        </form>
                                        @endif
                                        @else
                                        <form action="{{ route('carts', ['product' => $result]) }}" method="post">
                                            @csrf
                                            <div class="product-action">
                                                <button type="submit" class="btn btn-product btn-no-border btn-cart"><span>add to cart</span></button>
                                            </div>
                                        </form>
                                        @endif
                                    </figure>

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $result->product_category }}</a>
                                        </div>
                                        <h3 class="product-title"><a href="product.html">{{ $result->product_name }}</a></h3>
                                        <div class="product-price">
                                            <span class="new-price">${{ $result->product_price }}</span>
                                            <span class="old-price">Was ${{ $result->old_price}}</span>

                                        </div>


                                        <div class="product-nav product-nav-thumbs">
                                            <a href="#" class="active">
                                                <img src="/products/{{ $result->product_image }}" alt="product desc">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else

                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        @if($result->tag)
                                        <span class="product-label label-new">{{ $result->tag  }} </span>
                                        @endif
                                        <img src="/products/{{ $result->product_image }}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div>
                                    </figure>

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $result->product_category }}</a>
                                        </div>
                                        <h3 class="product-title"><a href="product.html">{{ $result->product_name }}</a></h3>
                                        <div class="product-price">
                                            ${{ $result->product_price }}
                                        </div>


                                        <div class="product-nav product-nav-thumbs">
                                            <a href="#" class="active">
                                                <img src="/products/{{ $result->product_image }}" alt="product desc">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @endforeach
                            @endif
                        </div><!-- End .row -->
                    </div><!-- End .products -->


                    <nav aria-label="Page navigation">
                        {{ $searchResults->links('pagination::bootstrap-5') }}
                    </nav>
                </div><!-- End .col-lg-9 -->



            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
