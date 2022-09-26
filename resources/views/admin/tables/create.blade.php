@extends('layouts.dashboard')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tables</h1>
                <a href="{{ route('tables.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-circle-left fa-sm text-white-50"></i> Back</a>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Add Table
                        </div>
                        <div class="card-body">
                            <form action="{{ route('tables.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                      </div>
                                      <div class="col-md-4 form-group">
                                        <label for="exampleInputEmail1">Guest Number</label>
                                        <input type="number" name="guest_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter guest number">
                                      </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select One</option>
                                        <option value="pending">Pending</option>
                                        <option value="available">Available</option>
                                        <option value="unavailable">Unavailable</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <select name="location" id="location" class="form-control">
                                        <option value="">Select One</option>
                                        <option value="front">Front</option>
                                        <option value="inside">Inside</option>
                                        <option value="outside">Outside</option>
                                    </select>
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