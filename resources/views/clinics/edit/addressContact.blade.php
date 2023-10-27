<div class="col-12 p-0 address-contact">
    <div class="row mt-3">
        <!-- Address -->
        <div class="col-12 col-lg-6 mb-3 mb-lg-0">
            <div class="card h-100 card-gold">
                <div class="card-header">
                    <h5>Address <i class="fa fa-edit"></i></h5>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <div class="form-group">
                            <i class="fa fa-map-marker"></i>
                            {!! Form::text('address1', null, ['class' => 'form-control rounded-0', 'disabled' => true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('address2', null, ['class' => 'form-control rounded-0', 'disabled' => true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('city', null, ['class' => 'form-control rounded-0', 'disabled' => true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('postcode', null, ['class' => 'form-control rounded-0', 'disabled' => true]) !!}
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::hidden('lat', null, ['class' => 'form-control rounded-0 lat']) !!}

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::hidden('lng', null, ['class' => 'form-control rounded-0 lng']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div class="col-12 col-lg-6 mb-3 mb-lg-0">
            <div class="card h-100 card-gold">
                <div class="card-header">
                    <h5>Contact <i class="fa fa-edit"></i></h5>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <div class="form-group">
                            <i class="fa fa-globe"></i> {!! Form::text('website', null, ['class' => 'form-control rounded-0', 'disabled' => true]) !!}
                        </div>

                        <div class="form-group">
                            <i class="fa fa-envelope"></i> {!! Form::text('email', null, ['class' => 'form-control rounded-0', 'disabled' => true]) !!}
                        </div>

                        <div class="form-group">
                            <i class="fa fa-phone"></i> {!! Form::text('telephone', null, ['class' => 'form-control rounded-0', 'disabled' => true, 'required' => false]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>