@extends("layouts.frontend")
@section("content")
    <div class="container">
        <div class="row border-bottom py-3 mt-3">
            <div class="col-12">
                <h1>Thank you for your time today</h1>
            </div>
        </div>
        {!! Form::open(['route' => ['iartraining.sendNotification'], 'method' => 'POST', 'class' => '']) !!}
             <input type="hidden" name="clinic_id" value="{{  Request()->id }}"/>
            <div class="video-information-sec my-4">
                <p class="mb-3">Thank you for your time today, you have now successfully completed your IAR training. This video along with the assisting handbooks; IAR compliance manual, Financial promotion wording and IAR script is available to watch and download at all times via your CFG clinic portal. </p>
                {{-- <h6>(PUT  THE DOWNLOADABLE DOCUMENTS HEREE)</h6> --}}
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" required value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            I confirm that I have watched and understood the IAR training video and I have read the handbooks required. 
                        </label>
                    </div>
                <div class="logo_sec my-4">
                        <img src="{{ asset('img/logo.png') }}" alt="" class="w-25 d-block mb-4">
                        <a href="#" class="text-underline">www.cosmeticfinancegroup.co.uk</a>
                </div>

                <button type="submit" class="btn btn-primary px-5 py-2" name="send">Submit</button>
            </div>
        {!! Form::close() !!}
    </div>
@endsection