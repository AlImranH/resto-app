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
                        
                            <div class="row">
                                <form method="POST" action="{{ route('reservation.store.step.two') }}">
                                    @csrf
                                    <div class="sm:col-span-6 pt-5">
                                        <label for="status" >Table</label>
                                        <div class="mt-1">
                                            <select id="table_id" name="table_id"
                                                class="form-control mt-1 @error('table_id') is-invalid @enderror">
                                                @foreach ($tables as $table)
                                                    <option value="{{ $table->id }}" {{ $table->id == $reservation->table_id ? 'selected' : '' }}>
                                                        {{ $table->name }}
                                                        ({{ $table->guest_number }} Guests)
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('table_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
    
                                    <div class="mt-6 d-flex justify-content-between pt-2">
                                        <a href="{{ route('order', session()->get('menu')->id) }}"
                                            class="btn btn-primary">Previous</a>
                                        <button type="submit"
                                            class="btn btn-primary">Make
                                            Reservation</button>
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection