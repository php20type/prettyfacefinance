<div class="jumbotron blackout jumbotron-dark home p-0 py-md-5 px-md-3 rounded-0" data-parallax="scroll"
    data-image-src="{{ asset('img/home-jumbotron.png') }}" data-ios-fix="true" data-android-fix="true">
    <div class="container p-0 px-md-3">
        <div class="row">
            <div class="col-12 col-md-6 p-0 px-3">
                <div class="row">
                    <div class="col" style="
    padding-top: 1rem;
">
                        <h1 class="text-small py-1 py-md-0 px-3 px-md-0 my-1 my-md-0" style="font-size: 2rem;">BOOK THE
                            TREATMENTS YOU HAVE ALWAYS WANTED AND MANAGE YOUR FINANCES</h1>
                        <h2 class="text-small py-1 px-3 px-md-0 my-1 my-md-0" style="font-size: 2rem;color: #b0985f;">
                            REPRESENTATIVE 29.9% APR</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-block" style="
    padding-bottom: 3rem;
">
                        <div class="px-3 px-md-0 ">
                            <p>Here at Cosmetic Finance Group we can assist you with your non-surgical cosmetic desires
                                by allowing you to affordably spread the cost, over an achievable timescale convenient
                                to yourself.</p>
                            <a href="/finance" class="btn btn-primary btn-sm mt-2 btn-wide"
                                style="max-width: 100%; padding: 0.5rem; min-width: 95%;">More Information on our
                                Finance for Clients</a>
                            <a href="/practioner-information" class="btn btn-primary btn-sm mt-2 btn-wide"
                                style="max-width: 100%; padding: 0.5rem; min-width: 95%;">More Information on our
                                Service for Practitioners</a>
                        </div>
                    </div>
                </div>
                <div class="row my-0 mb-2 my-md-5 align-items-center px-3 px-md-0">
                    <div class="col-auto">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="col p-0 px-md-3">
                        <div class="map-text">
                            <div>GET STARTED NOW!</div>
                            <div>FIND APPROVED CLINICS NEAR YOU</div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('clinics.search') }}" method="POST" class="margin-sm-fix">
                    {{ csrf_field() }}
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="Postcode" name="postcode">
                        <div class="input-group-append">
                            <div class="input-group input-group-lg">
                                <select name="within" id="within" class="form-control border-0 rounded-0">
                                    <option value="5">5 miles</option>
                                    <option value="10">10 miles</option>
                                    <option value="15">15 miles</option>
                                    <option value="20">20 miles</option>
                                    <option value="25">25 miles</option>
                                    <option value="30">30 miles</option>
                                    <option value="35">35 miles</option>
                                    <option value="40">40 miles</option>
                                    <option value="45">45 miles</option>
                                    <option value="50">50 miles</option>
                                </select>
                            </div>
                            <button class="btn btn-primary rounded-0">
                                Find Clinics
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid d-block d-md-none mobile-calculator">
    <div class="row">
        <div class="col-xs-12 px-3 pt-3">
            @include('calculator.mini')
        </div>
    </div>
</div>
