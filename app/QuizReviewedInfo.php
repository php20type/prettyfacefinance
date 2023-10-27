<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizReviewedInfo extends Model
{
    protected $table = 'quiz_reviewed_info';

    protected $fillable = [
        'clinic_id',
        'signature',
        'is_reviewed_information',
    ];
}
