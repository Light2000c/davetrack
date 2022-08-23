@extends('layout.app')

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/web/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title"> Cart<span></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Carts</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        @if(!$carts->count())
                        <div class="alert alert-info" role="alert">
                            You don't have any order yet!
                        </div>
                        @else
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- <tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															<img src="assets/images/products/table/product-1.jpg" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="#">Beige knitted elastic runner shoes</a>
													</h3>
												</div>
											</td>
											<td class="price-col">$84.00</td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                </div>
                                            </td>
											<td class="total-col">$84.00</td>
											<td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
										</tr> -->

                                @foreach($carts as $cart)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{ route('view-product', $cart->product) }}">
                                                    <img src="products/{{ $cart->product->product_image }}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{ $cart->product->product_name }}</a>
                                            </h3>
                                        </div>
                                    </td>
                                    <td class="price-col">₦{{ number_format($cart->product->product_price) }}</td>
                                    <!-- <td class="price-col">
                                        {{ $cart->quantity }}
                                        </td> -->
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input id="{{ $cart->id }}" type="number" class="form-control" value="{{ $cart->quantity }}" min="1" max="10" step="1" required>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $("#{{ $cart->id}}").on("change", function(e) {

                                                    var qty = document.getElementById("{{ $cart->id }}").value;
                                                    console.log(qty);
                                                    e.preventDefault();
                                                    $.ajax({
                                                        type: 'PUT',
                                                        url: "http://127.0.0.1:8000/api/quantity",
                                                        data: {
                                                            userId: "{{ Auth::user()->id }}",
                                                            productId: "{{ $cart->product->id}}",
                                                            quantity: qty
                                                        }
                                                    });
                                                    myCarts("{{ Auth::user()->id }}");
                                                    cartCount("{{ Auth::user()->id }}");
                                                    cartCartCount("{{ Auth::user()->id }}");
                                                });
                                            });
                                        </script>
                                    </td>
                                    <!-- <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="{{ $cart->product->product_price }}" min="1" max="10" step="1" data-decimals="0" required>
                                                </div> -->

                                    <!-- <td class="total-col">${{ $cart->product->product_price * $cart->quantity  }}</td> -->
                                    <td class="remove-col">
                                        <form action="{{ route('carts', ['product' => $cart->product ]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn-remove"><i class="icon-close"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End .table table-wishlist -->


                        <div class="cart-bottom">
                            <div class="cart-discount">
                                {{ $carts->links('pagination::bootstrap-5') }}
                            </div><!-- End .cart-discount -->

                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <!-- @php
                                    $total_cart = 0;
                                    foreach($carts as $cart){
                                    $new_cart = $cart->product->product_price * $cart->quantity;
                                    $total_cart = $total_cart + $new_cart;
                                    }
                                    @endphp -->
                                        <td><h6 id="sub_total">₦{{ $total_cart }}</h6></td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Delivery:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="free-shipping">Delivery Amount</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>Negotiable</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="express-shipping">Number of carts:</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        @php
$quantities = 0;
$quantity_count = 0;
foreach($carts as $cart){
    $quantity_count = $quantity_count + $cart->quantity;
    $quantities = $quantity_count;
}

                                        @endphp
                                        <td id="cartItems">{{ $cart_quantity }}</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-estimate">
                                        <td>Estimate for Your Delivery<br> <a href="dashboard.html">Change address</a></td>
                                        <td>&nbsp;</td>
                                    </tr><!-- End .summary-shipping-estimate -->

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        @php
                                        $total_cart = 0;
                                        foreach($carts as $cart){
                                        $new_cart = $cart->product->product_price * $cart->quantity;
                                        $total_cart = $total_cart + $new_cart;
                                        }
                                        @endphp
                                        <td id="total">₦{{ number_format($total_cart) }}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->
                            @endif

                            @if($carts->count())
                            <a href="{{ route('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                            @endif
                        </div><!-- End .summary -->

                        @if($carts->count())
                        <a href="{{ route('main-product') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        @endif
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection
