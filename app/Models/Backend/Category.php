<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="product_category";
    protected $fillable=['id', 'cate_name', 'cate_description', 'cate_status', 'cate_image', 'parent_id'];
}
