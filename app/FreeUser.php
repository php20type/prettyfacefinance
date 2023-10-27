<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeUser extends Model
{
    protected $fillable = [
        'email',
        'used'
    ];
}
