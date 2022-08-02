@extends('layout\admin\app')

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
                    @if(!$transactions->count())
                    <div class="alert alert-info" role="alert">
                        Customers haven't made any order yet... when they do you can answerto their request from here!
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
                                <th>Action</th>
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
                                    <a href="{{ route('transaction-details', $transaction) }}" class="btn btn-sm btn-success">view</a>
                                </td>
                                @if(!$transaction->transactionComplete())
                                <td>
                                    <form action="{{ route('update-transaction', $transaction) }}" method="post">
                                        @csrf
                                        @method('put')
                                    <button type="submit" class="btn btn-sm btn-success">complete</button>
                                    </form>
                                </td>
                                @else
                                <td>
                                    <form action="{{ route('update-transaction', $transaction) }}" method="post">
                                        @csrf
                                        @method('put')
                                    <button type="submit" class="btn btn-sm btn-success" disabled>complete</button>
                                    </form>
                                </td>
                                @endif
                                <td>
                                    <form action="{{ route('update-transaction', $transaction) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-sm btn-success">delete</button>
                                    </form>
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
</div>
<!-- end row -->

<!-- end container-fluid -->
<!-- end app-main -->
@endsection
