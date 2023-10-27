<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'text',
        'user_id',
        'read'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinic(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
