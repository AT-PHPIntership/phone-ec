<?php
namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    
    protected $fillable = [
        'id', 'module', 'addNew', 'update', 'delete', 'see'
    ];

    public $timestamps = false;
    
    /**
     * Table Permission hasOne with table GroupPermission.
     *
     * @return \Illuminate\Http\Response
     */
    public function permissionGroup()
    {
        return $this->hasMany('App\Models\Backend\GroupPermission', 'id', 'permission_id');
    }
}
