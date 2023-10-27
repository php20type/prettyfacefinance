@extends('layouts.frontend_updated')
@section('content')
    <div id="accordion" class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="pb-3 mb-5 text-center text-uppercase border-bottom">FAQs</h1>
            </div>
        </div>
        <div class="row px-3 px-md-0">
            @foreach ($faqs as $faq)
                <div class="card col-12 mb-3 px-0">
                    <div class="card-header p-lg-3 p-2" data-bs-toggle="collapse" data-bs-target="#faq_{{ $faq->id }}">
                        {{ $faq->question }} <i class="fa-regular fa-chevron-down"></i>
                    </div>
                    <div id="faq_{{ $faq->id }}" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
