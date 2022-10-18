@extends('layout.admin.app')

@section('content')
<!-- begin row -->
<div class="row">
        <!-- begin page title -->

        <!-- end page title -->
</div>
<!-- end row -->
<!-- begin row -->
<div class="row editable-wrapper">
    <div class="col-lg-12">
        <div class="card card-statistics">
            <div class="card-body">
            @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-center">
                                <img class="img-fluid" src="/products/{{ $product->product_image}}" alt="">
                            </div>

                            <div class="m-2">
                                <form action="{{ route('product-details', $product) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group ">
                                        <label for="inputAddress">Change Image</label>

                                        <small id="emailHelp" class="form-text  text-mute">Please select image before clicking upload to avoid running into problems.</small>

                                        <input type="text" name="diff" value="image" hidden>
                                        <input type="file" class="form-control" name="product_image" id="inputAddress">
                                        @error('product_image')
                                        <small id="emailHelp" class="form-text  text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    @if(Auth::user()->permission == 1)
                                    <button type="submit" class="btn btn-primary">Upload</button>
                              @else
                              <button type="submit" class="btn btn-primary" disabled>Upload</button>
                              @endif
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-6">
                            <div class="card-body">
                                <form action="{{ route('product-details', $product) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <input type="text" name="diff" value="details" hidden>
                                    <div class="form-group">
                                        <label>Product Category</label>
                                        <select type="text" name="product_category" class="form-control">

                                            @foreach($categories as $category)

                                            @if($category->title == $product->product_category)
                                            <option selected value="{{ $category->title}}">{{ $category->title}}</option>
                                            @endif
                                            <option value="{{ $category->title}}">{{ $category->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('product_category')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Product Tag</label>
                                        <select type="text" name="tag" class="form-control">
                                            @if(!$product->tag)
                                            <option selected value="">none</option>
                                            @else
                                            <option value="">none</option>
                                            @endif
                                            @foreach($tags as $tag)
                                            @if($tag == $product->tag)
                                            <option selected value="{{ $tag->title }}">{{ $tag->title }}</option>
                                            @else
                                            <option value="{{ $tag }}">{{ $tag->title }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('tag')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" id="inputAddress" value="{{ $product->product_name }}" placeholder="Enter product name">
                                        @error('product_name')
                                        <small id="emailHelp" class="form-text  text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Product Slug</label>
                                            <input type="text" class="form-control" id="inputEmail4" name="product_slug" value="{{ $product->product_slug }}" placeholder="Enter product slug">
                                            @error('product_slug')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Product Price</label>
                                            <input type="number" class="form-control" id="inputPassword4" name="product_price" value="{{ $product->product_price }}" placeholder="Set a price">
                                            @error('product_price')
                                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Old price</label>
                                        <input type="text" class="form-control" name="old_price" id="inputAddress" value="{{ $product->old_price }}" placeholder="Enter old price">
                                        @error('old_price')
                                        <small id="emailHelp" class="form-text  text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- <div class="form-group">
                                                    <label for="inputAddress">Product category</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                                </div> -->
                                    <div class="form-group">
                                        <label for="inputAddress2">Product Description</label>
                                        <textarea type="text" name="product_description" class="form-control"  rows="4" id="inputAddress2" placeholder="Enter description here....">{{ $product->product_description }}</textarea>
                                        @error('product_description')
                                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    @if(Auth::user()->permission == 1)
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                @else
                                <button type="submit" class="btn btn-primary" disabled>Update Product</button>
                                @endif
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end row -->
@endsection
