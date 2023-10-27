@guest
    {!! redirect('/') !!}
@endguest

@extends('layouts.frontend')
@section('content')
    @if ($clinic->approved)
        <!-- Errors and alerts -->
        @include('parts.alerts')

        @auth
            @if (Auth::user()->clinic_id != $clinic->id && Auth::user()->role != 1)
                {!! redirect('/') !!}
            @else
                <div class="container">
                    <div class="row">
                        <!-- Sidebar -->
                        <div class="col-12 col-lg-4 mb-5">
                            {!! Form::model($clinic, [
                                'route' => ['clinics.update', $clinic],
                                'method' => 'PUT',
                                'files' => true,
                                'class' => 'multi-part-form',
                            ]) !!}
                            @include('clinics.edit.sidebar')
                            {!! Form::close() !!}
                        </div>

                        <div class="col-12 col-lg-8">
                            {!! Form::model($clinic, [
                                'route' => ['clinics.update', $clinic],
                                'method' => 'PUT',
                                'class' => 'multi-part-form needs-validation',
                                'novalidate' => true,
                            ]) !!}
                            <!-- Save changes -->
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="text-center text-lg-left mt-2 mt-lg-0">Clinic Information</h2>
                                </div>
                                <div class="col-12 col-lg-6 mb-3 d-flex justify-content-center justify-content-lg-end">
                                    {!! Form::submit('Save Changes', ['class' => 'btn btn-primary multi-submit mr-2']) !!}
                                    <a class="btn btn-primary" href="/clinics/{{ $clinic->id }}"
                                        onclick="return confirm('Are you sure? Any unsaved changes will be lost.')">View
                                        Clinic</a>
                                </div>
                            </div>
                            <!-- Description -->
                            @include('clinics.edit.description')

                            <!-- Address / Contact -->
                            @include('clinics.edit.addressContact')
                            {!! Form::close() !!}

                            <!-- Qualifications -->
                            @include('clinics.edit.qualifications')

                            <!-- Add new service -->
                            @include('clinics.edit.newService')



                            <!-- Services & procedures list -->
                            @include('clinics.edit.serviceList')


                            <div class="mt-4 mb-5" id="handbook">
                                <div class="card p-0">
                                    <div class="card-header">
                                        <h5>Handbooks</h5>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-lg-4 col-md-6 col-12 pdf-view my-3">
                                            <div class="card">
                                                <div class="card-header px-3">
                                                    <h5 class="fs-6">Financial Promotion Wording</h5>
                                                </div>
                                                <div class="card-body p-3">
                                                    <img class="img-fluid w-100" src="{{ asset('new_css/img/01.jpg') }}"
                                                        alt="pdf">
                                                    <a download
                                                        href="{{ asset('handbook/cfg Financial Promotion Wording.pdf') }}"
                                                        class="btn btn-primary w-100 mt-4">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12 pdf-view my-3">
                                            <div class="card">
                                                <div class="card-header px-3">
                                                    <h5 class="fs-6">IAR Compliance Manual</h5>
                                                </div>
                                                <div class="card-body p-3">
                                                    <img class="img-fluid w-100" src="{{ asset('new_css/img/02.jpg') }}"
                                                        alt="pdf">
                                                    <a download href="{{ asset('handbook/CFG - compliance document.pdf') }}"
                                                        class="btn btn-primary w-100 mt-4">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12 pdf-view my-3">
                                            <div class="card">
                                                <div class="card-header px-3">
                                                    <h5 class="fs-6">IAR Script</h5>
                                                </div>
                                                <div class="card-body p-3">
                                                    <img class="img-fluid w-100" src="{{ asset('new_css/img/03.jpg') }}"
                                                        alt="pdf">
                                                    <a download href="{{ asset('handbook/cfg IAR Script.pdf') }}"
                                                        class="btn btn-primary w-100 mt-4">Download</a>
                                                </div>
                                            </div>
                                        </div>

                                        {!! Form::model($clinic, [
                                            'route' => ['clinics.reviewedinformation', $clinic->id],
                                            'method' => 'POST',
                                            'class' => 'multi-part-form',
                                        ]) !!}
                                        <div class="col-lg-12 col-md-6 col-12 pdf-view my-3">
                                            @if ($clinic->is_reviewed_information == 1)
                                                <input type="checkbox" required checked disabled name="is_reviewed_information"
                                                    value="1"> I
                                                confirm that I have reviewed and understood all information within the three
                                                training manuals
                                            @else
                                                <input type="checkbox" required name="is_reviewed_information" value="1"> I
                                                confirm that I have reviewed and understood all information within the three
                                                training manuals
                                                <br />
                                                <button class="btn btn-primary w-25 mt-4" type="submit">
                                                    Submit
                                                </button>
                                            @endif


                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>


                            @foreach ($Templates as $Template)
                                <div class="mt-4 mb-5" id="handbook">
                                    <div class="card p-0">

                                        <div class="card-header">
                                            <h5>{{ $Template['name'] ?? '' }}</h5>
                                        </div>

                                        <div class="row m-0">
                                            @foreach ($Template['template'] as $value)
                                                <div class="col-lg-4 col-md-6 col-12 pdf-view my-3">
                                                    <div class="card">
                                                        <div class="card-header px-3">
                                                            <h5 class="fs-6">{{ $value['name'] ?? '' }}</h5>
                                                        </div>
                                                        <div class="card-body p-3">
                                                            <img class="img-fluid w-100"
                                                                src="{{ asset('templates/' . $value['cover_image']) }}"
                                                                alt="pdf">
                                                            <a download href="{{ asset('templates/' . $value['file']) }}"
                                                                class="btn btn-primary w-100 mt-4">Download</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <script src="{{ asset('js/clinics.js') }}"></script>

                <script>
                    $.get('https://api.postcodes.io/postcodes/' + '{{ $clinic->postcode }}', function(data) {
                        $(".lat").val(data.result.latitude);
                        $(".lng").val(data.result.longitude);
                    });
                </script>
            @endif
        @endauth
    @else
        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-uppercase my-5 pb-3 border-bottom">Thanks for registering.</h1>
                    <h2>Please allow up to <span class="underlined">two weeks</span> for your account to be activated.</h2>
                </div>
            </div>
        </div>
    @endif
@endsection
