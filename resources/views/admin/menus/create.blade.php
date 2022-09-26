@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Menus</h1>

        <a href="{{ route('menus.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-circle-left fa-sm text-white-50"></i> Back </a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Add Category
                </div>
                <div class="card-body">
                    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-8 form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp" placeholder="Enter name">
                          @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" step="0.01" placeholder="Enter price">
                          </div>
                          @error('price')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Category</label>
                        <select name="category[]" class="form-control select2" id="" size="1" multiple>
                            <option value="">Select One</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descriptions</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('admin/vendor/select2/css/select2.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('admin/vendor/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
    $('.select2').select2();
});
    </script>
@endpush