@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reservations</h1>
        <a href="{{ route('reservations.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Reservation</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Guest</th>
                    <th scope="col">Table</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $key => $reservation)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $reservation->res_date }}</td>
                        <td>{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->tel_number }}</td>
                        <td class="text-right">{{ $reservation->guest_number }}</td>
                        <td>{{ $reservation->table->name }}</td>
                          <td class="d-flex border-0">
                            <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-sm btn-warning m-1" title="Edit"><i class="far fa-edit"></i></a>
  
                            
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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