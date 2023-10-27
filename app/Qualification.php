<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = [
        'id',
        'clinic_id',
        'path',
        'description',
        'name'
    ];

    public function clinic(){
        return $this->belongsTo('App\Clinic', 'clinic_id');
    }
}
