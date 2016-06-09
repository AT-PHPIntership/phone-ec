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
}
