@extends('layout.app')


@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="container">

        <!-- <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
            <div class="row d-flex justify-content-center" style="margin-bottom:40px;">
                <div class="col-md-6 col-md-offset-2 mb-3 mt-3">
                    <p>
                    <div class="card">
                        <div class="card-body">
                            Lagos Eyo Print Tee Shirt
                            ₦ 2,950
                        </div>
                    </div>
                    </p>
                    <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                    <input type="hidden" name="orderID" value="345">
                    <input type="hidden" name="amount" value="295000"> {{-- required in kobo --}}
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="currency" value="NGN">
                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value','item_name'=>'maggi']) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                    <p>
                        <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                        </button>
                    </p>
                </div>

            </div>
        </form> -->

        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7">
                <div class="summary summary-cart">
                    <h3 class="summary-title">Complete your order</h3><!-- End .summary-title -->

                    <table class="table table-summary">
                        <tbody>
                            <tr class="summary-shipping">
                                <td>Transaction:</td>
                                <td>&nbsp;</td>
                            </tr>

                            <tr class="summary-shipping-row">
                                <td>
                                    <div class="custom-control custom-radio">
                                        <label class="custom-control-label" for="free-shipping">Number of products:</label>
                                    </div><!-- End .custom-control -->
                                </td>
                                <td>{{ $carts->count() }}</td>
                            </tr><!-- End .summary-shipping-row -->

                            <tr class="summary-shipping-row">
                                <td>
                                    <div class="custom-control custom-radio">
                                        <label class="custom-control-label" for="standart-shipping">Total amount:</label>
                                    </div><!-- End .custom-control -->
                                </td>
                                @php
                                $total_cart = 0;
                                foreach($carts as $cart){
                                $new_cart = $cart->product->product_price * $cart->quantity;
                                $total_cart = $total_cart + $new_cart;
                                }
                                @endphp
                                <td>₦{{ $total_cart  }}</td>
                            </tr><!-- End .summary-shipping-row -->

                            <tr class="summary-shipping-row">
                                <td>
                                    <div class="custom-control custom-radio">
                                        <label class="custom-control-label" for="express-shipping">Send fee:</label>
                                    </div><!-- End .custom-control -->
                                </td>
                                <td>Negotiable</td>
                            </tr><!-- End .summary-shipping-row -->

                            <tr class="summary-shipping-estimate">
                                <td>Estimate for Your Delivery<br> <a href="{{ route('address') }}">Change address</a></td>
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
                                <td>₦{{ $total_cart }}</td>
                            </tr><!-- End .summary-total -->
                        </tbody>
                    </table><!-- End .table table-summary -->
                    </p>
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}"> {{-- required --}}
                    <input type="hidden" name="orderID" value="345">
                    <input type="hidden" name="amount" value="{{ $total_cart }}00"> {{-- required in kobo --}}
                    <!-- <input type="hidden" name="realamount" value="{{ $total_cart }}"> {{-- real amount --}} -->
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="currency" value="NGN">
                    <!-- <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value','cart'=> $carts]) }}"> -->
                    <input type="hidden" name="metadata" value="{{ json_encode($carts) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                    <p>
                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                        </button>
                </div><!-- End .summary -->


            </div>
        </div>
        </form>

    </div>

    @endsection
