@extends('layouts.frontend')
@section('content')
    <style>
        .landing-options .step .inner .number {
            width: 161px;
            height: 36px;
            background-color: #B29961;
            color: white;
            text-align: center;
            line-height: 33px;
            font-size: 30px;
            border-radius: 3%;
            border: solid 1px #B29961;
            position: absolute;
            top: -21px;
            left: 0;
            right: 0;
            margin: auto;
        }

        .landing-options .step .inner {
            height: 100%;
            background-color: #ffffff;
            color: #B29961;
            font-size: 17px;
            border: solid 2px #B29961;
            position: relative;
        }

        .font-size-61 {
            font-size: 2rem;
        }

        @media (min-width: 992px) {
            .font-size-61 {
                font-size: 3rem;
            }
        }

        @media (min-width: 1200px) {
            .font-size-61 {
                font-size: 61px;
            }
        }

        .font-size-40 {
            font-size: 2rem;
            line-height: 1.3;
        }

        @media (min-width: 992px) {
            .font-size-40 {
                font-size: 40px;
                line-height: 1.3;
            }
        }

        .font-size-27 {
            font-size: 20px;
        }

        @media (min-width: 992px) {
            .font-size-27 {
                font-size: 27px;
            }
        }

        .font-size-20 {
            font-size: 16px;
        }

        @media (min-width: 992px) {
            .font-size-20 {
                font-size: 20px;
            }
        }



        .pt-9 {
            padding-top: 9rem
        }

        .pb-9 {
            padding-bottom: 9rem
        }

        .fcaApproved {
            background-color: black;
            padding-top: 6rem;
            padding-bottom: 6rem;
            background-image: url('img/approved.png');
            background-size: cover;
        }

        .fcaApproved_container {
            max-width: 860px;
            color: white;
        }

        .fcaApproved_image {
            width: 40px;
            display: block;
            margin: 0 auto;
        }

        .benefitsIcons {
            color: #5B5B5B;
        }

        .iconHeight {
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (min-width: 992px) {
            .iconHeight {
                height: 150px;
            }
        }

        .iconHeight {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .costPractitioner_container {
            max-width: 910px;
        }

        .costPractitioner_btn {
            border-radius: 10px;
            color: white;
            white-space: unset;
            max-width: 560px;
            font-size: 27px;
            line-height: 1.3;
            padding: 1rem;
        }
    </style>

    <div class="jumbotron jumbotron-dark home px-md-3 pt-9 pb-9 rounded-0" data-parallax="scroll"
        data-image-src="img/morejumbotron.png" data-ios-fix="true" data-android-fix="true">
        <div class="container p-0 px-3">
            <div class="row">
                <div class="col-12 col-md-6 p-0 px-3">
                    <h1 class="font-size-61">Want to know more
                        about using Pretty
                        Face Finance in
                        your clinic?</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="py-4">
        <div class="container px-0 py-md-5 px-3 font-size-20">
            <div class="row">
                <div class="col-12 col-md-7">
                    <span class="about font-weight-bold font-size-40">Thank you for displaying an
                        interest in Cosmetic Finance Group.</span><br>
                    <br>
                    A service created based on the constant
                    growing demand for cosmetic procedures, but
                    the lack of realistic payment plans available
                    within the industry. CFG was developed in order
                    to help make non-surgical aesthetic & beauty
                    treatments an affordable luxury! CFG enables
                    YOUR clients (or training students) to affordably
                    spread the cost of their procedures/courses,
                    over an achievable timescale convenient to
                    themselves.<br>
                    <br>
                    It is an exciting prospect for your clients to have
                    such ability to receive their desired treatment,
                    but pay for it in later installments. The amazing
                    news is you, as the provider still get paid at
                    usual point of payment* minus small fee.<br>
                    <br>
                </div>
                <div class="col-12 col-md-5">
                    <img src="img/displaying-interest.png" class="w-100 mb-4">
                </div>
            </div>
        </div>
    </section>

    <section class="benefitsIcons py-4">
        <div class="container p-0 px-3 px-lg-4">
            <div class="text-center">
                <span class="about font-weight-bold font-size-40">BENEFITS OF USING Cosmetic Finance Group</span><br>
                <br>
                <div class="row mx-lg-n4">
                    <div class="col-12 col-md-4 mb-2 mb-md-4 px-lg-4">
                        <div class="iconHeight">
                            <img src="img/icons/risk_free.png" alt="risk free">
                        </div>
                        <div class="font-size-20">
                            <strong>RISK FREE</strong><br>
                            We take on all responsibility
                            of payments.
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 px-lg-4">
                        <div class="iconHeight">
                            <img src="img/icons/increased_revenue.png" alt="increased revenue">
                        </div>
                        <div class="font-size-20">
                            <strong>INCREASED REVENUE</strong><br>
                            Average order values are
                            likely to increase
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 px-lg-4">
                        <div class="iconHeight">
                            <img src="img/icons/no_monthly_fees.png" alt="no monthly fees">
                        </div>
                        <div class="font-size-20">
                            <strong>NO MONTHLY FEES<br>
                                & QUICK PAYMENTS</strong><br>
                            Receive funds within 24 working
                            hours post client treatment
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 px-lg-4">
                        <div class="iconHeight">
                            <img src="img/icons/interest_free_options.png" alt="interest free options">
                        </div>
                        <div class="font-size-20">
                            <strong>PAY IN 4 & ALL INTEREST IS CANCELLED</strong><br>
                            Attractive to clients
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 px-lg-4">
                        <div class="iconHeight">
                            <img src="img/icons/top_quality.png" alt="top quality">
                        </div>
                        <div class="font-size-20">
                            <strong>TOP QUALITY<br>
                                CUSTOMER SERVICE</strong><br>
                            Our agents will look after
                            both you and your clients
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 px-lg-4">
                        <div class="iconHeight">
                            <img src="img/icons/access_to_own.png" alt="access to own">
                        </div>
                        <div class="font-size-20">
                            <strong>ACCESS TO OWN<br>
                                PRIVATE PORTAL</strong><br>
                            (example link below)
                        </div>
                    </div>
                    {{-- <div class="col-12 col-md-4 mb-4 px-lg-4">
                        <div class="iconHeight">
                            <img src="img/icons/personalised_social.png" alt="personalised social">
                        </div>
                         <div class="font-size-20">
                            <strong>PERSONALISED SOCIAL
                                MEDIA TEMPLATES &amp;
                                WEBSITE TEXT</strong>
                        </div>
                    </div> --}}
                    <div class="col-12 col-md-4 mb-4 px-lg-4">
                        <div class="iconHeight">
                            <img src="img/icons/clinic_finder.png" alt="clinic finder">
                        </div>
                        <div class="font-size-20">
                            <strong>CLINIC FINDER</strong><br>
                            Potential to receive new
                            clients via our site as well
                            as guaranteed increase of
                            income from existing clients
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 px-lg-4">
                        <div class="iconHeight">
                            <img src="img/icons/authorised.png" alt="authorised">
                        </div>
                        <div class="font-size-20">
                            <strong>AUTHORISED &
                                REGULATED BY THE
                                FINANCIAL CONDUCT
                                AUTHORITY (FCA)</strong>
                        </div>
                    </div>
                    {{-- <div class="col-12 pt-4 mb-5">
                        <span class="about">**Clients/training delegates can borrow between £250-£4500 for a range of terms
                            up until 36 months!**</span>
                    </div> --}}
                </div>
            </div>
    </section>

    <section class="fcaApproved mb-5">
        <div class="fcaApproved_container container p-0 px-3 font-size-20">
            <div class="text-center">
                <img src="img/approved.svg" alt="approved" class="fcaApproved_image"><br>
                CFG are FCA approved and regulated and therefore you can be sure you and your clients are
                in safe hands. When signing up you will receive a detailed contract inclusive of all terms &
                conditions, and we will require some further information regarding your company in order to
                do some required checks and add you onto our financial license - so you are able to
                introduce your clients to our services.<br>
                <br>
                You will also have access to your own private portal in which you will be able to add/amend
                your information, treatment list & prices - for an example of what this may look like click the
                link below:<br>
                <br>
                <a href="/clinics/9"><strong>Cosmetic Finance Group - clinics</strong></a>
                <p>FRN – 943771</p>
            </div>
        </div>
    </section>

    <section class="costPractitioner mb-5">
        <div class="costPractitioner_container container p-0 px-3 font-size-20">

            <h2 class="text-uppercase text-center font-weight-bold mb-4"><span>SO WHAT DOES IT COST TO BECOME A CFG<br>
                    APPROVED PRACTITIONER?</span></h2>
            {{-- <h3 class="text-center">We now have 3 options to choose from in order
                to utilise our services in your clinic.
            </h3> --}}

            <div class="row landing-options">

                <div class="col-md-4">
                </div>

                <div class="col-md-4 step mt-5">
                    <div class="inner text-center py-2 px-2">
                        {{-- <div class="number">OPTION 1</div>
                        <br> --}}
                        <p style="font-weight: bold;font-size: 22px;">One off £150<br>admin fee</p>
                        <div style="border-bottom: solid 1px #B29961;margin-bottom: 5px"><?= str_repeat('&nbsp', 10) ?>
                        </div>
                        <p>Monthly payments of £50</p><br>
                    </div>
                </div>


            </div>

            <div class="text-center">
                <br>
                <br>
                <span class="about font-weight-bold">• For each loan payment you will receive 90% of the funds of the total
                    loan amount.</span>
                <br>
                <br>
                <span class="about font-weight-bold">• REMEMBER this is 90%</span> you would never have received if the
                client didn't have the option to spread the cost!<br>
                <br>
            </div>
            <div class="text-center">
                <a href="/clinics/request"
                    class="costPractitioner_btn btn btn-primary btn-lg text-uppercase my-5 btn-wide font-weight-bold">CLICK
                    HERE TO SIGN UP AS A
                    REGISTERED CFG PRACTITIONER</a>
            </div>
            <div class="text-center">
                You will then be sent a registration form to complete & contract. Due to FCA
                requirements please expect up to 30 days for your account to be complete.
                However, we can give you access to your portal so you can complete all of your
                treatment/prices until you are LIVE!<br>
                <br>
                Should you have any further questions please do not hesitate to ask. Our
                friendly CFG agents are on hand in the office, or via social media to help.<br>
                <br>
                <span class="about font-weight-bold font-size-27">WE LOOK FORWARD TO WORKING ALONGSIDE YOU!</span>
            </div>
        </div>
    </section>
@endsection
