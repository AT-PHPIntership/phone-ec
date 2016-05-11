<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'user_id',
    	'user_name',
    	'user_phone',
    	'user_address',
    	'total_price',
    	'status'
    ];
}
