@extends('layout.app')

@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('main-product') }}">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name}}</li>
            </ol>

        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row d-flex justify-content-center">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="/products/{{ $product->product_image }}" data-zoom-image="/web/assets/images/products/single/1-big.jpg" alt="product image">

                                    <a id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->


                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $product->product_name }}</h1><!-- End .product-title -->

                            <div class="product-price">
                                ₦{{ number_format($product->product_price) }}
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p>{{ $product->product_description }}</p>
                            </div><!-- End .product-content -->

                            @if(Auth::user() && $product->hasCart(Auth::user()))

                            @csrf
                            @method('put')
                            @if(session('success'))

                            @php
                            alert()->success('Success!', session('success'))->persistent('Dismiss');
                            @endphp

                            @endif

                            @if(session('error'))

                            @php
                            alert()->error('Error!', session('error'))->persistent('Dismiss');
                            @endphp

                            @endif
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" class="form-control" name="quantity" value="{{ $cart->quantity }}" min="1" max="10" step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->
                            @endif
                            <div class="product-details-action">
                                @if(Auth::user() && $product->hasCart(Auth::user()))
                                <form action="{{ route('carts', ['product' => $product]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-product btn-cart"><span>remove from cart</span></button>
                                </form>
                                @else
                                <form action="{{ route('carts', ['product' => $product]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                </form>
                                @endif

                                @if(Auth::user())
                                @if($product->hasWishlist(Auth::user()))
                                <form action="{{ route('add-to-wishlist',$product) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="details-action-wrapper">
                                        <button class="btn-product btn btn-wishlist" title="Wishlist"><span>Remove from Wishlist</span></button>
                                    </div><!-- End .details-action-wrapper -->
                                </form>
                                @else
                                <form action="{{ route('add-to-wishlist',$product) }}" method="post">
                                    @csrf
                                    <div class="details-action-wrapper">
                                        <button class="btn-product btn btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></button>
                                    </div><!-- End .details-action-wrapper -->
                                </form>
                                @endif
                                @else
                                <form action="{{ route('add-to-wishlist',$product) }}" method="post">
                                    @csrf
                                    <div class="details-action-wrapper">
                                        <button class="btn-product btn btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></button>
                                    </div><!-- End .details-action-wrapper -->
                                </form>
                                @endif
                            </div><!-- End .product-details-action -->

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="#">{{ $product->product_category }}</a>
                                </div><!-- End .product-cat -->

                                <!-- <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div> -->
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p>{{ $product->description }}</p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Delivery & returns</h3>
                            <p>We deliver to all 36 states in Nigeria. For full details of the delivery options we offer, when you've ordered a product we do negotiation on the delivery fee.</p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
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
                @foreach($others as $other)

                @if($other->old_price)
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        @if($other->tag)
                        <span class="product-label label-new">New</span>
                        @endif
                        <a href="{{ route('view-product', ['product'=> $other]) }}">
                            <img src="/products/{{ $other->product_image }}" alt="Product image" class="product-image">
                        </a>

                        <!-- <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div> -->
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="{{ route('view-product', ['product'=> $other]) }}">{{ $other->product_category }}</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">{{ $other->product_name }}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="new-price"> ₦{{ number_format($other->product_price) }}</span>
                            <span class="old-price">Was ₦{{ number_format($other->old_price) }}</span>
                        </div><!-- End .product-price -->


                        <div class="product-nav product-nav-thumbs">
                            <a href="#" class="active">
                                <img src="/products/{{ $other->product_image }}" alt="product desc">
                            </a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                @else

                <div class="product product-7 text-center">
                    <figure class="product-media">
                        @if($other->tag)
                        <span class="product-label label-new">New</span>
                        @endif
                        <a href="{{ route('view-product', ['product'=> $other]) }}">
                            <img src="/products/{{ $other->product_image }}" alt="Product image" class="product-image">
                        </a>

                        <!-- <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div> -->
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="{{ route('view-product', ['product'=> $other]) }}">{{ $other->product_category }}</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">{{ $other->product_name }}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="new-price"> ₦{{ number_format($other->product_price) }}</span>
                        </div><!-- End .product-price -->


                        <div class="product-nav product-nav-thumbs">
                            <a href="{{ route('view-product', ['product'=> $other]) }}" class="active">
                                <img src="/products/{{ $other->product_image}}" alt="product desc">
                            </a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                @endif
                @endforeach
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@if(Auth::user())
<script>
    $(document).ready(function() {
        $("#qty").on("change", function(e) {

            var qty = document.getElementById("qty").value;
            console.log(qty);
            e.preventDefault();
            $.ajax({
                type: 'PUT',
                url: "http://127.0.0.1:8000/api/quantity",
                data: {
                    userId: "{{ Auth::user()->id }}",
                    productId: "{{ $product->id}}",
                    quantity: qty
                },
                success: function(data) {
                    res = JSON.parse(data);
                    if (res.success) {
                        cartItems("{{ Auth::user()->id }}");
                    }
                }

            });
        });
    });
</script>
@endif

@endsection
