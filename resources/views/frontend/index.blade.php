@extends('layouts.frontend')
@section('header')
<!-- ======= Header ======= -->
@include('frontend.include.header')
<!-- End Header -->

<!-- ======= Hero Section ======= -->
@include('frontend.include.hero')
<!-- End Hero -->
@endsection
@section('content')
<!-- ======= About Section ======= -->
@include('frontend.include.about')
<!-- End About Section -->

<!-- ======= Why Us Section ======= -->
@include('frontend.include.why')
<!-- End Why Us Section -->

<!-- ======= Menu Section ======= -->
@include('frontend.include.menu')
<!-- End Menu Section -->

<!-- ======= Specials Section ======= -->
@include('frontend.include.special')
<!-- End Specials Section -->

<!-- ======= Events Section ======= -->
@include('frontend.include.event')
<!-- End Events Section -->

<!-- ======= Book A Table Section ======= -->
@include('frontend.include.book_a_table')
<!-- End Book A Table Section -->

<!-- ======= Testimonials Section ======= -->
@include('frontend.include.testmonial')
<!-- End Testimonials Section -->

<!-- ======= Gallery Section ======= -->
@include('frontend.include.gallery')
<!-- End Gallery Section -->

<!-- ======= Chefs Section ======= -->
@include('frontend.include.chef')
<!-- End Chefs Section -->

@endsection