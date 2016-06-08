<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = [
        'id', 'name'
    ];
    public $timestamps = false;

    /**
     * Table Group has Many with table Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Backend\Permission', 'GroupPermission');
    }

    /**
     * Table Group hasMany with table AdminGroup.
     *
     * @return \Illuminate\Http\Response
     */
    public function admins()
    {
        return $this->belongsToMany('App\Models\Backend\Admin', 'AdminGroup');
    }
}
