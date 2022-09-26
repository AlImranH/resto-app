@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Menus</h1>

        <a href="{{ route('menus.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Menu</a>
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
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $key => $menu)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->description }}</td>
                        <td>{{ $menu->price }}</td>
                        <td><img src="{{ Storage::url($menu->image) }}" alt="{{ $menu->name }}" width="100"></td>
                        <td class="d-flex">
                          <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning m-1" title="Edit"><i class="far fa-edit"></i></a>

                          
                          <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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