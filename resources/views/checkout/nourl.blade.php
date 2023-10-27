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
                <?php // $post_data->request_data->order_details->order_id; ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                
                <div class="payment">
                    
                    <div class="paymentForm paymentForm-yourLoan" data-id="1">
                        <form>
                            <h1 class="paymentForm_title">Finance currently available</h1>
                            <div class="paymentForm_para">
                                <p>Unfortunately, this clinic isn’t currently accepting new finance applications.
                                    Please check back soon.</p>
                            </div>
                            
                            <div class="paymentForm_buttons">
                                <a href="/basket" class="paymentForm_button paymentForm_button-dark js-previous-your-info">Back to basket</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection