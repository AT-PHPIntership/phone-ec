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
}
