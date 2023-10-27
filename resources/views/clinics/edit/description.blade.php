<!-- Description -->
<div class="card col-12 p-0 card-gold">
    <div class="card-header">
        <h5 class="card-title">
            Description

            <i class="fa fa-edit"></i>
        </h5>
    </div>
    <div class="card-body">
        <p class="card-text">
            {!! Form::textarea('description', null, ['class' => 'form-control rounded-0 description', 'disabled' => true]) !!}
        </p>
        <div class="row">
            <div class="col-12">
                <small class="text-muted float-right">
                    <span class="currentChars">300</span>/600 characters
                </small>
            </div>
        </div>
    </div>
</div>