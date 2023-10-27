<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyingOption extends Model
{
    protected $fillable = [
        'name',
        'price',
        'service_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function services(){
        return $this->belongsTo('App\Service');
    }
}
