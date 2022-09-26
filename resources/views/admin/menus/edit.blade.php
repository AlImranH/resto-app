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
                    Update Menu
                </div>
                <div class="card-body">
                    <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                        <div class="col-md-8 form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" value="{{ $menu->name }}">
                          @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price" value="{{ $menu->price }}">
                            @error('price')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Category</label>
                        <select name="category[]" class="form-control select2" id="" size="1" multiple>
                            <option value="">Select One</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ ($menu->categories->contains($category)) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descriptions</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $menu->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label><br>
                            <img src="{{ Storage::url($menu->image) }}" alt="{{ $menu->name }}" width="300">
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                          </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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