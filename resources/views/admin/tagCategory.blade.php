@extends('layout.admin.app')

@section('content')


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

<div class="row">
    <!-- beginning of update profile  -->
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form class="" method="POST">
                @csrf
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Category Title</label>
                        <input type="text" name="category" class="form-control" value="category" hidden required>
                        <input type="text" name="category_title" class="form-control" value="{{ old('category_title') }}" required>
                        @error('category_title')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form class="{{ route('tags') }}" method="POST">
                @csrf
                <div class="card-header">
                    <h4>Add Tag</h4>
                </div>
                <div class="card-body">

                    @if(session('error'))
                    <div class="alert alert-danger mb-2" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success mb-2" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Tag Title</label>
                        <input type="text" name="tag" class="form-control" value="tag" hidden required>
                        <input type="text" name="tag_title" class="form-control" value="{{ old('tag_title') }}" required>
                        @error('tag_title')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Add Tag</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Product Categories</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->title }} </td>
                                <td>{{ $category->created_at }}</td>
                                <form action="{{ route('catTag',$category->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="text" name="category" value="category" hidden>
                                    <td><button type="submit" class="btn btn-sm btn-success">Delete</button></td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Product Tag</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->title }} </td>
                                <td>{{ $tag->created_at }}</td>
                                <form action="{{ route('catTag', $tag->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="text" name="tag" value="tag" hidden>
                                    <td><button type="submit" class="btn btn-sm btn-success">Delete</button></td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
