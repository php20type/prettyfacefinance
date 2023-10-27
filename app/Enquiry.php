<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'type',
        'name',
        'clinic_name',
        'email_address',
        'clinic_address',
        'message',
        'contact_number',
        'status'
    ];
}
