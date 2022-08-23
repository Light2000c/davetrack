@extends('layout.admin.app')

@section('content')
<!-- begin app-main -->
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
                                            <form action="{{ route('user-delete', $user) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-success">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <tfoot>
                                <div class="mb-4">
                                    {{ $users->links('pagination::bootstrap-5') }}
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
