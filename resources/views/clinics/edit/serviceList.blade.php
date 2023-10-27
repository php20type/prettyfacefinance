<div id="accordion_services" class="accordion mb-3">
    @foreach ($services as $category => $serviceCollection)
        <?php
        $formattedCategory = str_replace(' ', '', $category);
        $formattedCategory = str_replace('(', '', $formattedCategory);
        $formattedCategory = str_replace(')', '', $formattedCategory);
        $formattedCategory = str_replace('/', '', $formattedCategory);
        ?>
        <div class="card mt-3 w-100 rounded-0">
            <div class="card-header border-bottom-0" data-bs-toggle="collapse" data-bs-target="#{{ $formattedCategory }}">
                <h5>
                    {{ $category }}
                </h5>
            </div>

            <div id="{{ $formattedCategory }}" class="collapse" data-parent="#accordion_services">
                <div class="card-body p-0">
                    @foreach ($serviceCollection as $service)
                        <div class="card border-0">
                            <div class="card-header border-top border-bottom-0">
                                <div class="row">
                                    <div class="col-5 d-flex align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#service_{{ $service->id }}">
                                        <h6>
                                            ({{ count($service->buyingOptions) }})
                                            {{ $service->name }}
                                        </h6>
                                    </div>

                                    <div class="col-7 d-flex align-items-center justify-content-end">
                                        @if (count($service->buyingOptions) < 1)
                                            <div class="service-price px-3">
                                                £{{ $service->price }}
                                            </div>
                                        @else
                                            <a href="#service_option_{{ $service->id }}" class="gold pull-right px-3"
                                                data-toggle="collapse">
                                                <i class="fa fa-plus-circle"></i> Add buying option
                                            </a>
                                        @endif

                                        <button class="btn btn-primary mr-2" data-bs-toggle="modal"
                                            data-bs-target="#service_edit_{{ $service->id }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>

                                        {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'delete', 'class' => 'pull-left']) !!}
                                        <button type="submit" class="btn btn-primary"
                                            onClick="return confirm('Are you sure?');"><i
                                                class="fa fa-trash"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="card-body p-0 collapse" id="service_{{ $service->id }}"
                                    data-parent="#{{ $formattedCategory }}">
                                    <div class="card-text px-3">
                                        {{ $service->description }}
                                    </div>

                                    @foreach ($service->buyingOptions as $buyingOption)
                                        <div class="card m-3 rounded-0">
                                            <div class="card-body buying-option p-2">
                                                <div class="card-title m-0">
                                                    <div class="row">
                                                        <div class="col-6 d-flex align-items-center">
                                                            <h6 class="m-0">{{ $buyingOption->name }}</h6>
                                                        </div>
                                                        <div
                                                            class="col-6 d-flex align-items-center justify-content-end">
                                                            <div class="buyingoption-price px-3">
                                                                £{{ $buyingOption->price }}
                                                            </div>
                                                            <button class="btn btn-dark btn-sm mr-2"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#buying_option_{{ $buyingOption->id }}"><i
                                                                    class="fa fa-edit"></i> Edit</button>
                                                            {!! Form::open([
                                                                'route' => ['buyingoptions.destroy', $buyingOption->id],
                                                                'method' => 'delete',
                                                                'class' => 'pull-left',
                                                            ]) !!}
                                                            <button type="submit" class="btn btn-primary btn-sm"
                                                                onClick="return confirm('Are you sure?');"><i
                                                                    class="fa fa-trash"></i></button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Service Edit Modal -->
                                        <div class="modal fade" id="buying_option_{{ $buyingOption->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Edit Service -
                                                            {{ $buyingOption->name }}</h4>
                                                        <button type="button float-right" class="close"
                                                            data-bs-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::model($buyingOption, [
                                                            'route' => ['buyingoptions.update', $buyingOption],
                                                            'method' => 'PUT',
                                                            'novalidate' => true,
                                                            'class' => 'needs-validation',
                                                        ]) !!}
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <label for="name">Service Name</label>
                                                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="price">Price</label>
                                                                    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'price', 'required' => true]) !!}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="description">Service Description</label>
                                                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="card-footer collapse" id="service_option_{{ $service->id }}">
                                    {!! Form::open([
                                        'route' => 'buyingoptions.store',
                                        'id' => '',
                                        'class' => 'needs-validation',
                                        'novalidate' => true,
                                    ]) !!}
                                    <div class="form-group mb-0">
                                        <div class="row">
                                            <div class="col-8">
                                                {!! Form::label('name', 'Name') !!}
                                                {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'required' => true]) !!}
                                                <div class="invalid-feedback">
                                                    Description is required.
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                {!! Form::label('price', 'Price') !!}
                                                {!! Form::text('price', null, ['class' => 'form-control form-control-sm', 'required' => true]) !!}
                                                <div class="invalid-feedback">
                                                    Price is required.
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-primary float-right btn-sm btn-block"
                                                    style="margin-top: 30px;">Save</button>
                                            </div>
                                        </div>
                                    </div>

                                    {!! Form::hidden('service_id', $service->id) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                        <!-- Service Edit Modal -->
                        <div class="modal fade" id="service_edit_{{ $service->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Edit Service - {{ $service->name }}
                                        </h4>
                                        <button type="button float-right" class="close" data-bs-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($service, ['route' => ['services.update', $service], 'method' => 'PUT']) !!}
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="name">Service Name</label>
                                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    @if (count($service->buyingOptions) == 0)
                                                        <label for="price">Price</label>
                                                        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'price']) !!}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Service Description</label>
                                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
