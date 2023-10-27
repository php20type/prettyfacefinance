@extends("layouts.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#messageWindow">Send Message</button>

                {!! Form::open(['route' => 'message.allread']) !!}
                <button class="btn btn-secondary float-right mr-2">
                    <i class="fa fa-eye mr-2"></i> Mark all as Read
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @if(count($notifications) <= 0)
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-envelope-o mr-2"></i> Your inbox is empty.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container-fluid">
        @if(!empty($notifications))
            @foreach($notifications as $notification)
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 col-md-2">
                                        <small class="text-muted">From: Notification System</small><br>
                                        <small class="text-muted">{{time_elapsed_string($notification->created_at)}}</small>
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <i class="fa fa-commenting-o mr-3"></i> {!! $notification->text !!}
                                    </div>
                                    <div class="col-2 col-md-2">
                                        {!! Form::open(['route' => 'message.read']) !!}
                                        <input type="hidden" name="message_id" value="{{$notification->id}}">
                                        <button class="btn btn-primary float-right">
                                            <i class="fa fa-eye mr-2"></i> Mark as Read
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            <div class="pull-right">
                {{ $notifications->links() }}
            </div>
        @endif     
    </div>
   

    <!-- Modal -->
    <div class="modal fade" id="messageWindow" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Message</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('message.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="filter">To: Clinic</label>
                                <div class="form-group">
                                    <input type="text" name="filter" class="form-control">
                                </div>
                                <div class="form-group">
                                    <select name="user_id[]" id="user_id" class="form-control" multiple>
                                        @foreach(App\Clinic::all() as $clinic)
                                            <option value="{{$clinic->id}}">{{$clinic->name}}</option>
                                        @endforeach
                                    </select>
                                    <small>
                                        <button type="button" class="btn select-all btn-primary btn-sm mt-2 float-right" onclick="selectAll();">Select All</button>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="text">Message</label>
                                    <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function selectAll(){
            $("select option").attr("selected", true);
        }
    </script>
@endsection