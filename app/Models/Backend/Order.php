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
    public function users()
    {
        return $this->hasOne('App\Models\Backend\User', 'id', 'user_id');
    }
}
