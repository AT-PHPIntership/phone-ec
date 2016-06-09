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
}
