@extends('layouts.frontend_updated')
@section('content')
    <!-- Page header section start -->

    <section class="page-header-section">
        <img class="header_image" src="{{ asset('new_css/img/home/about_banner.jpg') }}" alt="header images" />
        <div class="header_title">
            <h2>Aesthetically Smooth Solutions</h2>
        </div>
    </section>

    <!-- Page header section start -->

    <!-- About Us section start -->

    <section class="About_us-section pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_left-image-sec">
                        <img src="{{ asset('new_css/img/home/about-left_image.png') }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_right-content-sec ms-lg-5">
                        <h2>About Cosmetic Finance Group</h2>
                        <p>
                            Cosmetic Finance Group was created based on the constant growing
                            demand for cosmetic procedures, but the lack of finance options
                            or realistic payment plans currently available within the
                            industry.
                        </p>
                        <p>
                            Here at Cosmetic Finance Group we can assist you with your
                            non-surgical cosmetic desires. BUT unlike other companies we
                            allow you to affordably spread the cost, over an achievable
                            timescale convenient to yourself.
                        </p>
                        <p>
                            We can guarantee that you will ONLY be directed to recommended
                            clinical practitioners that have met all our required criteria.
                            Therefore, you can rest assured that you are in the complete
                            safe hands of an accredited medical professional.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us section end -->
@endsection
