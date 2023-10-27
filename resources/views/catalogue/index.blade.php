@extends('layouts.frontend_updated')
@section('content')
    @if (session()->has('status'))
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('status') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Page header section start -->

    <section class="page-header-section">
        <img class="header_image" src="{{ asset('new_css/img/home/about_banner.jpg') }}" alt="header images" />
        <div class="header_title">
           <h2>Medical Devices</h2>
        </div>
    </section>

    <!-- Page header section start -->

   <!-- Catalouge section start -->

<section class="Catalouge-section pt-100 pb-100">
     <div class="container">
           <div class="row">
               <div class="col-lg-4">
                    <div class="catalouge-sec-box">
                        <a href="medical-device/skin-rejuvenation"><img src="img/catalouge/skin.jpeg"></a>   
                    </div>
               </div>
               <div class="col-lg-4">
                 <div class="catalouge-sec-box">
                   <a href="medical-device/laser"><img src="img/catalouge/laser.jpeg"></a>
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="catalouge-sec-box">
                  <a href="medical-device/body-contouring"> <img src="img/catalouge/contouring.png"></a>
                 </div>
              </div>
              <div class="col-lg-4">
                <div class="catalouge-sec-box">
                  <a href="medical-device/wellness"><img src="img/catalouge/wellness.png"></a>
                 </div>
              </div>
              <div class="col-lg-4">
                <div class="catalouge-sec-box">
                  <a href="medical-device/ai-technology"><img src="img/catalouge/ai-technology.png"></a>
                 </div>
              </div>  
              <div class="col-lg-4">
                <div class="catalouge-sec-box">
                  <a href="medical-device/spa"> <img src="img/catalouge/spa.png"></a>
                 </div>
              </div>
               
           </div>
     </div>
</section>

<!-- Catalouge section end -->
@endsection
