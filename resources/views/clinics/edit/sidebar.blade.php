<!-- Profile Picture -->
<div class="card rounded-0">
    @if ($clinic->logo)
        <div class="clinic-logo d-flex align-items-center">
            <img class="card-img-top" src="{{ $clinic->logo }}" alt="Card image cap">
        </div>
    @else
        <div class="clinic-logo border-bottom d-flex align-items-center">
            <img class="card-img-top img-fluid px-3" src="{{ asset('img/logo.png') }}" alt="Card image cap">
        </div>
    @endif
    <div class="card-body p-0">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <label class="btn btn-primary btn-file btn-block btn-lg mb-0">
                    <i class="fa fa-save"></i>
                    <span>Add Logo</span>
                    <input type="file" name="clinic_logo" style="display: none;">
                </label>
            </div>
        </div>
        <div class="row sidebar-name">
            <div class="col">
                <h5 class="card-title text-center text-uppercase mb-0">
                    {!! Form::textarea('name', null, [
                        'class' => 'form-control text-center border-0 pt-3 font-weight-bold rounded-0',
                        'disabled' => true,
                    ]) !!} <i class="fa fa-edit"></i>
                </h5>
            </div>
        </div>
    </div>
</div>

<div class="card my-4 card-gold">
    <div class="card-header">
        <h5>Account Navigation</h5>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="/clinics/{{ $clinic->id }}/notifications">Notifications</a> <span
                class="badge badge-primary">{{ $clinic->notifications->count() }}</span></li>
        <li class="list-group-item"><a href="/clinics/{{ $clinic->id }}/additional">Additional Information</a></li>
        <li class="list-group-item"><a href="/clinics/{{ $clinic->id }}/documents">Documents</a></li>
        <li class="list-group-item"><a href="#handbook">Handbooks</a></li>
        <li class="list-group-item"><a href="{{ route('clinics.companyDetails', $clinic->id) }}">Company Details</a>
        </li>
        
        @if(empty($QuizResult))
        <li class="list-group-item"><a href="/clinics/{{ $clinic->id }}/iar-training">IAR TRAINING</a>
        </li>
        @endif
        {{-- <li class="list-group-item"><a href="{{ route('signcontract.show', $clinic->id) }}">Sign Contract</a>
        </li> --}}
    </ul>
</div>

<div class="card rounded-0 mb-3">
    <div class="card-body">
        <div class="col-12 p-0">
            @if ($clinic->lat && $clinic->lng)
                <strong>Geolcated: </strong> YES<br>lat: {{ $clinic->lat }}<br>lng: {{ $clinic->lng }}
            @else
                <strong>Geolcated: </strong> NO
            @endif
        </div>
    </div>
</div>
