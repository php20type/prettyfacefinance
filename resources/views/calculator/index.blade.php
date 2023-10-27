@extends('layouts.frontend_updated')
@section('content')
    <!-- header section start -->

    <!-- Page header section start -->

    <section class="page-header-section">
        <img class="header_image" src="{{ asset('new_css/img/home/finance_banner.jpg') }}" alt="header images" />
        <div class="header_title">
            <h2>Client Finance Options</h2>
        </div>
    </section>

    <!-- Page header section start -->

    <!-- About Us section start -->

    <section class="About_us-section pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_left-image-sec">
                        <img src="{{ asset('new_css/img/home/finance-left-client-sec.jpg') }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_right-content-sec finance_about ms-lg-5">
                        <h2>
                            Affordably spread the cost of your treatments or training
                            through CFG’S lending partner; Snap Finance!
                        </h2>
                        <p>Representative 29.9% APR</p>
                        <p>
                            <img class="tickicon" src="{{ asset('new_css/img/home/tickicon.png') }}" />Spread the
                            cost up to 36 months
                        </p>
                        <p>
                            <img class="tickicon" src="{{ asset('new_css/img/home/tickicon.png') }}" />Pay in 4
                            months and we’ll cancel the interest*
                        </p>
                        <p class="fs-6">
                            <em>
                                *Interest is charged from the day your loan starts and will only be cancelled if you pay off the amount of credit advanced within the pay in 4 period.
                            </em>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us section end -->

    <!-- Representative Example section start -->
    {{-- 
    <section class="Representative-example-section">
        <div class="container">
            <p>
                *Interest is charged from the day your loan starts and will only be
                cancelled if you pay off the amount of credit advanced within the Pay
                in 4 Period.
            </p>
            <p>
                Flexible repayment options available. Choose weekly, fortnightly,
                every four weeks or monthly. Representative Example: Cost of Treatment
                £600, Deposit £50, Amount of Credit £550, Annual Fixed Interest Rate
                26.47%, Monthly Payment £22.41, Term 36 months, Total Payable £856.76,
                Representative 29.9% APR.
            </p>
        </div>
    </section> --}}

    <!-- Representative Example section end -->

    <!-- About Us section start -->

    <section class="About_us-section pt-100 pb-100">
        <div class="container">
            <div class="row mb-lg-5 mb-3">
                <div class="col-lg-6">
                    <div class="about_right-content-sec me-lg-5 mt-lg-5 mt-0">
                        <h2>Flexible Payment Plans Available</h2>
                        <p>
                            Cosmetic Finance Group offer point of sale finance solutions that are up to
                            36 months in term via our lending partners, Snap Finance. With
                            their Pay in 4 option, if you settle your loan within 4 months,
                            then any interest you will have accrued will be cancelled!
                        </p>
                        <p>
                            They are flexible and your payments can be too. If life happens,
                            you can just continue with your minimum payments over the full
                            loan term.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_left-image-sec">
                        <img src="{{ asset('new_css/img/home/cosmeticfinanceimage2.jpg') }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_left-image-sec me-lg-5">
                        <img src="{{ asset('new_css/img/home/cosmeticfinanceimage3.jpg') }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_right-content-sec mt-lg-5 mt-0">
                        <h2>What Is Pay In 4?</h2>
                        <p>
                            All our loans come with the Pay in 4 option! If you repay the
                            full amount back in 4 monthly instalments then any interest will
                            be cancelled. If payday is right around the corner but your
                            purchase can't wait, then apply now, but settle within 4 months!
                        </p>
                        <p>
                            *Interest is charged from the day your loan starts and will only
                            be cancelled if you pay off the amount of credit advanced within
                            the Pay in 4 Period.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us section end -->

    <!-- Eligibility Criteria section start -->

    <section class="Eligibility-criteria-section pb-100">
        <div class="container">
            <div class="section-header text-center pb-lg-5 pb-3">
                <h2>Eligibility Criteria</h2>
                <p>
                    Please take a look at the criteria below that makes you eligible for finance today:
                </p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="icon-img">
                        <img src="{{ asset('new_css/img/home/icon1.png') }}" />
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="icon-img">
                        <img src="{{ asset('new_css/img/home/icon2.png') }}" />
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="icon-img">
                        <img src="{{ asset('new_css/img/home/icon3.png') }}" />
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="icon-img">
                        <img src="{{ asset('new_css/img/home/icon4.png') }}" />
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="icon-img">
                        <img src="{{ asset('new_css/img/home/icon5.png') }}" />
                    </div>
                </div>
                <div class="col-lg-12 text-center pt-lg-4 pt-3">
                    <p>
                        There is a minimum £50 deposit if you're approved, but you won't
                        need to pay that until you've chosen your items and are ready to
                        sign the agreement. This will be deducted from the total amount of
                        the loan!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Eligibility Criteria section end -->

    <!-- Pricing Example section start -->

    <section class="Pricing-example-section pb-100">
        <div class="container">
            <div class="section-header text-center pb-lg-3 pb-3">
                <h2>Pricing Example</h2>
            </div>
            <div class="Pricing_table-image">
                <img src="{{ asset('new_css/img/home/pricing-new-image.jpg') }}" />
            </div>
            {{-- <div class="table-responsive">
                <table class="table caption-top">
                    <thead>
                        <tr>
                            <th scope="col">Total Treatment Cost</th>
                            <td>&#163;600</td>
                            <td>24 months</td>
                            <td>&#163;29.91 pm</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Loan Amount</th>
                            <td>&#163;550</td>
                            <td>36 months</td>
                            <td>&#163;22.41 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">Deposit</th>
                            <td>&#163;50</td>
                            <td>Pay in 4*</td>
                            <td>&#163;137.50 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">APR</th>
                            <td>&#163;29.90%</td>

                        </tr>
                    </tbody>
                </table>
            </div> --}}
        </div>
    </section>

    <!-- Pricing Example section end -->

    <!-- Representative Example section start -->

    <section class="Representative-example-section">
        <div class="container">
            <p>
                *Interest is charged from the day your loan starts and will only be
                cancelled if you pay off the amount of credit advanced within the pay
                in 4 period. If your loan application is successful. Upon completion
                the lender will pay us a commission. This does not affect the price
                you pay in any way.
            </p>
            <p>
                Representative Example: Cost of Goods £600, Deposit £50, Amount of
                Credit £550, Annual Fixed Interest Rate 26.47%, Monthly Payment
                £22.41, Term 36 months, Total Payable £856.76, Representative 29.9%
                APR
            </p>
            <p>
                Cosmetic Finance Group Ltd is authorised and regulated by the
                Financial Conduct Authority (Firm reference number 943771). We are a
                credit broker, not a lender, and offer credit facilities from Snap
                Finance. Snap Finance Ltd act as the lender. Credit subject to status.
                Terms and conditions apply. Snap Finance Ltd is a company registered
                in England and Wales. Company Number 08080202 Registered address: Snap
                Finance Ltd, 1 Vincent Avenue, Crownhill, Milton Keynes, MK8 0AB
            </p>
        </div>
    </section>

    <!-- Representative Example section end -->
@endsection
