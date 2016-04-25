<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';

    /**
     * Relationship products table.
     *
     * @return array
     */
    public function products()
    {
        return $this->hasOne('App\Models\Backend\Product', 'id', 'product_id');
    }

    /**
     * Relationship users tables.
     *
     * @return array
     */
    public function users()
    {
        return $this->hasOne('App\Models\Backend\User', 'id', 'user_id');
    }
}
