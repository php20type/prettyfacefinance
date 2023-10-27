<section class="banner-section">
    <div class="container-fluid">
        <div class="banner-caption">
            <div class="banner-title">
                <h1>
                    Aesthetically<br />
                    Smooth<br />
                    Solutions
                </h1>
            </div>
            <div class="postcode-sec">
                <h4>Get started now.</h4>
                <form action="{{ route('clinics.search') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group input-group-lg mb-3">
                        <input type="text" class="form-control rounded-0" placeholder="Postcode" name="postcode" />
                        <div class="input-group-append">
                            <div class="input-group input-group-lg">
                                <select name="within" id="within" class="form-select rounded-0">
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
                <p>Find approved clinics near you.</p>
            </div>
        </div>
    </div>
</section>
