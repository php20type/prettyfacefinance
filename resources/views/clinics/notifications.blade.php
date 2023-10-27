@extends('layouts.frontend')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase pb-3 border-bottom">Your Notifications</h1>
            </div>
        </div>
    </div>

    @if ($notifications->count() < 1)
        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-envelope-o mr-2"></i> Your inbox is empty.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        @foreach ($notifications->sortByDesc('created_at') as $notification)
            <div class="row">
                <div class="col-12 py-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 col-md-2">
                                    <img src="{{ asset('img/logo.png') }}" alt="" style="max-width: 100%;">
                                    <small class="text-muted">From: Cosmetic Finance Group</small><br>
                                    <small class="text-muted">{{ time_elapsed_string($notification->created_at) }}</small>
                                </div>
                                <div class="col-8 col-md-10">
                                    <i class="fa fa-commenting-o mr-3"></i> {!! $notification->text !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
