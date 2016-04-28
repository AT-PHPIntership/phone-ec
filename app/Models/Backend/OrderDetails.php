<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';
     /**
     * The attributes that are mass assignable.
     *
     * @return array
     */
    public function products()
    {
        return $this->hasOne('App\Models\Backend\Product', 'product_id', 'id');
    }
}
