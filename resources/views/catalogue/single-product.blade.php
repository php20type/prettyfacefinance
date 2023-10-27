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
    
    
    @include('catalogue.'.$device)
    
@endsection
