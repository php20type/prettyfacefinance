@extends("layouts.frontend")
@section("content")
    <div class="container py-lg-5 py-2">
        <div class="row border-bottom py-3">
            <div class="col-12">
                <h1>Quiz</h1>
            </div>
        </div>
        <div class="Quiz-information-sec">

            @if (session()->has('alert-danger'))
                    <div class="row">
                        <div class="col-lg-12" style="float:none;margin:auto;">
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get('alert-danger') }}
                            </div>
                        </div>
                    </div>
            @endif

            {!! Form::open(['route' => ['iartraining.store'], 'method' => 'POST', 'class' => '']) !!}
                <input type="hidden" name="clinic_id" value="{{  Request()->id }}"/>
                @foreach ($QuestionModel as $value)
                    <div class="form-group mb-4">
                        <label class="form-label mb-3"><strong>{{$value['question'] }}</strong></label>

                        @if($value['id']==5)
                            <div class="form-check mb-lg-3 mb-2 tick">
                                  <input class="form-check-input" name="choice[]" type="checkbox" value="1" id="flexCheckDefault">
                                 <label class="form-check-label ms-2" for="flexCheckDefault">
                                    Please contact this company their details are on the leaflet.
                                </label>
                            </div>
                            <div class="form-check mb-lg-3 mb-2 cross">
                                  <input class="form-check-input" name="choice[]" type="checkbox" value="2" id="flexCheck2">
                                 <label class="form-check-label ms-2" for="flexCheck2">
                                   Yes we can offer finance and it's very cheap to use.
                                </label>
                            </div>
                            <div class="form-check mb-lg-3 mb-2 cross">
                                  <input class="form-check-input" name="choice[]" type="checkbox" value="3" id="flexCheck3">
                                  <label class="form-check-label ms-2" for="flexCheck3">
                                  You can get finance over 36 months check it online.
                                 </label>
                            </div>
                            <div class="form-check mb-lg-3 mb-2 tick">
                                  <input class="form-check-input" name="choice[]" type="checkbox" value="4" id="flexCheck4">
                                  <label class="form-check-label ms-2" for="flexCheck4">
                                  Everything you need to know is on CFG website.
                                 </label>
                            </div>
                            <div class="form-check mb-lg-3 mb-2 tick">
                                  <input class="form-check-input" name="choice[]" type="checkbox" value="5" id="flexCheck5">
                                  <label class="form-check-label ms-2" for="flexCheck5">
                                  We can't advise you on finance but you can use our credit broker CFG if you wish.
                                 </label>
                            </div>
                            <div class="form-check mb-lg-3 mb-2 cross">
                                  <input class="form-check-input" name="choice[]" type="checkbox" value="6" id="flexCheck6">
                                  <label class="form-check-label ms-2" for="flexCheck6">
                                  We do the best deals in the beauty industry and it's easy to apply.
                                 </label>
                            </div>
                        @else
                            @foreach ($value['option'] as $optionValue)
                                <div class="form-check mb-lg-3 mb-2">
                                    <input class="form-check-input" required type="radio" name="{{ $optionValue['qid'] }}" value="{{ $optionValue['id'] }}" >
                                    <label class="form-check-label" for="exampleRadios1">
                                        {{ $optionValue['option'] }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                 @endforeach

                {{-- <div class="form-group mb-4">
                    <label class="form-label mb-3"><strong>Which of these sentences are giving advice</strong></label>
                    <div class="form-check mb-lg-3 mb-2 tick">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                         <label class="form-check-label ms-2" for="flexCheckDefault">
                            Please contact this company their details are on the leaflet.
                        </label>
                    </div>
                    <div class="form-check mb-lg-3 mb-2 cross">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                         <label class="form-check-label ms-2" for="flexCheck2">
                           Yes we can offer finance and it's very cheap to use.
                        </label>
                    </div>
                    <div class="form-check mb-lg-3 mb-2 cross">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheck3">
                          <label class="form-check-label ms-2" for="flexCheck3">
                          You can get finance over 36 months check it online.
                         </label>
                    </div>
                    <div class="form-check mb-lg-3 mb-2 tick">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheck4">
                          <label class="form-check-label ms-2" for="flexCheck4">
                          Everything you need to know is on CFG website.
                         </label>
                    </div>
                    <div class="form-check mb-lg-3 mb-2 tick">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheck5">
                          <label class="form-check-label ms-2" for="flexCheck5">
                          We can't advise you on finance but you can use our credit broker CFG if you wish.
                         </label>
                    </div>
                    <div class="form-check mb-lg-3 mb-2 cross">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheck6">
                          <label class="form-check-label ms-2" for="flexCheck6">
                          We do the best deals in the beauty industry and it's easy to apply.
                         </label>
                    </div>
                </div> --}}
               
                <div class="form-group my-5">
                    <button type="submit" class="btn btn-primary px-5 py-2" name="send">Submit</button>
                 </div>
                 {!! Form::close() !!}
        </div>
    </div>
@endsection