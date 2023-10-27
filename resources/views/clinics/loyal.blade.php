@extends('layouts.frontend')
@section('content')
    <div class="container">


        <div class="row mb-5">
            <div class="col-12 loyalty-notice">
                <h2 class="text-uppercase text-center">Thanks for joining Cosmetic Finance Group!</h2>
                <hr>
                <p class="text-center">
                    We have received your registration payment offline, so no further payment is required from you.
                </p>
                <p>
                <form class="payment-form" method="POST" id="payment-form" role="form" action="{!! URL::route('stripe.payment') !!}">
                    {{ csrf_field() }}
                    <input type="hidden" name="amount" value="0">
                    <input type="hidden" name="clinic_data" value="{{ $clinic }}">

                    <div class="form-group text-center">
                        <button class="btn btn-primary mt-3" type="submit">Continue Registration</button>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div>
@endsection
