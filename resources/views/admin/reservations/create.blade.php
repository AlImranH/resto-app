@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reservations</h1>
        <a href="{{ route('reservations.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-circle-left fa-sm text-white-50"></i> Back</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Add Reservation
                </div>
                <div class="card-body">
                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" aria-describedby="emailHelp" placeholder="Enter first name">
                                @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="col-md-6 form-group">
                                <label for="last_name">First Name</label>
                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" aria-describedby="emailHelp" placeholder="Enter last name">
                                @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email address">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email">Phone Number</label>
                                <input type="text" name="tel_number" class="form-control @error('tel_number') is-invalid @enderror" id="tel_number" placeholder="Enter phone number">
                                @error('tel_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                          <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="guest_number">Guest Number</label>
                                <input type="number" name="guest_number" class="form-control @error('guest_number') is-invalid @enderror" id="guest_number">
                                @error('guest')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
    
                              <div class="col-md-6 form-group">
                                <label for="table_id">Table</label>
                                <select name="table_id" id="table_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach ($tables as $table)
                                        <option value="{{ $table->id }}">{{ $table->name }} - {{ $table->guest_number }} - {{ $table->location }} - {{ $table->status }} </option>
                                    @endforeach
                                </select>
                              </div>
                          </div>

                          <div class="form-group">
                            <label for="res_date">Reservation Date</label>
                            <input type="datetime-local" name="res_date" class="form-control @error('res_date') is-invalid @enderror" id="res_date">
                            @error('res_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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