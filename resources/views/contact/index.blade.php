@extends('layouts.frontend_updated')
@section('content')
    @if (session()->has('status'))
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('status') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Page header section start -->

    <section class="page-header-section">
        <img class="header_image" src="{{ asset('new_css/img/home/contact-banner.jpg') }}" alt="header images" />
        <div class="header_title">
            <h2>Contact Us</h2>
        </div>
    </section>

    <!-- Page header section start -->

    <!-- contact us section start -->

    <section class="contact_us-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 contact-form first">
                    <h2>New Clinic Enquiries</h2>
                    <p>
                        Interested in using Cosmetic Finance Group to help customers finance
                        procedures and treatments in your clinic?<br />
                        Use the contact for below to start your journey to becoming an
                        approved clinic.
                    </p>

                    {!! Form::open([
                        'route' => 'contact.clinic',
                        'method' => 'post',
                        'novalidate' => '',
                        'class' => 'needs-validation',
                    ]) !!}
                    {{ csrf_field() }}
                    <input type="hidden" name="type" value="Clinic Enquiry">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="name">Your Name*</label>
                                <input type="text" name="name" class="form-control" required>
                                <div class="invalid-feedback">
                                    This is a required field.
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="clinic_name">Clinic Name*</label>
                                <input type="text" name="clinic_name" class="form-control" required>
                                <div class="invalid-feedback">
                                    This is a required field.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="clinic_address">Clinic Address*</label>
                        <input type="text" name="clinic_address" class="form-control" required>
                        <div class="invalid-feedback">
                            This is a required field.
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="email">Email Address*</label>
                                <input type="email" name="email_address" class="form-control" required>
                                <div class="invalid-feedback">
                                    This is a required field.
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="contact_number">Contact Number*</label>
                                <input type="text" name="contact_number" class="form-control" required>
                                <div class="invalid-feedback">
                                    This is a required field.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Brief description of your clinic and services*</label>
                        <textarea name="message" id="message" cols="30" rows="6" class="form-control"></textarea>
                        <div class="invalid-feedback">
                            This is a required field.
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-defaultg-recaptcha">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-6 col-md-6 contact-form second">
                    <h2>General Enquiries</h2>
                    <p>
                        If you want to find out more about how we work or just want to ask
                        a quick question to one of our team then use the contact form
                        below to submit your enquiry.
                    </p>

                    {!! Form::open([
                        'route' => 'contact.general',
                        'method' => 'post',
                        'novalidate' => '',
                        'class' => 'needs-validation',
                    ]) !!}
                    <input type="hidden" name="type" value="General Enquiry">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Your Name*</label>
                                <input type="text" name="name" class="form-control" required>
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
                                <input type="email" name="email_address" class="form-control" required>
                                <div class="invalid-feedback">
                                    This is a required field.
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="contact">Contact Number</label>
                                <input type="text" name="contact_number" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description/Message*</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" required></textarea>
                        <div class="invalid-feedback">
                            This is a required field.
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-default g-recaptcha">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row">
                <div class="address-sec mt-4 text-center">
                    <h4>Get in touch through the methods below:</h4>
                    <p>
                        <span><strong>Email:</strong> <a
                                href="mailto:info@cosmeticfinancegroup.co.uk">info@cosmeticfinancegroup.co.uk</a></span>
                        | <span><strong>Phone:</strong> <a href="tel:0161 388 6107">0161 388 6107</a></span>
                    </p>
                    <p>Atrium House - Office 13, 574 Manchester Road, Bury, BL9 9SW</p>
                </div>
            </div>
        </div>
    </section>

    <!-- contact us section end -->
@endsection
