@extends('layouts.admin')
@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#faq_modal_new">
                    <i class="fa fa-plus mr-2"></i> Add FAQ
                </button>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td width="30%">Question</td>
                            <td width="60%">Answer</td>
                            <td width="10%">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr>
                                <td width="30%">{{ $faq->question }}</td>
                                <td width="60%">{{ $faq->answer }}</td>
                                <td width="10%" class="align-middle">

                                    <form class="pull-right" action="{{ route('faq.destroy', $faq->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-primary btn-sm float-right">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                    <button class="btn btn-primary btn-sm mr-2 float-right" data-toggle="modal"
                                        data-target="#faq_modal_{{ $faq->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    @foreach ($faqs as $faq)
        <div class="modal fade" id="faq_modal_{{ $faq->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit FAQ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open([
                        'route' => ['faq.update', $faq->id],
                        'method' => 'POST',
                        'files' => true,
                        'class' => '',
                    ]) !!}
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="question">Question:</label>
                            <textarea name="question" id="question" required cols="30" rows="10" class="form-control">{{ $faq->question }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer:</label>
                            <textarea name="answer" id="answer" required cols="30" rows="10" class="form-control">{{ $faq->answer }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endforeach

    <!-- Create modal -->
    <div class="modal fade" id="faq_modal_new" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New FAQ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => ['faq.store']]) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="question">Question:</label>
                        <textarea name="question" id="question" required cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="answer">Answer:</label>
                        <textarea name="answer" id="answer" required cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {!! Form::submit('Create FAQ', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
