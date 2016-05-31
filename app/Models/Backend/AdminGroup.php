<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    protected $table = 'admin_groups';
    protected $fillable = [
        'id', 'group_id', 'admin_id'
    ];
    public $timestamps = false;
    /**
     * Table AdminGroup hasOne with table Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return $this->hasOne('App\Models\Backend\Admin', 'admin_id', 'id');
    }

    /**
     * Table AdminGroup hasOne with table group.
     *
     * @return \Illuminate\Http\Response
     */
    public function group()
    {
        return $this->hasOne('App\Models\Backend\Group', 'group_id', 'id');
    }
}
