@extends('layouts.frontend_updated')
@section('page-css')
    <style>
        .error {
            color: red;
        }
    </style>
@endsection
@section('content')
    <section class="contact_us-section">

        @if (session()->has('alert-success'))
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" style="float:none;margin:auto;">
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('alert-success') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="container">
            <div class="">

                <div class="col-lg-8 contact-form second" style="float:none;margin:auto;">
                    <h2>CLINIC SIGN UP</h2>
                    <p>
                        We currently have a waiting list for new clinics to join us. If you would like to be placed on
                        the
                        waiting list please submit your details below and we will be in contact as soon as we are in a
                        position to on-board new clinics.
                    </p>

                    {!! Form::open([
                        'route' => 'clinics.waitlist',
                        'method' => 'post',
                        'novalidate' => '',
                        'files' => true,
                        'class' => 'needs-validation',
                    ]) !!}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Your Name*</label>
                                <input type="text" name="name" required class="form-control">
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                                <div class="invalid-feedback">
                                    This is a required field.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Business name*</label>
                                <input type="text" name="business_name" class="form-control" required>
                                <div class="invalid-feedback">
                                    This is a required field.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="email">Email Address*</label>
                                <input type="email" name="email" class="form-control" required>
                                <div class="invalid-feedback">
                                    This is a required field.
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="contact">Contact Number*</label>
                                <input type="text" name="phone" class="form-control" required>
                                <div class="invalid-feedback">
                                    This is a required field.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Instagram handle</label>
                        <input type="text" name="instagram_handle" class="form-control">
                    </div>

                    {{-- <div class="form-group">
                        <label style="background-color: #B29961;color: white;" class="btn btn-default btn-file pull-right"
                            style="margin-right: 10px;">
                            <span><i class="fa fa-upload mr-2"></i> Upload Document File</span> <input type="file"
                                name="path" id="path" style="display: none;">
                        </label>
                    </div> --}}


                    <div class="form-group text-center pb-4">
                        <button type="submit" class="btn btn-default g-recaptcha">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
