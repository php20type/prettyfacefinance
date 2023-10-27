@extends('layouts.frontend_updated')
@section('content')
    <!-- Page header section start -->

    <section class="page-header-section">
        <img class="header_image" src="{{ asset('new_css/img/home/header_clinic.png') }}" alt="header images" />
        <div class="header_title">
            <h2>
                Making non surgical cosmetics<br /> available on finance
                <p class="fs-6">
                    <em>
                        * This page is only for practitioners
                    </em>
                </p>
            </h2>
           
        </div>
    </section>

    <!-- Page header section start -->

    <!-- About Us section start -->

    <section class="About_us-section pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_left-image-sec">
                        <img src="{{ asset('new_css/img/home/clinicpage2.png') }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_right-content-sec ms-lg-5">
                        <h2>
                            Want to know more about using Cosmetic Finance Group in your
                            clinic?
                        </h2>
                        <p>
                            A service created based on the constant growing demand for
                            cosmetic procedures, but the lack of realistic payment plans
                            available within the industry. Cosmetic Finance Group was developed in order to
                            help make non-surgical aesthetic & beauty treatments an
                            affordable luxury! Cosmetic Finance Group enables YOUR clients (or training
                            students) to affordably spread the cost of their procedures/
                            courses, over an achievable timescale convenient to themselves.
                        </p>
                        <p>
                            It is an exciting prospect for your clients to have such ability
                            to receive their desired treatment, but pay for it in later
                            installments. The amazing news is you, as the provider still get
                            paid at usual point of payment* minus small fee.
                        </p>
                        <p>Representative 29.9% APR</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us section end -->

    <!-- Benefits section start -->

    <section class="Benefits-section pb-100">
        <div class="container">
            <div class="section-header text-center pb-lg-5 pb-3">
                <h2>Benefits of using Cosmetic Finance Group</h2>
                <div class="box-column mb-0">
                    <h4>Representative 29.9% APR</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="box-column">
                        <div class="icon-image"><img src="{{ asset('new_css/img/home/b1.png') }}" alt="" /></div>
                        <h4>SIMPLE APPLICATION PROCESS</h4>
                        <p>Instant decision for clients</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box-column">
                        <div class="icon-image"><img src="{{ asset('new_css/img/home/b2.png') }}" alt="" /></div>
                        <h4>INCREASED REVENUE</h4>
                        <p>Average order values are likely to increase</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box-column">
                        <div class="icon-image"><img src="{{ asset('new_css/img/home/b3.png') }}" alt="" /></div>
                        <h4>QUICK PAYMENTS</h4>
                        <p>Receive funds within 24-72 working hours post client treatment</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box-column">
                        <div class="icon-image"><img src="{{ asset('new_css/img/home/money.png') }}" alt="" /></div>
                        <h4>FLEXIBLE REPAYMENT OPTIONS</h4>
                        <p>Attractive to clients</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box-column">
                        <div class="icon-image"><img src="{{ asset('new_css/img/home/b5.png') }}" alt="" /></div>
                        <h4>
                            TOP QUALITY<br />
                            CUSTOMER SERVICE
                        </h4>
                        <p>Our agents will look after both you and your clients</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box-column">
                        <div class="icon-image"><img src="{{ asset('new_css/img/home/b6.png') }}" alt="" /></div>
                        <h4>
                            ACCESS TO OWN<br /> CFG PORTAL
                        </h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box-column">
                        <div class="icon-image"><img src="{{ asset('new_css/img/home/b7.png') }}" alt="" /></div>
                        <h4>
                            PERSONALISED SOCIAL<br />
                            MEDIA TEMPLATES &<br />
                            WEBSITE TEXT
                        </h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box-column">
                        <div class="icon-image"><img src="{{ asset('new_css/img/home/b8.png') }}" alt="" /></div>
                        <h4>CLINIC FINDER</h4>
                        <p>
                            Potential to receive new clients via our site as well as
                            guaranteed increase of income from existing clients
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box-column">
                        <div class="icon-image"><img src="{{ asset('new_css/img/home/b9.png') }}" alt="" /></div>
                        <h4>
                            AUTHORISED CREDIT<br />
                            BROKER
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits section end -->

    <!-- CFG approved section start -->

    <section class="CFG-approved-section">
        <div class="container">
            <h2 class="sec-title">
                So what does it cost to become a CFG approved agent?
            </h2>
            <div class="monthly-payment-sec">
                <div class="left-tick">
                    <img src="{{ asset('new_css/img/home/tickicon.png') }}" />
                </div>
                <div class="right-content">
                    <h3>
                        <strong>One oﬀ £150 admin fee </strong><br />
                        Ongoing compliance cost of £50 per month
                    </h3>
                </div>
            </div>
            <p class="desc">
                For each loan payment you will receive 90% of the funds of the total
                loan amount. Remember this is 90% you would never have received if the
                client didn't have the option to spread the cost!
            </p>
            
            <p class="fs-6 desc">
            <em>For example if loan is £250 you will receive £225</em>
            </p>
        </div>
    </section>

    <!-- CFG approved section end -->

    <!-- CFG registered section start -->

    <section class="CFG-registered-section">
        <div class="container">
            <div class="tag-line text-center">
                <a href="/clinics/request" class="btn theme-btn">
                    Apply now to be a CFG finance agent
                </a>
            </div>
            <p class="desc">
                We currently have a waiting list for taking on new clinics. Submit your details by clicking the gold button above if should be wish to join lists.
            </p>
            <p class="desc">
                Should you have any further questions please do not hesitate to ask.
                Our friendly CFG agents are on hand in the oﬃce, or via social media
                to help.
            </p>
            <p class="desc">
                <strong>We look forward to working alongside you!</strong>
            </p>
        </div>
    </section>

    <!-- CFG registered section end -->
@endsection
