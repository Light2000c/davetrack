@extends('layout\admin\app')

@section('content')
<!-- begin app-main -->
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xxl-5 m-b-30">
                <div class="card card-statistics tab nav-border mb-0 h-100">
                    <div class="card-header d-block d-sm-flex align-items-center justify-content-between p-3">
                        <div class="card-heading mb-3 mb-sm-0">
                            <h4 class="card-title">Search Results </h4>
                        </div>
                        <div class="dropdown">
                            <ul class="nav nav-tabs mb-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link py-2 active show" id="sell-02-tab" data-toggle="tab" href="#sell-02" role="tab" aria-controls="sell-02" aria-selected="true">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-2" id="rent-02-tab" data-toggle="tab" href="#rent-02" role="tab" aria-controls="rent-02" aria-selected="false">Users</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">

                            <div class="tab-pane fade active show" id="sell-02" role="tabpanel" aria-labelledby="sell-02-tab">

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

        <!-- end row -->

                            </div>


                            <div class="tab-pane fade" id="rent-02" role="tabpanel" aria-labelledby="rent-02-tab">
                                @if($users->count())
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>user ID</th>
                                                    <th>Full Name</th>
                                                    <th>email</th>
                                                    <th>updated_at </th>
                                                    <th>created_at</th>
                                                    <th>verified_at</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-muted mb-0">
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <!-- <td>
                                                            <div class="bg-img">
                                                                <img class="img-fluid rounded" src="assets/img/real-estate/01.jpg" alt="">
                                                            </div>
                                                        </td> -->
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->updated_at}}</td>
                                                    <td>{{ $user->created_at}}</td>
                                                    @if($user->email_verified_at == '')
                                                    <td><span class="badge badge-danger ">Not verified</span></td>
                                                    @else
                                                    <td><span class="badge badge-success ">verified</span></td>
                                                    @endif
                                                    <td>
                                                        <!-- <a href="javascript:void(0)" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a> -->
                                                        <form action="" method="post">
                                                            <a href="javascript:void(0)"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @else
                                <div class="alert alert-info" role="alert">
                                    Your search didn't return any result.
                                </div>
                                @endif


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->
@endsection
