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
                    @if(!$addresses->count())
                    <div class="alert alert-info" role="alert">
                        No address yet on database!
                    </div>
                    @else
                    <table class="table display responsive nowrap table-light table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Country</th>
                                <th>Phone</th>
                                <th>address 1 </th>
                                <th>address 2</th>
                                <th>Landmark</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted mb-0">
                            @foreach($addresses as $address)
                            <tr>
                                <td>{{ $address->id }}</td>
                                <td>{{ $address->user->name }}</td>
                                <td>{{ $address->country }}</td>
                                <td>{{ $address->phone }}</td>
                                <td>{{ $address->address1 }}</td>
                                <td>{{ $address->address2 }}</td>
                                <td>{{ $address->landmark }}</td>
                                <td>{{ $address->created_at }}</td>
                                <td>{{ $address->updated_at }}</td>
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
                            {{ $addresses->links('pagination::bootstrap-5') }}
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
