@extends('layouts.frontend')
@section('page-css')
    <style>
        .paypal-button {
            display: block;
            margin: 0 auto;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="pb-2 my-5 border-bottom">Account Sign In</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-6 offset-3">
                <div class="payment-notice text-center">PLEASE PAY THE FIRST TIME SIGN UP FEE OF <span
                        class="amount">£150</span> TO CONTINUE</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if (Session::has('error'))
                    <div class="custom-alerts alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        {{ Session::get('error') }}
                    </div>
                    {{ Session::forget('error') }}
                @endif
            </div>
        </div>
        <form style="display: none;">
            <input type="hidden" class="clinic_data" value="{{ $clinic }}">
        </form>
        <div class="row">
            <div class="payment-form col-6 offset-3 needs-validation">
                {{-- <div id="paypal-button-container-P-2EV87208U2849284WMRDDGEA"></div>
                <script
                    src="https://www.paypal.com/sdk/js?client-id=AU3P0urGCcFCN83DkSqQzl-Ay7JNtycwegJXa4j6no98sOLgWkaQHO_VKik711To6uFXs5a8ogs7L77U&vault=true&intent=subscription"
                    data-sdk-integration-source="button-factory"></script>
                <script>
                    paypal.Buttons({
                        style: {
                            shape: 'rect',
                            color: 'gold',
                            layout: 'vertical',
                            label: 'subscribe'
                        },
                        createSubscription: function(data, actions) {
                            return actions.subscription.create({
                                /* Creates the subscription */
                                plan_id: 'P-2EV87208U2849284WMRDDGEA'
                            });
                        },
                        onError: function(err) {
                            console.error('error from the onError callback', err);
                            alert(err);
                        },
                        onApprove: function(data, actions) {
                            let clinicData = $('.clinic_data').val();

                            let CSRF_TOKEN = $('meta[name="_token"]').attr('content');
                            let orderID = data.orderID;
                            $.ajax({
                                url: "{{ route('paypal.success') }}",
                                type: 'POST',
                                data: {
                                    _token: CSRF_TOKEN,
                                    orderID: data.orderID,
                                    subscriptionID: data.subscriptionID,
                                    paymentSource: data.paymentSource,
                                    clinic_data: clinicData,
                                },
                                dataType: 'JSON',
                                /* remind that 'data' is the response of the AjaxController */
                                success: function(response) {
                                    if (response == 1) {
                                        window.location.href = 'company-details/' + orderID;
                                    }
                                }
                            });
                        }
                    }).render('#paypal-button-container-P-2EV87208U2849284WMRDDGEA'); // Renders the PayPal button
                </script> --}}


                <div id="paypal-button-container-P-78125875NR880435SMRBJGNA"></div>
                <script
                    src="https://www.paypal.com/sdk/js?client-id=AQK7FWXlNmCnJZFZwBpf4LKHgqHr2clIY512UVfojLm82WLRAj9xKcjT1hlfMLJ0ARHYjFYw6wreWjcA&vault=true&intent=subscription"
                    data-sdk-integration-source="button-factory"></script>
                <script>
                    paypal.Buttons({
                        style: {
                            shape: 'rect',
                            color: 'gold',
                            layout: 'vertical',
                            label: 'subscribe'
                        },
                        createSubscription: function(data, actions) {
                            return actions.subscription.create({
                                /* Creates the subscription */
                                plan_id: 'P-78125875NR880435SMRBJGNA'
                            });
                        },
                        onError: function(err) {
                            console.error('error from the onError callback', err);
                            alert(err);
                        },
                        onApprove: function(data, actions) {
                            let clinicData = $('.clinic_data').val();

                            let CSRF_TOKEN = $('meta[name="_token"]').attr('content');
                            let orderID = data.orderID;
                            $.ajax({
                                url: "{{ route('paypal.success') }}",
                                type: 'POST',
                                data: {
                                    _token: CSRF_TOKEN,
                                    orderID: data.orderID,
                                    subscriptionID: data.subscriptionID,
                                    paymentSource: data.paymentSource,
                                    clinic_data: clinicData,
                                },
                                dataType: 'JSON',
                                /* remind that 'data' is the response of the AjaxController */
                                success: function(response) {
                                    if (response == 1) {
                                        window.location.href = 'company-details/' + orderID;
                                    }
                                }
                            });
                        }
                    }).render('#paypal-button-container-P-78125875NR880435SMRBJGNA'); // Renders the PayPal button
                </script>
            </div>
        </div>

        <!-- <div class="row my-5">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <form class="payment-form col-6 offset-3 needs-validation" method="POST" id="payment-form" role="form" action="{!! URL::route('stripe.payment') !!}" novalidate>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    {{ csrf_field() }}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <input type="hidden" name="amount" value="1">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <input type="hidden" name="clinic_data" value="{{ $clinic }}">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-12">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <h4 class="pull-left">PAY SECURELY</h4>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="powered-by pull-right">Powered by <strong>Paypal</strong></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-12">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="form-group">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label for="card_no">Paypal</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" class="form-control" name="card_no" placeholder="0000 0000 0000 0000" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="invalid-feedback">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    This is a required field.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-6">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="form-group">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label for="ccExpiryMonth">Expiry Month*</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" class="form-control" name="ccExpiryMonth" placeholder="MM" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="invalid-feedback">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    This is a required field.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="form-group">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label for="ccExpiryYear">Expiry Year*</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" class="form-control" name="ccExpiryYear" placeholder="YYYY" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="invalid-feedback">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    This is a required field.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-6">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="form-group">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label for="cvvNumber">CCV*</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" class="form-control" name="cvvNumber" placeholder="123" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="invalid-feedback">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    This is a required field.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="form-group">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <button type="submit" class="btn btn-primary btn-lg pull-right mt-4"><i class="fa fa-lock"></i> Pay Now</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </form>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div> -->
    </div>
@endsection

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
