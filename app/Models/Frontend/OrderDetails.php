<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'orderdetails';

    protected $fillable = [
    	'product_id',
    	'order_id',
    	'quantity',
    	'price',
    ];
}
