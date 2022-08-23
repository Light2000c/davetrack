@extends('layout.admin.app')

@section('content')
<!-- begin app-main -->
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
                <!-- begin page title -->
                <!-- end page title -->
        </div>
        <!-- end row -->
        <!-- begin row -->
        <div class="row editable-wrapper">
            <div class="col-lg-12 ">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display responsive nowrap table-light table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Product Slug</th>
                                        <th>Product Price</th>
                                        <th>Product Image</th>
                                        <th>Product Category</th>
                                        <th>Product Tag</th>
                                        <th>Old price</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th>Created_by</th>
                                        <th>Updated_by</th>
                                        <th>Action</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_slug }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td><img class="img-fluid" src="/products/{{ $product->product_image }}" alt="" srcset=""></td>
                                        <td>{{ $product->product_category }}</td>
                                        <td>{{ $product->tag }}</td>
                                        <td>{{ $product->old_price }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td>{{ $product->created_by }}</td>
                                        <td>{{ $product->updated_by }}</td>
                                        <td>
                                            <a href="{{ route('product-details', $product->id) }}" type="button" class="btn btn-primary btn-sm">View</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('delete-product', $product) }}" method="post">
                                                @csrf

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
                                                @method('delete')
                                                <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <tfoot>
                                <div class="mb-4">
                                    {{ $products->links('pagination::bootstrap-5') }}
                                </div>
                            </tfoot>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->
@endsection
