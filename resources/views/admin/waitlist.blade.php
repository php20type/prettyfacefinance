@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-3">

        <table class="table table-striped table-hover w-100">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Business name</td>
                    <td>Email Address</td>
                    <td>Contact Number</td>
                    <td>Instagram handle</td>
                    {{-- <td>Document</td> --}}
                    <td>Created At</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($waitlist as $waitlistValue)
                    <tr>

                        <td>{{ $waitlistValue->name }}</td>
                        <td>{{ $waitlistValue->business_name }}</td>
                        <td>{{ $waitlistValue->email }}</td>
                        <td>{{ $waitlistValue->phone }}</td>
                        <td>{{ $waitlistValue->instagram_handle }}</td>
                        {{-- <td>
                            @if ($waitlistValue->path != '')
                                <a href="{{ $waitlistValue->path }}" download>Download</a>
                            @else
                            @endif
                        </td> --}}
                        <td>{{ date('m-d-Y', strtotime($waitlistValue->created_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <div class="row">
        <div class="col-12">
            {{ $waitlist->links() }}
        </div>
    </div>
@endsection
