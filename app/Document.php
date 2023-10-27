<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'id',
        'clinic_id',
        'path',
        'description',
        'type',
        'expiry_date',
        'is_reminder_mail_sent',
    ];

    public function clinic()
    {
        return $this->belongsTo('App\Clinic', 'clinic_id');
    }
}
