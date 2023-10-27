@extends("layouts.frontend")
@section("content")
    <div class="container text-center">
        <div class="row my-5">
            <h3 class="w-100 text-center pb-3 border-bottom">Please log in to your account at Payl8r using the button below</h3>
        </div>
        <div class="row">
            <div class="col-12 py-5">
                <a class="btn btn-paylater px-5 py-3" href="https://payl8r.com/login">
                    Login in to <img class="ml-3" src="{{asset('img/payl8r-logo.png')}}" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection