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
     * Table Group hasMany with table GroupPermission.
     *
     * @return \Illuminate\Http\Response
     */
    public function permissionGroup()
    {
        return $this->hasMany('App\Models\Backend\GroupPermission', 'id', 'group_id');
    }

    /**
     * Table Group hasMany with table AdminGroup.
     *
     * @return \Illuminate\Http\Response
     */
    public function groupAdmin()
    {
        return $this->hasMany('App\Models\Backend\AdminGroup', 'id', 'group_id');
    }
}
