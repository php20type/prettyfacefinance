@extends('layouts.frontend_updated')
@section('content')
    <!-- Jumbotron -->
    @include('home.banner_updated')

    <!-- Steps -->
    @include('home.about_info')

    <!-- Steps -->
    @include('home.steps_updated')
    <!-- Why -->
    @include('home.why_updated')

    <!-- CTA section start -->
    @include('home.contact_us')

    <!-- Representative Example section start -->
    @include('home.representative')
@endsection
