@extends("layouts.frontend")
@section("content")
    <div class="container">
        <div class="row border-bottom py-3">
            <div class="col-12">
                <h1>Clinic Information</h1>
            </div>
        </div>

        <div class="row clinic-information">
            <div class="col-12">
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Name</div>
                    <div class="col-12 col-md-6">{{$clinic->users->name}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Email Address</div>
                    <div class="col-12 col-md-6">{{$clinic->users->email}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Phone Number</div>
                    <div class="col-12 col-md-6">{{$clinic->users->telephone}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Clinic Name</div>
                    <div class="col-12 col-md-6">{{$clinic->name}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Website</div>
                    <div class="col-12 col-md-6">{{$clinic->website}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Address 1</div>
                    <div class="col-12 col-md-6">{{$clinic->address1}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Address 2</div>
                    <div class="col-12 col-md-6">{{$clinic->address2}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Town</div>
                    <div class="col-12 col-md-6">{{$clinic->town}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Postcode</div>
                    <div class="col-12 col-md-6">{{$clinic->postcode}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Companies House Number</div>
                    <div class="col-12 col-md-6">{{$clinic->company_number}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Profession</div>
                    <div class="col-12 col-md-6">{{$clinic->profession}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Pin number(NMC/GMC/GDC)</div>
                    <div class="col-12 col-md-6">{{$clinic->pin}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Prescriber Name</div>
                    <div class="col-12 col-md-6">{{$clinic->prescriber_name}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Prescriber Email</div>
                    <div class="col-12 col-md-6">{{$clinic->prescriber_email}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Prescriber Pin</div>
                    <div class="col-12 col-md-6">{{$clinic->prescriber_pin}}</div>
                </div>
                <div class="row py-3 border-bottom">
                    <div class="col-12 col-md-6 font-weight-bold">Payment Method</div>
                    <div class="col-12 col-md-6">
                        @if($clinic->paid)
                            Online (Stripe)
                        @else
                            Offline
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection