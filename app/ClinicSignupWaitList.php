<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicSignupWaitList extends Model
{
    protected $table = 'clinic_sign_up_wait_list';

    protected $fillable = [
        'name',
        'business_name',
        'email',
        'phone',
        'instagram_handle',
        'path',
    ];
}
