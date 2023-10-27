{!! Form::model($clinic, ['route' => ['clinics.approve', $clinic], 'method' => 'POST', 'class' => 'approval-form pull-right']) !!}
{!! Form::hidden('approved', 1) !!}
{!! Form::hidden('clinic_id', $clinic->id) !!}
<a href='#' class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#myModal{{$clinic->id}}">
    <span class="icon"><i class="fa fa-check"></i></span> View Request
</a>
<button class="btn btn-primary btn-sm">
    Approve
</button>
{!! Form::close() !!}