<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $table = 'quiz_options';

    protected $fillable = [
        'qid',
        'option'
    ];

}
