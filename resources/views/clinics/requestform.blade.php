@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1 class="border-bottom pb-3">CLINIC SIGN UP</h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        See below for detailed information
                    </div>
                </div>
            </div>
        @endif
        <div class="col-12">
            @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error'); ?>
            @endif
        </div>
        <div class="row">
            <div class="col-12 request-form" style="padding-bottom: 15px;">
                {{-- <form action="https://totalprocessing.totalprocessing.docs.oppwa.com/tutorials/server-to-server"
                    class="paymentWidgets" data-brands="PAYPAL_CONTINUE"></form>
                <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js"></script>
                <script>
                    var wpwlOptions = {
                        paypal: {
                            entityId: "8a829417567d952801568d9d9e3c0b84",
                            amount: 150,
                            paymentBrand: "PAYPAL_CONTINUE",
                            brand: "PAYPAL_CONTINUE",
                            paymentType: "PA",
                            shopperResultUrl: "https://totalprocessing.totalprocessing.docs.oppwa.com/tutorials/server-to-server",
                            merchantId: "QZLVC7JUJ4JGY",
                            clientId: "AU3P0urGCcFCN83DkSqQzl-Ay7JNtycwegJXa4j6no98sOLgWkaQHO_VKik711To6uFXs5a8ogs7L77U",
                            intent: "subscription",
                            currency: "GBP",
                            sdkParams: {
                                vault: "true",
                                commit: "true",
                            }
                        }
                    };

                    wpwlOptions.createCheckout = function(json) {
                        return '8a829417567d952801568d9d9e3c0b84';
                    };
                </script> --}}

                {!! Form::open([
                    'route' => 'clinics.paypal',
                    'method' => 'post',
                    'class' => 'needs-validation',
                    'files' => true,
                    'novalidate' => '',
                ]) !!}
                <div class="col-12">
                    <h3 class="text-center mb-5">
                        Please fill in the information below to apply to become part of the CFG family.
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- General Details -->
                        <h3>General Details</h3>

                        <div class="form-group">
                            {!! Form::label('user_name', 'Your Full Name*') !!}
                            {!! Form::text('user_name', '', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                            <p class="danger">{{ $errors->first('user_name') }}</p>
                            <div class="invalid-feedback">
                                This is a required field
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::label('user_telephone', 'Phone Number*') !!}
                                    {!! Form::text('user_telephone', '', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                                    <p class="danger">{{ $errors->first('user_telephone') }}</p>
                                    <div class="invalid-feedback">
                                        This is a required field
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('user_telephone_secondary', 'Secondary Phone Number') !!}
                                    {!! Form::text('user_telephone_secondary', '', ['class' => 'form-control rounded-0']) !!}
                                    <p class="danger">{{ $errors->first('user_telephone_secondary') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Clinic Details -->
                        <h3>Clinic Details</h3>

                        <div class="form-group">
                            {!! Form::label('name', 'Clinic / Business Name*') !!}
                            {!! Form::text('name', '', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                            <p class="danger">{{ $errors->first('name') }}</p>
                            <div class="invalid-feedback">
                                This is a required field
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Clinic Contact Email Address*') !!}
                            {!! Form::email('email', '', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                            <p class="danger">{{ $errors->first('email') }}</p>
                            <div class="invalid-feedback">
                                Please enter a valid email address
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            {!! Form::label('website', 'Clinic Website') !!}
                            {!! Form::text('website', '', ['class' => 'form-control rounded-0']) !!}
                            <p class="danger">{{ $errors->first('website') }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('address1', 'Clinic Address 1*') !!}
                            {!! Form::text('address1', '', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                            <p class="danger">{{ $errors->first('address1') }}</p>
                            <div class="invalid-feedback">
                                This is a required field
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('address2', 'Clinic Address 2') !!}
                            {!! Form::text('address2', '', ['class' => 'form-control rounded-0']) !!}
                            <p class="danger">{{ $errors->first('address2') }}</p>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::label('city', 'Town/City*') !!}
                                    {!! Form::text('city', '', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                                    <p class="danger">{{ $errors->first('city') }}</p>
                                    <div class="invalid-feedback">
                                        This is a required field
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('postcode', 'Postcode*') !!}
                                    {!! Form::text('postcode', '', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                                    <p class="danger">{{ $errors->first('postcode') }}</p>
                                    <div class="invalid-feedback">
                                        This is a required field
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <label>&nbsp;</label>
                                    <div class="form-group">
                                        <label style="background-color: #B29961;color: white;"
                                            class="btn btn-default btn-file" style="margin-right: 10px;">
                                            <span><i class="fa fa-upload mr-2"></i> Upload Insurance Document File</span>
                                            <input type="file" name="path" id="path" style="display: none;">
                                        </label>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            {!! Form::label('company_number', 'Companies House Number') !!}
                            {!! Form::text('company_number', '', ['class' => 'form-control rounded-0']) !!}
                            <p class="danger">{{ $errors->first('company_number') }}</p>
                        </div>
                        <div class="form-group" style="display: none;">
                            {!! Form::label('profession', 'Profession*') !!}
                            {!! Form::text('profession', '', ['class' => 'form-control rounded-0']) !!}
                            <p class="danger">{{ $errors->first('profession') }}</p>
                            <div class="invalid-feedback">
                                This is a required field
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            {!! Form::label('pin', 'Pin number(NMC/GMC/GDC)') !!}
                            {!! Form::text('pin', '', ['class' => 'form-control rounded-0']) !!}
                            <p class="danger">{{ $errors->first('pin') }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Prescriber Details -->
                        <h3 style="display: none;">Presciber Details <small>(if required)</small></h3>

                        <div class="form-group" style="display: none;">
                            {!! Form::label('prescriber_name', 'Prescriber Name') !!}
                            {!! Form::text('prescriber_name', '', ['class' => 'form-control rounded-0']) !!}
                            <p class="danger">{{ $errors->first('prescriber_name') }}</p>
                        </div>
                        <div class="form-group" style="display: none;">
                            {!! Form::label('prescriber_email', 'Prescriber Email') !!}
                            {!! Form::text('prescriber_email', '', ['class' => 'form-control rounded-0']) !!}
                            <p class="danger">{{ $errors->first('prescriber_email') }}</p>
                        </div>
                        <div class="form-group" style="display: none;">
                            {!! Form::label('prescriber_pin', 'Prescriber Pin') !!}
                            {!! Form::text('prescriber_pin', '', ['class' => 'form-control rounded-0']) !!}
                            <p class="danger">{{ $errors->first('prescriber_pin') }}</p>
                        </div>

                        <!-- Account Details -->
                        <h3>Account Login Details</h3>

                        <div class="form-group">
                            {!! Form::label('user_email', 'Your Email Address*') !!}
                            {!! Form::email('user_email', '', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                            <p class="danger">{{ $errors->first('user_email') }}</p>
                            <div class="invalid-feedback">
                                Please enter a valid email address
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password*') !!}
                            {!! Form::password('password', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                            <p class="danger">{{ $errors->first('password') }}</p>
                            <div class="invalid-feedback">
                                This is a required field
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Password Confirmation*') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                            <p class="danger">{{ $errors->first('password_confirmation') }}</p>
                            <div class="invalid-feedback">
                                This is a required field
                            </div>
                        </div>

                        <h3>Payment Options</h3>
                        <div class="form-group paymentoption">
                            {{-- <p>  
    {!! Form::radio('paymentoption', '69.00', true, ['class' => 'form-control1 rounded-0']) !!}
       <span>{!! Form::label('paymentoption','NO UPFRONT FEE. Monthly payments of £69 
 * 𝘧𝘪𝘳𝘴𝘵 𝘮𝘰𝘯𝘵𝘩 𝘳𝘦𝘲𝘶𝘪𝘳𝘦𝘥 𝘶𝘱𝘧𝘳𝘰𝘯𝘵 𝘵𝘰 𝘫𝘰𝘪𝘯 𝘵𝘩𝘦𝘯 𝘱𝘢𝘺𝘮𝘦𝘯𝘵𝘴 𝘥𝘰 𝘯𝘰𝘵 𝘴𝘵𝘢𝘳𝘵 𝘶𝘯𝘵𝘪𝘭 𝘰𝘯𝘦 𝘮𝘰𝘯𝘵𝘩 𝘈𝘍𝘛𝘌𝘙 𝘨𝘰𝘪𝘯𝘨 𝘓𝘐𝘝𝘌. ',['style' => 'display: inherit']) !!}</span>
    </p>     --}}
                            <p>
                                {!! Form::radio('paymentoption', '499.00', false, ['class' => 'form-control1 rounded-0']) !!}
                                {!! Form::label('paymentoption', 'ONE OFF £150 sign up fee. Monthly payments of £50 ') !!}
                            </p>
                            <!-- <p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        {!! Form::radio('paymentoption', '99.00', false, ['class' => 'form-control1 rounded-0']) !!}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        {!! Form::label('paymentoption', 'ONE OFF £499 Sign up fee. NO monthly payments') !!}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </p> -->

                            <p class="danger">{{ $errors->first('paymentoption') }}</p>
                            <div class="invalid-feedback">
                                This is a required field
                            </div>
                        </div>
                        {{-- <p style="font-size: 13px;font-style: italic;"> * £𝟷𝟻𝟶 𝘢𝘯𝘯𝘶𝘢𝘭 𝘳𝘦𝘯𝘦𝘸𝘢𝘭 𝘧𝘦𝘦
                            𝘴𝘩𝘰𝘶𝘭𝘥 𝘺𝘰𝘶 𝘸𝘪𝘴𝘩 𝘵𝘰 𝘳𝘦𝘮𝘢𝘪𝘯 𝘰𝘯 𝘵𝘩𝘦 𝘴𝘦𝘳𝘷𝘪𝘤𝘦 𝘢𝘧𝘵𝘦𝘳 𝟷𝟸
                            𝘮𝘰𝘯𝘵𝘩𝘴. 𝘛𝘩𝘪𝘴 𝘪𝘴 𝘯𝘰𝘵 𝘢𝘱𝘱𝘭𝘪𝘤𝘢𝘣𝘭𝘦 𝘵𝘰 𝘰𝘵𝘩𝘦𝘳 𝘰𝘱𝘵𝘪𝘰𝘯𝘴 𝟷 & 𝟸.
                        </p> --}}
                        <!-- Confirmation -->
                        <h3>Please Read Carefully</h3>

                        <div class="form-group">
                            <p>Please ensure that you carefully double check ALL details supplied to us prior to submitting
                                your form.</p>
                            <p>Errors & incorrect information may result in initial system set up failure - This will cause
                                problems/delays with you receiving customer payments.</p>
                            <p>Please note we aim to have all clinics live within an estimated time frame of 30 days from
                                the date we have received ALL information required.</p>
                            <p>We look forward to working along site you, thank you for choosing us.</p>
                            <p>CFG</p>

                            <input type="checkbox" name="confirm" id="confirm" required>
                            {!! Form::label('confirm', "I've read and agree to these terms") !!}
                            <p class="danger">{{ $errors->first('confirm') }}</p>
                            <div class="invalid-feedback">
                                This is a required field
                            </div>
                        </div>

                        <!-- Submit -->
                        <button class="btn btn-primary btn-lg btn-block-sm">APPLY NOW</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <style>
        .form-group.paymentoption label {
            display: contents;
        }
    </style>
@endsection
