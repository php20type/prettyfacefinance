@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-3">

        <table class="table table-striped table-hover data-table w-100">
            <thead>
            <tr>
                <td>Category Name</td>
                <td>Request Date</td>
                <td>Status</td>
                <td>Actions
                    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus-circle mr-2"></i> Add New Category
                    </button>
                </td>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="align-middle">{{$category->name}}</td>
                    <td class="align-middle">{{date("D j M, Y @ h:ia", strtotime($category->created_at))}}</td>
                    <td class="align-middle">{{$category->approved ? 'Approved' : 'Not Approved'}}</td>
                    <td class="align-middle">
                    @if(!$category->approved)
                        <!-- Approve category -->
                            {!! Form::model($category, ['route' => ['categories.update', $category], 'method' => 'PUT', 'class' => 'approval-form pull-right']) !!}
                            {!! Form::hidden('category_approve', 1) !!}
                            <button class="btn btn-primary btn-sm">
                                <span class="icon"><i class="fa fa-check mr-2"></i></span> Approve
                            </button>
                            {!! Form::close() !!}

                        @else
                        <!-- Revoke approval -->
                            {!! Form::model($category, ['route' => ['categories.update', $category], 'method' => 'PUT', 'class' => 'approval-form pull-right']) !!}
                            {!! Form::hidden('category_approve', 0) !!}
                            {{--<button class="btn btn-danger btn-sm">
                                <span class="icon"><i class="fa fa-times mr-2"></i></span>Revoke
                            </button>--}}
                            {!! Form::close() !!}
                        @endif

                        <button class="btn btn-primary btn-sm pull-right" style="margin-right: 10px;" data-toggle="modal" data-target="#myModal{{$category->id}}">
                            <span class="icon"><i class="fa fa-times mr-2"></i></span>Edit
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @foreach($categories as $category)
        <div class="modal fade" id="myModal{{$category->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'POST', 'class' => '']) !!}
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="input-group">
                            {!! Form::text('name', $category->name, ['class' => 'form-control rounded-0', 'placeholder' => 'Category Name']) !!}
                            {!! Form::hidden('approved', 1) !!}
                            <span class="input-group-btn">
                        {!! Form::submit('Update & Approve', ['class' => 'btn btn-primary rounded-0']) !!}
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
                    <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => ['categories.store'], 'method' => 'POST', 'class' => '']) !!}
                    <div class="input-group">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category Name']) !!}
                        {!! Form::hidden('approved', 1) !!}
                        <span class="input-group-btn">
                        {!! Form::submit('Add Category', ['class' => 'btn btn-success']) !!}
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
