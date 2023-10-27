<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'templates';

    /**
     * @var array
     */
    protected $fillable = [
        'categories_id',
        'file',
        'cover_image',
        'name',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'categories_id');
    }
}
