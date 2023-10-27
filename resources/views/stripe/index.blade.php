@extends("layouts.frontend")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="pb-2 my-5 border-bottom">Account Sign In</h1>
            </div>
        </div>
 
        <div class="row">
            <div class="col-6 offset-3">
                <div class="payment-notice text-center">PLEASE PAY THE FIRST TIME SIGN UP FEE OF <span class="amount">£499</span> TO CONTINUE</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('error'))
                    <div class="custom-alerts alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        {!! $message !!}
                    </div>
                    <?php Session::forget('error');?>
                @endif
            </div>
        </div>

        <div class="row my-5">
            <form class="payment-form col-6 offset-3 needs-validation" method="POST" id="payment-form" role="form" action="{!! URL::route('stripe.payment') !!}" novalidate>
                {{ csrf_field() }}
                <input type="hidden" name="amount" value="1">

                <input type="hidden" name="clinic_data" value="{{$clinic}}">
                <div class="row">
                    <div class="col-12">
                        <h4 class="pull-left">PAY SECURELY</h4>
                        <div class="powered-by pull-right">Powered by <strong>stripe</strong></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="card_no">Card Number*</label>
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
        </div>
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