<?php

namespace App\Models\Backend;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = [
       'id', 'name', 'email', 'password', 'address', 'phone', 'active',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Table Admin hasMany with table AdminGroup.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminGroup()
    {
        return $this->hasMany('App\Models\Backend\AdminGroup', 'id', 'admin_id');
    }
}
