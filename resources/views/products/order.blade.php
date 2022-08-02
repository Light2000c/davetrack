@extends('layout\app')

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">

                        @if(!$orders->count())
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
                                    <th>Total</th>
                                    <th>status</th>
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

                                @foreach($orders as $order)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{ route('view-product', $order->product) }}">
                                                    <img src="/products/{{ $order->product->product_image }}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{ $order->product->product_name }}</a>
                                            </h3>
                                        </div>
                                    </td>
                                    <td class="price-col">${{ $order->product->product_price }}</td>
                                    <td class="price-col">
                                        {{ $order->quantity }}
                                    </td>
                                    <td class="total-col">${{ $order->product->product_price * $order->quantity  }}</td>
                                    <td class="price-col">
                                        <span class="badge badge-info">{{ $order->status }}</span>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End .table table-wishlist -->


                        <div class="cart-bottom">
                            <div class="cart-discount">
                                {{ $orders->links('pagination::bootstrap-5') }}
                            </div><!-- End .cart-discount -->
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Details</h3><!-- End .summary-title -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Please!</strong> If you want to change address while having processing orders, try sending an email to the company for clarification.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="free-shipping">Transaction Code:</label>
                                            </div><!-- End .custom-control -->
                                        </td>

                                        <td>{{ $ts->transact_code }}</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="free-shipping">Number of Product:</label>
                                            </div><!-- End .custom-control -->
                                        </td>

                                        <td>{{ $ts->count() }}</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="free-shipping">Transaction Status:</label>
                                            </div><!-- End .custom-control -->
                                        </td>

                                        <td>{{ $ts->status }}</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="free-shipping">Total Cost:</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>${{ $ts->amount }}</td>
                                    </tr>
                                    <!-- <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <label class="custom-control-label" for="express-shipping">Express:</label>
                                            </div>
                                        </td>
                                        <td>$20.00</td>
                                    </tr> -->



                                </tbody>
                            </table><!-- End .table table-summary -->
                            @endif
                            @if($orders->count())
                            <a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">VIEW ALL TRANSACTIONS</a>
                            @endif
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection
