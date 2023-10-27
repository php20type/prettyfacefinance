@extends("layouts.admin")
@section("content")
    <div class="row">
        <div class="col-12 my-3">
            <table class="table table-hover table-striped data-table ">
                <thead>
                <tr>
                    <th>Id</th>
                    <td>Clinic Name</td>
                    <td>Request Date</td>
                    <td>URL</td>
                    <td style="min-width: 250px;text-align:right;">Actions</td>
                </tr>
                <tbody>
                @foreach($clinics as $clinic)
                    <tr>
                        <td>{{$clinic->id}}</td>
                        <td>{{$clinic->name}}</td>
                        <td>{{time_elapsed_string($clinic->created_at)}}</td>
                        <td>
                            <div class="row">
                                <div class="col-8">
                                    @if($clinic->url>'')
                                        <a href="{{$clinic->url}}" target="_blank">www</a>
                                    @endif
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#url_{{$clinic->id}}"><i class="fa fa-edit"></i></button>
                                </div>
                            </div>
                        </td>
                        <td>
                        @if(!$clinic->approved)
                            <!-- Approve clinic -->
                                <form action="" class="form approval-form justify-content-end d-flex">
                                    <a href='/clinics/{{$clinic->id}}/additional' class="btn btn-primary btn-sm mr-2">
                                        <span class="icon"><i class="fa fa-check"></i></span> View Request
                                    </a>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#clinic_{{$clinic->id}}">
                                        Approve
                                    </button>
                                </form>
                        @else
                        <!-- Add master clinic edit link -->
                            <a href="/clinics/{{$clinic->id}}/edit" class="btn btn-primary btn-sm float-right">
                                <i class="fa fa-edit"></i> Clinic
                            </a>
                            @if(!$clinic->visible)
                                {!! Form::model($clinic, ['route' => ['clinics.visible', $clinic], 'method' => 'POST', 'class' => 'approval-form pull-right']) !!}
                                {!! Form::hidden('visible', 1) !!}
                                {!! Form::hidden('clinic_id', $clinic->id) !!}
                                <button class="btn btn-primary btn-sm mr-2" >
                                    Show Clinic
                                </button>
                                {!! Form::close() !!}
                            @else
                                {!! Form::model($clinic, ['route' => ['clinics.visible', $clinic], 'method' => 'POST', 'class' => 'approval-form pull-right']) !!}
                                {!! Form::hidden('visible', 0) !!}
                                {!! Form::hidden('clinic_id', $clinic->id) !!}
                                <button class="btn btn-primary btn-sm mr-2">
                                    Hide Clinic
                                </button>
                                {!! Form::close() !!}
                            @endif
                        @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach($clinics as $clinic)
        <div class="modal fade" id="clinic_{{$clinic->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Approval form for {{$clinic->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                {!! Form::model($clinic, ['route' => ['clinics.approve', $clinic], 'method' => 'POST', 'class' => 'approval-form w-100 needs-validation', 'novalidate' => '']) !!}
                                {!! Form::hidden('approved', 1) !!}
                                {!! Form::hidden('clinic_id', $clinic->id) !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="paylater_id" placeholder="PayL8r Name" aria-label="Payl8r Name" value="{{$clinic->paylater_id}}" aria-describedby="basic-addon2" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="">Approve</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($clinics as $clinic)
        <div class="modal fade" id="url_{{$clinic->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">URL for {{$clinic->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                {!! Form::model($clinic, ['route' => ['clinics.url', $clinic], 'method' => 'POST', 'class' => 'approval-form w-100', 'novalidate' => '']) !!}
                                {!! Form::hidden('clinic_id', $clinic->id) !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="url" placeholder="URL" aria-label="URL" value="{{$clinic->url}}" aria-describedby="basic-addon2" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="">Update</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection