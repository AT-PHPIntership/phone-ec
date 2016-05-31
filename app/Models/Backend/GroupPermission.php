<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    protected $table = 'group_permissions';
    protected $fillable = [
        'id', 'permission_id', 'group_id'
    ];
    public $timestamps = false;
    
    /**
     * Table GroupPermission hasOne with table Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function permission()
    {
        return $this->hasOne('App\Models\Backend\Permission', 'permission_id', 'id');
    }

    /**
     * Table GroupPermission hasOne with table Group.
     *
     * @return \Illuminate\Http\Response
     */
    public function group()
    {
        return $this->hasOne('App\Models\Backend\Group', 'group_id', 'id');
    }
}
