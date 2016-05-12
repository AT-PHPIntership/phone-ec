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
        return $this->hasOne('App\Models\Frontend\Product', 'id', 'product_id');
    }
     /**
     * The attributes that are mass assignable.
     *
     * @return array
     */
    public function orders()
    {
        return $this->hasOne('App\Models\Frontend\Order', 'id', 'order_id');
    }
    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'price',
    ];
}
