@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-3">

        <table class="table table-striped table-hover data-table w-100">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Category Name</td>
                    <td>File</td>
                    <td>Cover Image</td>
                    <td>Actions
                        <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus-circle mr-2"></i> Add New Template
                        </button>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($Templates as $template)
                    <tr>
                        <td class="align-middle">
                            {{ $template->name ?? '' }}
                        </td>
                        <td class="align-middle">{{ $template->category->name ?? '' }}</td>
                        <td class="align-middle">
                            <a href="{{ asset('templates/' . $template->file) }}" target="_blank">View File</a>
                        </td>
                        <td class="align-middle">
                            <a href="{{ asset('templates/' . $template->cover_image) }}" target="_blank">View File</a>
                        </td>
                        <td class="align-middle">


                            <form class="pull-right" action="{{ route('templates.destroy', $template->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?');"
                                style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-primary btn-sm" style="margin-right: 10px;">
                                    <span class="icon"><i class="fa fa-trash mr-2"></i></span>Delete
                                </button>
                            </form>

                            <button class="btn btn-primary btn-sm pull-right" style="margin-right: 10px;"
                                data-toggle="modal" data-target="#myModal{{ $template->id }}">
                                <span class="icon"><i class="fa fa-edit mr-2"></i></span>Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach ($Templates as $template)
        <div class="modal fade" id="myModal{{ $template->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Template</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open([
                            'route' => ['templates.update', $template->id],
                            'method' => 'POST',
                            'files' => true,
                            'class' => '',
                        ]) !!}
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            {!! Form::text('name', $template->name, ['class' => 'form-control rounded-0']) !!}
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Category</label>
                            {!! Form::select('categories_id', $categories, $template->categories_id, [
                                'class' => 'form-control rounded-0',
                                'required' => '',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Select File (210x180)</label>
                            {!! Form::file('file', ['class' => 'form-control rounded-0', 'required' => false]) !!}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Cover Image</label>
                            {!! Form::file('cover_image', ['class' => 'form-control rounded-0', 'required' => false]) !!}
                        </div>

                        <div class="input-group mt-2">
                            <span class="input-group-btn">
                                {!! Form::submit('Update', ['class' => 'btn btn-primary rounded-0']) !!}
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
    @endforeach
@endsection

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Template</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['templates.store'], 'method' => 'POST', 'files' => true, 'class' => '']) !!}

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    {!! Form::text('name', null, ['class' => 'form-control rounded-0']) !!}
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Select Category</label>
                    {!! Form::select('categories_id', $categories, '', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Select File (210x180)</label>
                    {!! Form::file('file', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Select Cover Image</label>
                    {!! Form::file('cover_image', ['class' => 'form-control rounded-0', 'required' => '']) !!}
                </div>

                <div class="input-group mt-2">
                    <span class="input-group-btn">
                        {!! Form::submit('Add Template', ['class' => 'btn btn-success']) !!}
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
