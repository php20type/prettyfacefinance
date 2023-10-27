<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'approved'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * Add relationship to users
     */

    public function services()
    {
        return $this->hasMany('App\Service', 'category_id');
    }

    public function template()
    {
        return $this->hasMany('App\Template', 'categories_id');
    }
}
