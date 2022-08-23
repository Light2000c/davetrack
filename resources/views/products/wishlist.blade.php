@extends('layout.app')

@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Wishlist<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="container">
                @if(!$wishes->count())
                    <div class="alert alert-info alert-dismissible fade show mt-2 mb-2" role="alert">
                        You don't have any product on your wishlist yet
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @else
					<table class="table table-wishlist table-mobile">
						<thead>
							<tr>
								<th>Product</th>
								<th>Price</th>
								<th>Category</th>
								<th></th>
								<th></th>
							</tr>
						</thead>

						<tbody>
					@foreach($wishes as $wish)
							<tr>
								<td class="product-col">
									<div class="product">
										<figure class="product-media">
											<a href="{{ route('view-product', $wish) }}">
												<img src="/products/{{ $wish->product->product_image}}" alt="Product image">
											</a>
										</figure>

										<h3 class="product-title">
											<a href="{{ route('view-product', $wish) }}">{{ $wish->product->product_name }}</a>
										</h3><!-- End .product-title -->
									</div><!-- End .product -->
								</td>
								<td class="price-col">${{ $wish->product->product_price }}</td>
								<td class="stock-col"><span class="in-stock">{{ $wish->product->product_category }}</span></td>
								<td class="action-col">
                                    @if(Auth::user() && $wish->product->hasCart(Auth::user()))
                                    <form action="{{ route('carts', ['product' => $wish->product]) }}" method="post">
                                        @csrf
                                        @method('delete')
									<button type="submit" class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>remove from Cart</button>
                                    </form>
                                    @else
                                    <form action="{{ route('carts', ['product' => $wish->product]) }}" method="post">
									@csrf
                                    <button type="submit" class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>add to Cart</button>
                                    </form>
                                    @endif
                                </td>
								<td class="remove-col">
                                    <form action="{{ route('add-to-wishlist', $wish->product) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button class="btn-remove"><i class="icon-close"></i></button>
                                    </form>
                                </td>
							</tr>
                            @endforeach
						</tbody>
					</table><!-- End .table table-wishlist -->
	            	<div class="wishlist-share">
	            		<div class="social-icons social-icons-sm mb-2">
	            			<label class="social-label">Share on:</label>
	    					<a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
	    					<a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
	    					<a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
	    					<a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
	    					<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
	    				</div><!-- End .soial-icons -->
	            	</div><!-- End .wishlist-share -->
                    @endif
            	</div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
