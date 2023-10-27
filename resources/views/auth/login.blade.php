@extends('layouts.frontend')
@section('content')
    <div class="container py-5">
        <div class="card col-12 col-lg-6 offset-lg-3 p-0">
            <div class="card-header">
                Log in to Cosmetic Finance Group
            </div>
            <div class="card-body">

                @if ($errors->count() > 0)
                    <div class="alert alert-danger" role="alert">
                        The credentials provided do not match our records.
                    </div>
                @endif

                {!! Form::open(['route' => 'login', 'method' => 'post', 'novalidate' => '', 'class' => 'needs-validation']) !!}
                <div class="form-group">
                    <label for="email">Username</label>
                    <input type="text" name="email" placeholder="Email Address" class="form-control" required>
                    <div class="invalid-feedback">
                        Invalid or Incorrect Email Address
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control" required>

                    <div class="invalid-feedback">
                        Password is Incorrect
                    </div>
                </div>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>

                <input type="submit" class="btn btn-primary btn-lg float-right" value="Log In">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
