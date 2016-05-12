<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'orderdetails';
     /**
     * The attributes that are mass assignable.
     *
     * @return array
     */
    public function products()
    {
        return $this->hasOne('App\Models\Backend\Product', 'id', 'product_id');
    }
}
