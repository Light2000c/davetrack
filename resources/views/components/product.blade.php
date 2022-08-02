
<div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{ route('view-product', $product ) }}">
                                            <img src="/products/{{ $product->product_image }}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="#" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div>
                                        @if(Auth::user())
                                        @if(!$product->hasCart(Auth::user()))
                                        <form action="{{ route('carts', ['product' => $product]) }}" method="post">
                                            @csrf
                                            <div class="product-action">
                                                <button type="submit" class="btn btn-product btn-no-border btn-cart"><span>add to cart</span></button>
                                            </div>
                                        </form>
                                        @else
                                        <form action="{{ route('carts', ['product' => $product]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="product-action">
                                                <button type="submit" class="btn btn-product btn-no-border btn-cart"><span>remove from cart</span></button>
                                            </div>
                                        </form>
                                        @endif
                                        @else
                                        <form action="{{ route('carts', ['product' => $product]) }}" method="post">
                                            @csrf
                                            <div class="product-action">
                                                <button type="submit" class="btn btn-product btn-no-border btn-cart"><span>add to cart</span></button>
                                            </div>
                                        </form>
                                        @endif
                                    </figure>

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Women</a>
                                        </div>
                                        <h3 class="product-title"><a href="product.html">{{ $product->product_name }}</a></h3>
                                        <div class="product-price">
                                            ${{ $product->product_price }}
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
                            </div>
