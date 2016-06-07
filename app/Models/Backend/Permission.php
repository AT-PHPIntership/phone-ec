<?php
namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    
    protected $fillable = [
        'id', 'module', 'inset', 'update', 'delete', 'see'
    ];

    public $timestamps = false;
    
    /**
     * Table Permission has Many Group.
     *
     * @return \Illuminate\Http\Response
     */
    public function Groups()
    {
        return $this->belongsToMany('App\Models\Backend\Group', 'GroupPermission');
    }
}
