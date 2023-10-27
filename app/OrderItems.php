<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'price',
        'quantity',
        'option',
        'clinic_id',
        'order_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(){
        return $this->belongsTo('App\Order');
    }
}
