<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'total',
        'item_count',
        'status',
        'clinic_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems(){
        return $this->hasMany('App\OrderItems');
    }

    public function clinic(){
        return $this->belongsTo('App\Clinic');
    }
}
