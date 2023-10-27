<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'question'
    ];


    public function option(){
        return $this->hasMany(QuestionOption::class, 'qid','id');
    }
}
