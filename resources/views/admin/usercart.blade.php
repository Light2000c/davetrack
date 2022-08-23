@extends('layout.admin.app')

@section('content')
<!-- begin app-main -->
<!-- begin row -->
<div class="row">
    <!-- <div class="col-md-12 m-b-30"> -->
        <!-- begin page title -->

        <!-- end page title -->
    <!-- </div> -->
</div>
<!-- end row -->
<!-- begin row -->
<div class="row editable-wrapper">
    <div class="col-lg-12 ">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="table-responsive">
                    @if(!$carts->count())
                    <div class="alert alert-info" role="alert">
  Customers haven't added any product to their cart yet!
</div>
                    @else
                    <table class="table display responsive nowrap table-light table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>User Name</th>
                                <th>Product Image</th>
                                <th>Product Quanity</th>
                                <th>Code </th>
                                <th>Total Cost</th>
                                <th>Status</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted mb-0">
                            @foreach($carts as $cart)
                            <tr>
                                <td>{{ $cart->id }}</td>
                                <td>{{ $cart->product->product_name }}</td>
                                <td>{{ $cart->user->name }}</td>
                                <td>
                                    <div class="bg-img">
                                        <img class="img-thumbnail rounded" src="/products/{{ $cart->product->product_image }}" alt="">
                                    </div>
                                </td>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ $cart->code }}</td>
                                <td>{{ $cart->quantity * $cart->product->product_price }}</td>
                                <td><span class="badge badge-info">{{ $cart->status }}</span></td>
                                <td>{{ $cart->created_at }}</td>
                                <td>
                                    <form action="{{ route('admin-delete-cart', $cart) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-sm btn-success">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <tfoot>
                        <div class="mb-4">
                            {{ $carts->links('pagination::bootstrap-5') }}
                        </div>
                    </tfoot>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<!-- end container-fluid -->
<!-- end app-main -->
@endsection
