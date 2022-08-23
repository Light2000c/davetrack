@extends('layout.admin.app')

@section('content')

<div class="row editable-wrapper">
    <div class="col-lg-7">
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

                <div class="m-2">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputAddress">Message Subject</label>
                            <input type="text" class="form-control" name="subject" id="inputAddress" placeholder="Enter message subject" required>
                            @error('subject')
                            <small id="emailHelp" class="form-text  text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Message Subject</label>
                            <input type="text" class="form-control" name="title" id="inputAddress" placeholder="Title...." required>
                            @error('title')
                            <small id="emailHelp" class="form-text  text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAddress2">Product Description</label>
                            <textarea type="text" name="message" class="form-control" rows="6" id="inputAddress2" placeholder="Enter description here...." required></textarea>
                            @error('message')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
