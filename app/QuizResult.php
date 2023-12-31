<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $table = 'quiz_result';

    protected $fillable = [
        'clinic_id',
        'reminder_mail_send_date'
    ];
}
