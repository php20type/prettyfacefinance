@if (Auth::user()->role == 1)
    <div id="accordion">
        <div class="card col-12 p-0 card-gold mt-3">
            <div class="card-header" data-bs-toggle="collapse" data-bs-target="#qualificationBox">
                <h5 class="card-title">
                    Qualifications
                </h5>
            </div>
            <div class="card-body collapse" id="qualificationBox">
                <!-- Add new qualification -->
                <h5 class="mb-3">
                    Upload a new qualification document
                </h5>
                {!! Form::open(['route' => ['qualifications.store'], 'files' => true, 'class' => '']) !!}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <select name="name" id="name" class="form-control rounded-0">
                                <option value="Registered Nurse">Registered Nurse</option>
                                <option value="Independent Nurse Prescriber">Independent Nurse Prescriber</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Dentist">Dentist</option>
                                <option value="Paramedic">Paramedic</option>
                                <option value="Midwife">Midwife</option>
                                <option value="SPMU artist">SPMU artist</option>
                                <option value="Beauty Therapist">Beauty Therapist</option>
                                <option value="Beauty Therapist working alongside Independent Prescriber">Beauty
                                    Therapist working alongside Independent Prescriber</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Assessor">Assessor</option>
                                <option value="Operating Department Practitioner">Operating Department Practitioner
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="text" name="description" class="form-control rounded-0"
                            placeholder="Qualification Description">
                        {!! Form::hidden('clinic_id', $clinic->id) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="btn btn-primary btn-file mb-0">
                            <span><i class="fa fa-upload mr-2"></i>Choose Document</span> <input type="file"
                                name="path" id="path" style="display: none;">
                        </label>
                        <button class="btn btn-primary"><i class="fa fa-save mr-2"></i> Save Document</button>
                    </div>
                </div>
                {!! Form::close() !!}

                <!-- Show existing qualifications -->
                <h5 class="my-3">
                    Your Qualifications
                </h5>

                @foreach ($clinic->qualifications as $qualification)
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-2 p-0 rounded-0">
                                <div class="card-body">
                                    <div class="card-title m-0">
                                        <div class="row">
                                            <div class="col-6 d-flex align-items-center">
                                                <h6 class="m-0">{{ $qualification->name }}</h6>
                                            </div>
                                            <div class="col-6 p-0 d-flex align-items-center justify-content-end">
                                                <a class="btn btn-dark btn-sm mr-2" href="{{ $qualification->path }}"><i
                                                        class="fa fa-edit"></i> View</a>
                                                <a class="btn btn-dark btn-sm mr-2" href="{{ $qualification->path }}"
                                                    download><i class="fa fa-download"></i> Download</a>
                                                {!! Form::open([
                                                    'route' => ['qualifications.destroy', $qualification->id],
                                                    'method' => 'delete',
                                                    'class' => 'pull-left',
                                                ]) !!}
                                                <button type="submit" class="btn btn-dark btn-sm mr-2"
                                                    onClick="return confirm('Are you sure?');"><i
                                                        class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
