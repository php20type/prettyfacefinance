<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
        'clinic_id',
        'description',
        'price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinic(){
        return $this->belongsTo('App\Clinic', 'clinic_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buyingOptions(){
        return $this->hasMany('App\BuyingOption', 'service_id');
    }
}
