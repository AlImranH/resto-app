@extends('layouts.frontend')
@section('header')
@include('frontend.include.header')
@endsection
@section('content')
<section id="reservation" class="mt-5">
    <div class="row justify-content-center p-5">
        <div class="col-md-9 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ Storage::url(session()->get('menu')->image) }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('reservation.store.stepOne') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ $reservation->first_name ?? '' }}" placeholder="Enter first name">
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                  </div>
                                  <div class="col-md-6 form-group">
                                    <label for="last_name">First Name</label>
                                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ $reservation->last_name ?? '' }}" placeholder="Enter last name">
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
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $reservation->email ?? '' }}" placeholder="Enter email address">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email">Phone Number</label>
                                    <input type="text" name="tel_number" class="form-control @error('tel_number') is-invalid @enderror" id="tel_number" value="{{ $reservation->tel_number ?? '' }}" placeholder="Enter phone number">
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
                                    <input type="number" name="guest_number" class="form-control @error('guest_number') is-invalid @enderror" id="guest_number" value="{{ $reservation->guest_number ?? '' }}">
                                    @error('guest')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                  </div>
                              </div>
    
                              <div class="form-group">
                                <label for="res_date">Reservation Date</label>
                                <input type="datetime-local" name="res_date" class="form-control @error('res_date') is-invalid @enderror" id="res_date" min="{{ Carbon\Carbon::parse($min_date)->format('Y-m-d\TH:i:s') }}"
                                max="{{ Carbon\Carbon::parse($max_date)->format('Y-m-d\TH:i:s') }}"
                                value="{{ $reservation ? Carbon\Carbon::parse($reservation->res_date)->format('Y-m-d\TH:i:s') : '' }}">
                                @error('res_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                              </div>
                              <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mt-2 float-right">Next</button>
                              </div>
                            
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection