<link rel="stylesheet" href="/web1/assets/css/style.css">
@extends('layout\app')


@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/web/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">{{ Auth::user()->name }}<span>Account</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('transactions') }}">Transaction</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row d-flex justify-content-center">

                    <div class="col-lg-9">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if(!$transactions->count())
                                    <div class="alert alert-info" role="alert">
                                        you haven't made any transaction yet!
                                    </div>
                                    @else
                                    <table class="table display responsive nowrap table-light table-bordered">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Transaction Code</th>
                                                <th>Status</th>
                                                <th>Number of Product</th>
                                                <th>Total Cost</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-muted mb-0">
                                            @foreach($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->transact_code }}</td>
                                                <td><span class="badge badge-info">{{ $transaction->status }}</span></td>
                                                <td>{{ $transaction->product_count }}</td>
                                                <td>{{ $transaction->amount }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('transaction', $transaction) }}" class="btn btn-sm btn-success">view</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                    <tfoot>
                                        <div class="mb-4">
                                            {{ $transactions->links('pagination::bootstrap-5') }}
                                        </div>
                                    </tfoot>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
