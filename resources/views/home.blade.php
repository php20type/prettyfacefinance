@extends("layouts.frontend")
@section("content")
    <!-- Jumbotron -->
    @include("home.banner")

    <!-- Steps -->
    @include("home.steps")
    <!-- Why -->
    @include("home.why")
    <!-- About -->
    @include("home.about")
    <!-- Payl8r -->
    @include("home.paylater")
    
    @include("home.notice")
@endsection