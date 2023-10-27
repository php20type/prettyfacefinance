@extends("layouts.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class='row'>
            <div class='col-12'>
                <button class='btn btn-primary float-right' style="margin-top: 20px;" data-toggle="modal" data-target="#myModal">Add New User</button>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <table class="table table-hover table-striped data-table">
            <thead>
            <tr>
                <td>Email Address</td>
                <td>Used</td>
            </tr>
            </thead>
            <tbody>
            @foreach(App\FreeUser::all() as $freeuser)
                <tr>
                    <td>{{$freeuser->email}}</td>
                    <td>{{$freeuser->used ? 'Yes' : 'No'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => ['freeusers.add'], 'method' => 'post', 'class' => '']) !!}
                    <div class="input-group">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'User Email']) !!}
                        {!! Form::hidden('used', 0) !!}
                        <span class="input-group-btn">
                        {!! Form::submit('Add User', ['class' => 'btn btn-success']) !!}
                    </span>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection