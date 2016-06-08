<?php
namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    
    protected $fillable = [
        'id', 'module', 'see', 'inset', 'edit', 'destroy'
    ];

    public $timestamps = false;
    
    /**
     * Permission has many Groups.
     *
     * @return \Illuminate\Http\Response
     */
    public function groups()
    {
        return $this->belongsToMany('App\Models\Backend\Group', 'GroupPermission');
    }
}
