<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @return array
     */
    protected $fillable = ['status'];
    /**
     * The attributes that are mass assignable.
     *
     * @return array
     */
    public function users()
    {
        return $this->hasOne('App\Models\Backend\User', 'id', 'user_id');
    }
     /**
     * The attributes that are mass assignable.
     *
     * @return array
     */
    public function orderdetails()
    {
        return $this->hasMany('App\Models\Backend\OrderDetails', 'id', 'order_details_id');
    }
}
