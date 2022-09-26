@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        <a href="{{ route('categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Category</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td><img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" width="100"></td>
                        <td class="d-flex">
                          <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning m-1" title="Edit"><i class="far fa-edit"></i></a>

                          
                          <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger m-1"><i class="far fa-trash-alt"></i></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection