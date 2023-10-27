<div class="container mt-3">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <div class="row">
                <div class="col">
                    <div class="alert alert-primary">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                </div>
            </div>
        @endif
    @endforeach
    @if ($errors->any())
        <div class="row">
            <div class="col-12">
                <div class="alert alert-primary">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>