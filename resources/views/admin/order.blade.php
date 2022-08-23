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
                    @if(!$orders->count())
                    <div class="alert alert-info" role="alert">
                        Customers haven't made any order yet... when they do you can answerto their request from here!
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted mb-0">
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product->product_name }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>
                                    <div class="bg-img">
                                        <img class="img-thumbnail rounded" src="/products/{{ $order->product->product_image }}" alt="">
                                    </div>
                                </td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->code }}</td>
                                <td>{{ $order->quantity * $order->product->product_price }}</td>
                                <td><span class="badge badge-info">{{ $order->status }}</span></td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <button class="btn btn-sm btn-success">Delivered</button>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <tfoot>
                        <div class="mb-4">
                            {{ $orders->links('pagination::bootstrap-5') }}
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
