@extends('layout.admin.app')

@section('content')
<div class="col-xl-12 col-lg-12 col-md-7 col-sm-7 col-xs-12">
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('add-product') }}" method="post" enctype="multipart/form-data">
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

                <div class="row">
                    <div class="col-lg-6">
                        <div class=" form-group">
                            <label>Product Category</label>
                            <select type="text" name="product_category" class="form-control">
                                <option selected disabled>select a category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->title}}">{{ $category->title}}</option>
                                @endforeach
                            </select>
                            @error('product_category')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Product Tag</label>
                            <select type="text" name="tag" class="form-control">
                                <option selected disabled>Give product a tag</option>
                                <option value="new">New</option>
                                <option value="hot">Hot</option>
                                <option value="">None</option>
                            </select>
                            @error('tag')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="product_name" value="{{ old('product_name') }}" placeholder="Enter name of product" class="form-control">
                    @error('product_name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Product Slug</label>
                    <input type="text" name="product_slug" value="{{ old('product_slug') }}" placeholder="Enter name of product" class="form-control">
                    @error('product_slug')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Product Price</label>
                    <input type="number" name="product_price" value="{{ old('product_price') }}" placeholder="Enter name of product" class="form-control">
                    @error('product_price')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>File</label>
                    <input type="file" name="product_image" value="{{ old('product_image') }}" class="form-control">
                    @error('product_image')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Product Description</label>
                    <input type="text" name="product_description" value="{{ old('product_description') }}" placeholder="Enter name of product" class="form-control">
                    @error('product_description')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Add Product </button>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
@endsection
