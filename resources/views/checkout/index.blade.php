<style>
    .payment {
        width: 100%;
        max-width: 870px;
        margin: 0 auto;
    }

    .paymentForm {
        background-color: #E9ECEF;
        border-radius: 20px;
        padding: 30px 40px 40px;
        margin-bottom: 40px;
    }

    .paymentForm form {
        margin: 0;
    }

    .paymentForm-hide {
        display: none;
    }

    .paymentForm_title {
        font-size: 25px;
        text-align: center;
        margin-bottom: 15px;
        color: #343A40;
        font-weight: 600;
    }

    .paymentForm_title-left {
        text-align: left;
    }

    .paymentForm_title-left p {
        text-align: left;
    }

    .paymentForm_para p {
        text-align: center;
        font-size: 18px;
        line-height: 1.5;
        color: #969B90;
        margin-bottom: 30px;
    }

    .paymentForm_para strong {
        color: #B19961;
    }

    .paymentForm_para-small p {
        font-size: 16px;
        margin-bottom: 15px;
    }

    .paymentForm_para-left p {
        text-align: left;
    }

    .paymentForm_card {
        background-color: #FFFFFF;
        border-radius: 20px;
        height: 100%;
        padding: 23px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .paymentForm_card_month {
        text-align: center;
        color: #B19961;
        font-weight: 600;
        font-size: 20px;
        margin-bottom: 15px;
        line-height: 20px;
    }

    .paymentForm_card_info {
        text-align: center;
        font-size: 16px;
        color: #969B90;
    }

    .paymentForm_card_info_stat {
        color: #343A40;
    }

    .paymentForm_col {
        margin-bottom: 40px;
    }

    .paymentForm_buttons {
        display: flex;
        width: 100%;
        justify-content: center;
    }

    .paymentForm_buttons-margin {
        margin-top: 20px;
    }

    .paymentForm_button {
        background-color: #B19961;
        padding: 13px;
        color: #FFFFFF;
        font-size: 16px;
        font-weight: 600;
        text-align: center;
        height: 50px;
        border-radius: 25px;
        font-weight: 400;
        transition: all 0.3s ease-in-out;
        width: 100%;
        max-width: 244px;
        margin: 0 10px;
        border: none;
        cursor: pointer;
    }

    .paymentForm_button:hover {
        color: #FFFFFF;
        text-decoration: none;
        background-color: #B19961;
    }

    .paymentForm_button-disabled {
        background-color: #969B90;
    }

    .paymentForm_button-dark {
        background-color: #343A40;
    }

    .paymentForm_button-dark:hover {
        background-color: #343A40;
    }

    .paymentForm_card-on {
        background-color: #B19961;
    }

    .paymentForm_card-on .paymentForm_card_month {
        color: #ffffff;
    }

    .paymentForm_card-on .paymentForm_card_info {
        color: #ffffff;
    }

    .paymentForm_card-on .paymentForm_card_info_stat {
        color: #ffffff;
    }

    .paymentForm_label {
        font-size: 16px;
        color: #969B90;
        margin-bottom: 10px;
        display: block;
    }

    .paymentForm_input_div {
        display: flex;
        align-items: center;
    }


    .paymentForm_input {
        width: 100%;
        height: 50px;
        border-radius: 20px;
        padding: 0 30px;
        font-size: 16px;
        color: #969B90;
        margin-bottom: 20px;
        border: none;
        background-color: #FFFFFF;
    }

    .paymentForm_input-number {
        position: relative;
        padding: 0 30px 0 80px;
    }

    .paymentForm_input-currency {
        position: absolute;
        display: block;
        margin-bottom: 20px;
        color: #969B90;
        left: 40px;
        margin-right: 20px;
        border-right: 1px solid #969B90;
        padding-right: 20px;
    }


    .paymentForm_input-auto {
        width: auto;
        margin-right: 8px;
    }

    .paymentForm_input::-webkit-input-placeholder,
    .paymentForm_input:-moz-placeholder,
    .paymentForm_input::-moz-placeholder,
    .paymentForm_input:-ms-input-placeholder {
        color: #969B90;
    }

    .paymentForm_input:focus {
        outline: none;
        border: none;
    }

    .paymentForm_legend {
        color: #343A40;
        font-size: 18px;
        margin: 20px 0;
        font-weight: 600;
    }

    .paymentForm_iframe {
        height: 250px;
        width: 100%;
        background: #ffffff;
        border-radius: 20px;
        color: #343A40;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 40px;
    }

    .paymentForm_success {
        height: 120px;
        width: 120px;
        background-color: #5BD16F;
        border-radius: 50%;
        margin: 0 auto 35px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .paymentForm_fail {
        height: 120px;
        width: 120px;
        background-color: red;
        border-radius: 50%;
        margin: 0 auto 35px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .paymentForm_success_check {
        fill: #ffffff;
        height: 65px;
        width: 65px;
    }

    .payment_journey {
        margin-bottom: 20px;
        display: flex;
        flex-wrap: wrap;
        max-width: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    @media (min-width: 768px) {
        .payment_journey {
            margin-bottom: 40px;
        }
    }

    .payment_journey_step_title {
        text-align: center;
        color: #969B90;
        margin: 0 0 10px;
    }

    .payment_journey_step-on .payment_journey_step_title {
        color: #B19961;
    }

    .payment_journey_number {
        height: 50px;
        width: 50px;
        background: #969B90;
        border-radius: 50%;
        justify-content: center;
        align-items: center;
        color: #ffffff;
        font-weight: 700;
        font-size: 20px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        display: none;
    }

    @media (min-width: 768px) {
        .payment_journey_number {
            display: flex;
        }
    }

    .payment_journey_step-on .payment_journey_number {
        background: #B19961;
    }

    .payment_journey_step {
        position: relative;
        margin-right: 8px;
    }

    @media (min-width: 768px) {
        .payment_journey_step {
            width: 100%;
            max-width: calc(100% / 6);
            margin-right: 0;
        }
    }

    .payment_journey_step:before,
    .payment_journey_step:after {
        content: "";
        width: 50%;
        height: 6px;
        background: #969B90;
        position: absolute;
        z-index: 1;
        top: calc(50% + 16px);
        display: none;
    }

    @media (min-width: 768px) {

        .payment_journey_step:before,
        .payment_journey_step:after {
            display: block;
        }
    }

    .payment_journey_step-on:before {
        background: #B19961;
    }

    .payment_journey_step-previous:after {
        background: #B19961;
    }

    .payment_journey_step:before {
        left: 0;
    }

    .payment_journey_step:after {
        right: 0;
    }

    .payment_journey_step:first-child:before,
    .payment_journey_step:last-child:after {
        display: none;
    }

    .paymentForm_step-hide {
        display: none;
    }

    .paymentForm-yourInfo_para {
        margin-bottom: 30px;
        max-width: 500px;
    }

    .paymentForm-yourCreditCheck_para {
        margin-bottom: 30px;
    }

    .paymentForm-cardDetails_para {
        margin-bottom: 45px;
    }

    .paymentForm-overview_para {
        margin-bottom: 30px;
    }

    .paymentForm-confirm_para {
        margin-bottom: 30px;
    }

    .paymentForm-approved_para {
        max-width: 658px;
        margin: 0 auto;
    }

    .paymentForm_checkbox {
        opacity: 0;
        position: absolute;
        width: 25px;
        height: 25px;
        padding: 6px;
    }

    .paymentForm_checkbox_label {
        color: #343A40;
        font-weight: 600;
        margin-bottom: 30px;
        display: flex;
        cursor: pointer;
    }

    .paymentForm_checkbox_tick {
        background: white;
        width: 25px;
        height: 25px;
        display: block;
        border-radius: 50%;
        padding: 6px;
        margin-right: 8px;
    }

    .paymentForm_checkbox_tick svg {
        display: none;
    }

    .paymentForm_checkbox_label-active .paymentForm_checkbox_tick svg {
        display: block;
    }
</style>

@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php // $post_data->request_data->order_details->order_id;
                ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">

                <div class="payment">

                    <div class="payment_journey">
                        <div class="payment_journey_step payment_journey_step-on" data-id="1">
                            <div class="payment_journey_step_title">Your Loan</div>
                            <div class="payment_journey_number">1</div>
                        </div>
                        <div class="payment_journey_step" data-id="2">
                            <div class="payment_journey_step_title">Your Info</div>
                            <div class="payment_journey_number">2</div>
                        </div>
                        <div class="payment_journey_step" data-id="3">
                            <div class="payment_journey_step_title">Credit Check</div>
                            <div class="payment_journey_number">3</div>
                        </div>
                        <div class="payment_journey_step" data-id="4">
                            <div class="payment_journey_step_title">Card Details</div>
                            <div class="payment_journey_number">4</div>
                        </div>
                        <div class="payment_journey_step" data-id="5">
                            <div class="payment_journey_step_title">Overview</div>
                            <div class="payment_journey_number">5</div>
                        </div>
                        <div class="payment_journey_step" data-id="6">
                            <div class="payment_journey_step_title">Confirm</div>
                            <div class="payment_journey_number">6</div>
                        </div>
                    </div>

                    <div class="paymentForm paymentForm-yourLoan" data-id="1">
                        <form>
                            <h1 class="paymentForm_title">Choose your loan term</h1>
                            <div class="paymentForm_para">

                                <p>You have selected services totalling <strong>&pound;{{ $order->total }}</strong> from
                                    {{ $clinic->name }}<br />
                                    Select a loan term for your repayments below</p>
                            </div>
                            <input id="loan_amount" name="loan_amount" type="hidden" value="{{ $order->total }}">
                            <input id="loan_term_months" name="loan_term_months" type="hidden" value="">
                            <input id="application_ref" name="application_ref" type="hidden" value="">
                            <input id="clinic_name" name="clinic_name" type="hidden" value="{{ $clinic->name }}">
                            <div class="row">
                                @foreach ($loan_products as $lp)
                                    <div class="paymentForm_col col-12 col-lg-4">
                                        <div class="paymentForm_card js-payment-type" data-months="{{ $lp->loan_term }}">
                                            <div class="paymentForm_card_month">{{ $lp->loan_term }} months</div>
                                            <div class="paymentForm_card_info">
                                                Loan term: <span class="paymentForm_card_info_stat">{{ $lp->loan_term }}
                                                    months</span><br />
                                                Installment amount: <span
                                                    class="paymentForm_card_info_stat">&pound;{{ $lp->instalment_amount }}</span><br />
                                                Total amount: <span
                                                    class="paymentForm_card_info_stat">&pound;{{ $lp->total_amount }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="paymentForm_buttons">
                                <a href="#"
                                    class="paymentForm_button paymentForm_button-disabled js-step-your-loan">Next Step</a>
                            </div>
                        </form>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-yourInfo" data-id="2">
                        <h1 class="paymentForm_title paymentForm_title-left">In order to proceed, we need to complete a Soft
                            Credit Check</h1>
                        <div
                            class="paymentForm_para paymentForm-yourInfo_para paymentForm_para-small paymentForm_para-left mb-6">
                            <p>which we will use as an initial indication as to whether you meet our affordability criteria.
                            </p>
                            <p>Soft Credit Checks DO NOT show on your credit file.</p>
                        </div>
                        <form id="paymentForm-yourInfo">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="title" class="paymentForm_label">Title</label>
                                    <select id="title" name="title" class="paymentForm_input" required>
                                        <option value="MR">Mr</option>
                                        <option value="MRS">Mrs</option>
                                        <option value="MS">Ms</option>
                                        <option value="MISS">Miss</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="first_name" class="paymentForm_label">First Name</label>
                                    <input id="first_name" type="text" class="paymentForm_input" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="last_name" class="paymentForm_label">Last Name</label>
                                    <input id="last_name" type="text" class="paymentForm_input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="dob" class="paymentForm_label">Date of Birth</label>
                                    @php
                                        
                                        $days = [];
                                        for ($i = 1; $i <= 31; $i++) {
                                            $days[$i] = $i;
                                        }
                                        
                                        $months = [];
                                        for ($i = 1; $i <= 12; $i++) {
                                            $months[$i] = $i;
                                        }
                                        
                                        $years = [];
                                        for ($i = date('Y'); $i >= 1900; $i--) {
                                            $years[$i] = $i;
                                        }
                                        
                                    @endphp
                                    <select id="dob_day" class="paymentForm_input paymentForm_input-auto" required>
                                        <option value="">DD</option>
                                        @foreach ($days as $day)
                                            <option value="{{ $day }}">{{ $day }}</option>
                                        @endforeach
                                    </select>
                                    <select id="dob_month" class="paymentForm_input paymentForm_input-auto" required>
                                        <option value="">MM</option>
                                        @foreach ($months as $month)
                                            <option value="{{ $month }}">{{ $month }}</option>
                                        @endforeach
                                    </select>
                                    <select id="dob_year" class="paymentForm_input paymentForm_input-auto" required>
                                        <option value="">YYYY</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="email" class="paymentForm_label">Email Address</label>
                                    <input id="email" type="email" class="paymentForm_input" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="mobile_phone" class="paymentForm_label">Phone Number</label>
                                    <input id="mobile_phone" type="tel" class="paymentForm_input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="paymentForm_legend">Your Address</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="building_info" class="paymentForm_label">House Number/Name</label>
                                    <input id="building_info" type="input" class="paymentForm_input" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="street" class="paymentForm_label">Street</label>
                                    <input id="street" type="input" class="paymentForm_input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="post_code" class="paymentForm_label">Postcode</label>
                                    <input id="post_code" type="input" class="paymentForm_input" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="city" class="paymentForm_label">City</label>
                                    <input id="city" type="input" class="paymentForm_input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="paymentForm_legend">Your Employment Information</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="employment_type" class="paymentForm_label">Employment Type</label>
                                    <select id="employment_type" class="paymentForm_input" required>
                                        <option value="FULL_TIME">Full Time</option>
                                        <option value="PART_TIME">Part Time</option>
                                        <option value="TEMPORARY">Temporary</option>
                                        <option value="SELF_EMPLOYED">Self Employed</option>
                                        <option value="UNEMPLOYED">Unemployed</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="no_of_dependents" class="paymentForm_label">Number of Dependents</label>
                                    <input id="no_of_dependents" type="number" class="paymentForm_input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="monthly_income" class="paymentForm_label">Monthly Income</label>
                                    <div class="paymentForm_input_div">
                                        <input id="monthly_income" type="number"
                                            class="paymentForm_input paymentForm_input-number" required>
                                        <span class="paymentForm_input-currency">£</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="monthly_expenses" class="paymentForm_label">Monthly Expenses</label>
                                    <div class="paymentForm_input_div">
                                        <input id="monthly_expenses" type="number"
                                            class="paymentForm_input paymentForm_input-number" required>
                                        <span class="paymentForm_input-currency">£</span>
                                    </div>
                                </div>
                            </div>
                            <div class="paymentForm_buttons paymentForm_buttons-margin">
                                <a href="#"
                                    class="paymentForm_button paymentForm_button-dark js-previous-your-info">Previous
                                    Step</a>
                                <input type="submit" class="paymentForm_button js-next-your-info" value="Next Step">
                            </div>
                        </form>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-yourInfoSuccess" data-id="2">
                        <div class="paymentForm_success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="paymentForm_success_check">
                                <path
                                    d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" />
                            </svg></div>
                        <h1 class="paymentForm_title">Great news!</h1>
                        <div class="paymentForm_para">
                            <p>You've passed our soft check and can proceed to the next step of your application</p>
                        </div>
                        <div class="paymentForm_buttons">
                            <a href="#"
                                class="paymentForm_button paymentForm_button-dark js-previous-your-info-success"">Previous
                                Step</a>
                            <a href="#" class="paymentForm_button js-next-your-info-success">Next Step</a>
                        </div>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-yourInfoFail" data-id="2">
                        <div class="paymentForm_fail"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="paymentForm_success_check">
                                <path
                                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                            </svg></div>
                        <h1 class="paymentForm_title">Application failed</h1>
                        <div class="paymentForm_para">
                            <p>An unexpected error has occurred. Please go back and try again.</p>
                            <div class="error_message"></div>
                        </div>
                        <div class="paymentForm_buttons">
                            <a href="#"
                                class="paymentForm_button paymentForm_button-dark js-previous-your-info-success">Previous
                                Step</a>
                        </div>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-yourInfoUnapproved" data-id="2">
                        <div class="paymentForm_fail"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="paymentForm_success_check">
                                <path
                                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                            </svg></div>
                        <h1 class="paymentForm_title">Application cannot be approved</h1>
                        <div class="paymentForm_para">
                            <p>Unfortunately your application cannot be approved at this time.</p>
                        </div>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-yourCreditCheck" data-id="3">
                        <h1 class="paymentForm_title paymentForm_title-left">Hard Credit Check</h1>
                        <div
                            class="paymentForm-yourCreditCheck_para paymentForm_para paymentForm_para-small paymentForm_para-left">
                            <p>We now need to perform a Hard Credit Check, which will confirm your eligibility for the loan.
                            </p>
                            <p>This check WILL show on your credit file.</p>
                        </div>
                        <form id="paymentForm-yourCreditCheck">
                            <label for="agree_credit_check"
                                class="paymentForm_checkbox_label js-paymentForm_checkbox_label">
                                <div class="paymentForm_checkbox_tick"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" />
                                    </svg></div>
                                <input id="agree_credit_check" name="agree_credit_check" value="true" type="checkbox"
                                    class="paymentForm_checkbox" required>Please tick this box to agree to a hard credit
                                check
                            </label>
                            <div
                                class="paymentForm-yourCreditCheck_para paymentForm_para paymentForm_para-small paymentForm_para-left">
                                <p>Alongside the information submitted in Step 2, we require your bank account information
                                    in order to perform the hard credit check.</p>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <label for="bank_account_number" class="paymentForm_label">Bank Account Number</label>
                                    <input id="bank_account_number" type="number" maxlength="8"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="paymentForm_input" required>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="bank_sort_code" class="paymentForm_label">Sort Code</label>
                                    <input id="bank_sort_code" type="number" maxlength="6"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="paymentForm_input" required>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="debit_card_type" class="paymentForm_label">Debit Card Type</label>
                                    <select id="debit_card_type" class="paymentForm_input" required>
                                        <option value="VISA_DEBIT">Visa Debit</option>
                                        <option value="VISA_DELTA">Visa Delta</option>
                                        <option value="VISA_ELECTRON">Visa Electron</option>
                                        <option value="SWITCH_MAESTRO">Switch Maestro</option>
                                        <option value="MASTERCARD">Mastercard</option>
                                    </select>
                                </div>
                            </div>
                            <div class="paymentForm_buttons paymentForm_buttons-margin">
                                <a href="#"
                                    class="paymentForm_button paymentForm_button-dark js-previous-your-credit-check">Previous
                                    Step</a>
                                <input type="submit" class="paymentForm_button js-next-your-credit-check"
                                    value="Next Step">
                            </div>
                        </form>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-yourCreditCheckSuccess" data-id="3">
                        <div class="paymentForm_success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="paymentForm_success_check">
                                <path
                                    d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" />
                            </svg></div>
                        <h1 class="paymentForm_title">Great news!</h1>
                        <div class="paymentForm_para">
                            <p>You've passed our soft check and can proceed to the next step of your application</p>
                        </div>
                        <div class="paymentForm_buttons">
                            <a href="#"
                                class="paymentForm_button paymentForm_button-dark js-previous-your-credit-check-success">Previous
                                Step</a>
                            <a href="#" class="paymentForm_button js-next-your-credit-check-success">Next Step</a>
                        </div>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-yourCreditCheckFail" data-id="3">
                        <div class="paymentForm_fail"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="paymentForm_success_check">
                                <path
                                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                            </svg></div>
                        <h1 class="paymentForm_title">Application fail</h1>
                        <div class="paymentForm_para">
                            <p>An unexpected error has occurred. Please go back and try again.</p>
                            <div class="error_message"></div>
                        </div>
                        <div class="paymentForm_buttons">
                            <a href="#"
                                class="paymentForm_button paymentForm_button-dark js-previous-your-credit-check-success">Previous
                                Step</a>
                        </div>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-yourCreditCheckUnapproved" data-id="3">
                        <div class="paymentForm_fail"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="paymentForm_success_check">
                                <path
                                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                            </svg></div>
                        <h1 class="paymentForm_title">Application cannot be approved</h1>
                        <div class="paymentForm_para">
                            <p>Unfortunately your application cannot be approved at this time.</p>
                        </div>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-cardDetails" data-id="4">
                        <h1 class="paymentForm_title paymentForm_title-left">Card details for Loan repayments</h1>
                        <div
                            class="paymentForm-cardDetails_para paymentForm_para paymentForm_para-small paymentForm_para-left">
                            <p>Please enter your credit/debit card details to be used for the loan repayments below.</p>
                        </div>
                        <form id="paymentForm-cardDetails">
                            <input id="card_captured" name="card_captured" type="hidden" value="true" />
                            <input id="card_ref" name="card_ref" type="hidden" value="197465" />
                            <div class="js-card_capture_url"></div>
                            <div class="paymentForm_buttons paymentForm_buttons-margin">
                                <a href="#"
                                    class="paymentForm_button paymentForm_button-dark js-previous-card-details">Previous
                                    Step</a>
                                <input type="submit" class="paymentForm_button js-next-card-details" value="Next Step">
                            </div>
                        </form>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-cardDetailsFail" data-id="4">
                        <div class="paymentForm_fail"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="paymentForm_success_check">
                                <path
                                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                            </svg></div>
                        <h1 class="paymentForm_title">Application fail</h1>
                        <div class="paymentForm_para">
                            <p>An unexpected error has occurred. Please go back and try again.</p>
                            <div class="error_message"></div>
                        </div>
                        <div class="paymentForm_buttons">
                            <a href="#"
                                class="paymentForm_button paymentForm_button-dark js-previous-card-details">Previous
                                Step</a>
                        </div>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-overview" data-id="5">
                        <h1 class="paymentForm_title paymentForm_title-left">Your Loan Explained</h1>
                        <div
                            class="paymentForm-overview_para paymentForm_para paymentForm_para-small paymentForm_para-left">
                            <p>Please take time to read the loan documents below and if you are happy to proceed, then tick
                                the box below each one to agree to the loan terms contained in them.</p>
                        </div>
                        <form id="paymentForm-overview">
                            <input id="agree_precontract" name="agree_precontract" type="hidden" value="false" />
                            <div class="js-loan_explanation_doc_url"></div>
                            <label for="agree_precontract1"
                                class="paymentForm_checkbox_label js-paymentForm_checkbox_label">
                                <div class="paymentForm_checkbox_tick"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" />
                                    </svg></div>
                                <input id="agree_precontract1" name="agree_precontract1" value="true" type="checkbox"
                                    class="paymentForm_checkbox" required>I have read and accept the terms outlined in the
                                document above
                            </label>
                            <div class="js-secci_doc_url"></div>
                            <label for="agree_precontract2"
                                class="paymentForm_checkbox_label js-paymentForm_checkbox_label">
                                <div class="paymentForm_checkbox_tick"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" />
                                    </svg></div>
                                <input id="agree_precontract2" name="agree_precontract2" value="true" type="checkbox"
                                    class="paymentForm_checkbox" required>I have read and accept the terms outlined in the
                                document above
                            </label>
                            <div class="paymentForm_buttons paymentForm_buttons-margin">
                                <a href="#"
                                    class="paymentForm_button paymentForm_button-dark js-previous-overview">Previous
                                    Step</a>
                                <input type="submit" class="paymentForm_button js-next-overview" value="Next Step">
                            </div>
                        </form>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-overviewFail" data-id="5">
                        <div class="paymentForm_fail"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="paymentForm_success_check">
                                <path
                                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                            </svg></div>
                        <h1 class="paymentForm_title">Application failed</h1>
                        <div class="paymentForm_para">
                            <p>An unexpected error has occurred. Please go back and try again.</p>
                            <div class="error_message"></div>
                        </div>
                        <div class="paymentForm_buttons">
                            <a href="#"
                                class="paymentForm_button paymentForm_button-dark js-previous-confirm">Previous Step</a>
                        </div>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-confirm" data-id="6">
                        <h1 class="paymentForm_title paymentForm_title-left">Confirm and Sign your Loan Agreement</h1>
                        <div
                            class="paymentForm-confirm_para paymentForm_para paymentForm_para-small paymentForm_para-left">
                            <p>Thank you for reading and accepting the loan terms.</p>
                            <p>The final step is for you to read and sign the document below to finalise the loan agreement.
                            </p>
                        </div>
                        <form id="paymentForm-confirm">
                            <div class="js-esign_doc_url"></div>
                            <label for="agree_esign" class="paymentForm_checkbox_label js-paymentForm_checkbox_label">
                                <div class="paymentForm_checkbox_tick"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" />
                                    </svg></div>
                                <input id="agree_esign" name="agree_esign" value="true" type="checkbox"
                                    class="paymentForm_checkbox" required>I have read and accept the terms outlined in the
                                document above
                            </label>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="signature" class="paymentForm_label">signature</label>
                                    <input id="signature" type="input" class="paymentForm_input" required>
                                </div>
                            </div>
                            <div class="paymentForm_buttons paymentForm_buttons-margin">
                                <a href="#"
                                    class="paymentForm_button paymentForm_button-dark js-previous-confirm">Previous
                                    Step</a>
                                <input type="submit" class="paymentForm_button js-next-confirm" value="Next Step">
                            </div>
                        </form>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-confirmFail" data-id="6">
                        <div class="paymentForm_fail"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="paymentForm_success_check">
                                <path
                                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                            </svg></div>
                        <h1 class="paymentForm_title">Application failed</h1>
                        <div class="paymentForm_para">
                            <p>An unexpected error has occurred. Please go back and try again.</p>
                            <div class="error_message"></div>
                        </div>
                        <div class="paymentForm_buttons">
                            <a href="#"
                                class="paymentForm_button paymentForm_button-dark js-previous-approved">Previous Step</a>
                        </div>
                    </div>

                    <div class="paymentForm paymentForm-hide paymentForm-approved" data-id="6">
                        <div class="paymentForm_success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="paymentForm_success_check">
                                <path
                                    d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" />
                            </svg></div>
                        <h1 class="paymentForm_title">Loan Approved</h1>
                        <div class="paymentForm-approved_para paymentForm_para">
                            <p>Your loan to pay for services totalling &pound;{{ $order->total }} at {$clinic->name}} has
                                been approved and your clinic has been informed.</p>
                            <p>Your repayments won’t commence until you begin your treatment.</p>
                            <p>To activate the loan and begin repayments, you will have just received an email from Pretty
                                Face Finance that contains a link that your clinic will instruct you to click to activate
                                the loan upon receiving your treatment.</p>
                            <p>Please contact the clinic directly to book your appointment if you haven’t done so already
                                and let them know you have been approved for finance through Cosmetic Finance Group.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
