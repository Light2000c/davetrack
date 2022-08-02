@extends('layout\app')

@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('main-product') }}">Products</a></li>
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

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
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
                                ${{ $product->product_price }}
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
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. </p>
                            <ul>
                                <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. </li>
                                <li>Vivamus finibus vel mauris ut vehicula.</li>
                                <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                            </ul>

                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. </p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <h3>Information</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. </p>

                            <h3>Fabric & care</h3>
                            <ul>
                                <li>Faux suede fabric</li>
                                <li>Gold tone metal hoop handles.</li>
                                <li>RI branding</li>
                                <li>Snake print trim interior </li>
                                <li>Adjustable cross body strap</li>
                                <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                            </ul>

                            <h3>Size</h3>
                            <p>one size</p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Delivery & returns</h3>
                            <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <h3>Reviews (2)</h3>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">Samanta J.</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">6 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Good, perfect size</h4>

                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->

                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">John Doe</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">5 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Very good</h4>

                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                        </div><!-- End .reviews -->
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
                            <span class="new-price">${{ $other->product_price }}</span>
                            <span class="old-price">Was ${{ $other->old_price}}</span>
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
                            <span class="new-price">${{ $other->product_price }}</span>
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
                }

            });
        });
    });
</script>
@endif

@endsection
