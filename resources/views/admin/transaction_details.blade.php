@extends('layout\admin\app')

@section('content')

<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h6>Transaction Code: {{ $transaction->transact_code }}</h6>
                    <h6>Made By: {{ $transaction->user->name }}</h6>
                    <h6>Number of products: {{ $orders->count() }}</h6>
                    <h6>Transaction Status: {{ $transaction->status}}</h6>
                    <h6>Total Cost: {{ $transaction->amount }}</h6>
                    <h6>Date: {{ $transaction->created_at}} </h6>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                      <!-- <table class="table display responsive nowrap table-light table-bordered"> -->
                        <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>User Name</th>
                                <th>Product Image</th>
                                <th>Product Amount</th>
                                <th>Product Quanity</th>
                                <th>Code </th>
                                <th>Total Cost</th>
                                <th>Status</th>
                                <th>Created_at</th>
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
                                        <img class="img-fluid img-thumbnail rounded" src="/products/{{ $order->product->product_image }}" alt="">
                                    </div>
                                </td>
                                <td>{{ $order->product->product_price }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->code }}</td>
                                <td>{{ $order->quantity * $order->product->product_price }}</td>
                                <td><span class="badge badge-info">{{ $order->status }}</span></td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
@endsection
