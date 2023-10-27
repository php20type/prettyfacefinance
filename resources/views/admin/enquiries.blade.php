@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row mb-3">
            <div class="col-4 offset-8">
                <select name="noti_filter" id="noti_filter" class="form-control">
                    <option value="0"
                        {{ url()->current() == 'https://cosmeticfinancegroup.co.uk/admin/enquiries' ? 'selected=selected' : 'false' }}>
                        Both</option>
                    <option value="1"
                        {{ url()->current() == 'https://cosmeticfinancegroup.co.uk/admin/enquiries/unread' ? 'selected=selected' : 'false' }}>
                        Unread</option>
                    <option value="2"
                        {{ url()->current() == 'https://cosmeticfinancegroup.co.uk/admin/enquiries/read' ? 'selected=selected' : 'false' }}>
                        Read</option>
                </select>
            </div>
        </div>

        <table class="table table-striped table-hover w-100">
            <thead>
                <tr>
                    <td></td>
                    <td>Time</td>
                    <td>Name</td>
                    <td>Type</td>
                    <td>Email Address</td>
                    <td>Contact Number</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($enquiries as $enquiry)
                    <tr data-status="{{ $enquiry->status ? 'r' : 'u' }}">
                        <td>
                            <i class="fa fa-{{ $enquiry->status ? 'envelope-open-o' : 'envelope-o' }}"></i>
                        </td>
                        <td>{{ date('j M, Y', strtotime($enquiry->created_at)) }}</td>
                        <td>{{ $enquiry->name }}</td>
                        <td>{{ $enquiry->type }}</td>
                        <td>{{ $enquiry->email_address }}</td>
                        <td>{{ $enquiry->contact_number }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-brand-primary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#enquiry_{{ $enquiry->id }}">View</a>
                                    <a class="dropdown-item" href="mailto:{{ $enquiry->email_address }}">Reply</a>
                                    <a class="dropdown-item" href="/enquiries/resolve/{{ $enquiry->id }}">Mark
                                        Resolved</a>
                                    <a class="dropdown-item" href="/enquiries/unresolve/{{ $enquiry->id }}">Mark
                                        Unesolved</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach ($enquiries as $enquiry)
        <div class="modal fade" id="enquiry_{{ $enquiry->id }}" tabindex="-1" role="dialog" aria-labelledby=""
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enquiry #{{ $enquiry->id }} - Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <tr>
                                <td>Type</td>
                                <td>{{ $enquiry->type }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $enquiry->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $enquiry->email_address }}</td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td>{{ $enquiry->contact_number }}</td>
                            </tr>
                            <tr>
                                <td>Clinic Name</td>
                                <td>
                                    @if ($enquiry->clinic_name)
                                        {{ $enquiry->clinic_name }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Clinic Address</td>
                                <td>
                                    @if ($enquiry->clinic_address)
                                        {{ $enquiry->clinic_address }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>{{ $enquiry->message }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="mailto:{{ $enquiry->email_address }}" class="btn btn-primary">Reply</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12">
            {{ $enquiries->links() }}
        </div>
    </div>

    <script>
        $(document).ready(function() {
            /*$("[data-status='r']").hide();*/

            $("#noti_filter").change(function() {
                if ($(this).val() == 1) {
                    window.location.href = "/admin/enquiries/unread";
                } else if ($(this).val() == 2) {
                    window.location.href = "/admin/enquiries/read";
                } else {
                    window.location.href = "/admin/enquiries"
                }
            });
        })
    </script>
@endsection
