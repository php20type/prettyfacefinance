<!-- New service / procedure -->

<div class="my-3 row ">
    <div class="col">
        <button class="btn btn-primary float-right no-submit" type="button" data-bs-toggle="collapse"
            data-bs-target="#serviceForm">
            Add Service / Procedure
        </button>
    </div>
</div>

<div id="serviceForm" class="row mt-4 collapse">
    {!! Form::open(['route' => 'services.store', 'class' => 'needs-validation', '' => '']) !!}
    {!! Form::hidden('clinic_id', $clinic->id) !!}
    <div class="col">
        <div class="card rounded-0">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col">
                            {!! Form::select('category_id', $categories, '', ['class' => 'form-control rounded-0']) !!}
                            <div class="invalid-feedback">
                                Please select a category
                            </div>
                        </div>
                        <div class="col">
                            {!! Form::text('name', '', ['class' => 'form-control rounded-0', 'placeholder' => 'Service Name']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control rounded-0"
                                placeholder="Service Description" required></textarea>
                            <div class="invalid-feedback">
                                Required Field
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-6">
                            <div class="radio">
                                <label><input type="radio" name="buying_option_type" value="single" checked>Single
                                    Buying Option</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="buying_option_type" value="multiple">Multiple Buying
                                    Options</label>
                            </div>
                        </div>

                        <div class="col-3 offset-3">
                            <div class="input-group mb-3 single-price">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">£</span>
                                </div>
                                <input name="price" type="number" step="any"
                                    class="form-control text-center rounded-0" placeholder="0.00" aria-label="Price"
                                    min="0" max="99999.99">
                            </div>
                        </div>

                        <div class="col-12 mt-3 new-buying-options collapse" id="new-buying-options">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-9">
                                        {!! Form::text('buyingoptions[1][name]', null, [
                                            'class' => 'form-control rounded-0',
                                            'placeholder' => 'Buying Option Name',
                                        ]) !!}
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text rounded-0">£</span>
                                            </div>
                                            <input name="buyingoptions[1][price]" type="number" step="any"
                                                class="form-control text-center rounded-0" placeholder="0.00"
                                                aria-label="Price" min="0" max="99999.99">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-9">
                                        {!! Form::text('buyingoptions[2][name]', null, [
                                            'class' => 'form-control rounded-0',
                                            'placeholder' => 'Buying Option Name',
                                        ]) !!}
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text rounded-0">£</span>
                                            </div>
                                            <input name="buyingoptions[2][price]" type="number" step="any"
                                                class="form-control text-center rounded-0" placeholder="0.00"
                                                aria-label="Price" min="0" max="99999.99">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mt-2">
                            <a href="javascript:void(0);" id="addBuyingOption" class="collapse">
                                <i class="fa fa-plus-circle"></i>
                                Add Buying Option
                            </a>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Service</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
