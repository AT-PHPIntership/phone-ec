<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Relationship tables.
     *
     * @return array
     */
    public function brands()
    {
        return $this->hasOne('App\Models\Backend\Brand', 'id', 'brand_id');
    }
}
