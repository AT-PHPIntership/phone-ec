<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = 'subscribe';

    protected $fillable = ['sub_email'];
}
