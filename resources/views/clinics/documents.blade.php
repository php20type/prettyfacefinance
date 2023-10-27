@guest
    {!! redirect('/') !!}
@endguest

@extends('layouts.frontend')

<style>
    @media screen and (max-width: 767px) {

        table tbody td,
        table thead th {
            white-space: nowrap
        }

        .document-row .form-control {
            width: 180px;
        }
    }
</style>
@section('content')
    @auth
        @if (Auth::user()->clinic_id != $clinic->id && Auth::user()->role != 1)
            {!! redirect('/') !!}
        @else
            <div class="container my-lg-5 my-3">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center text-uppercase pb-3 border-bottom">Your Documents</h1>
                    </div>
                </div>
            </div>

            @if (session()->has('alert-success'))
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="float:none;margin:auto;">
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('alert-success') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Add new document -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route' => ['documents.store'], 'files' => true, 'class' => '']) !!}
                        <input type="hidden" name="name">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="description"
                                        placeholder="Document Description">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <select name="type" id="type" class="form-control">
                                        <option value="proof">Proof of Insurance</option>
                                        <option value="certificates">Certificate for treatment</option>
                                        <option value="qualification">Proof of qualification</option>
                                        <option value="other">Other Document</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="form-group">
                                    <input type="text" required id="datepicker" autocomplete="off"
                                        class="form-control datepicker" name="expiry_date" placeholder="Date of expiry">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-primary pull-right"><i class="fa fa-save mr-2"></i> Save</button>

                                    <label class="btn btn-primary btn-file pull-right" style="margin-right: 10px;">
                                        <span><i class="fa fa-upload mr-2"></i> Upload Document File</span> <input
                                            type="file" name="path" id="path" style="display: none;">
                                    </label>
                                </div>
                            </div>
                        </div>
                        {!! Form::hidden('clinic_id', $clinic->id) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="container mb-lg-5 mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Date of expiry</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clinic->documents as $document)
                                        {!! Form::model($document, [
                                            'route' => ['documents.update', $document],
                                            'method' => 'PUT',
                                            'class' => 'multi-part-form needs-validation',
                                            'novalidate' => true,
                                        ]) !!}
                                        <tr class="document-row">
                                            {!! Form::hidden('id', null) !!}

                                            <td class="align-middle">
                                                {!! Form::select(
                                                    'type',
                                                    [
                                                        'proof' => 'Proof of Insurance',
                                                        'certificates' => 'Certificate for treatment',
                                                        'qualification' => 'Proof of qualification',
                                                        'other' => 'Other Document',
                                                    ],
                                                    null,
                                                    ['class' => 'form-control', 'disabled' => true],
                                                ) !!}
                                            </td>

                                            <td class="align-middle">
                                                {!! Form::text('description', null, ['class' => 'form-control rounded-0', 'disabled' => true]) !!}
                                            </td>

                                            <td class="align-middle">
                                                {!! Form::text(
                                                    'expiry_date',
                                                    $document->expiry_date != null ? date('d-m-Y', strtotime($document->expiry_date)) : '',
                                                    ['class' => 'form-control rounded-0 datepicker', 'autocomplete' => 'off', 'disabled' => true],
                                                ) !!}
                                            </td>

                                            <td>
                                                
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-edit">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>

                                                    <button type="submit" class="btn btn-primary btn-sm btn-save"
                                                        style="display: none"><i class="fa fa-save mr-2"></i>
                                                        Save</button>
                                                        @if ($document->path)
                                                    <a href="{{ $document->path }}" target="_blank"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye mr-2"></i> View
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        {!! Form::close() !!}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
@endsection

@section('page-css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection

@section('page-js')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $(".datepicker").datepicker({
                dateFormat: "dd-mm-yy"
            });
        });

        // Toggle editable
        $('.btn-edit').click(function() {
            var parentPanel = $(this).parents('.document-row');
            var inputs = parentPanel.find('input:not([type=file]), textarea, select');

            $.each(inputs, function() {
                $(this).attr('disabled', false);
            });

            $(this).closest('.btn-edit').hide();
            $(this).parents('.document-row').find('.btn-save').show();
        });
    </script>
@endsection
