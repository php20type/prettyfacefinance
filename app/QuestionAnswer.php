<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $table = 'quiz_answer';

    protected $fillable = [
        'qid',
        'option_number'
    ];

}
