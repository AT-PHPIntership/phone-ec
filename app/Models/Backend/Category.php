<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = "product_category";
    protected $fillable = ['id', 'cate_name', 'cate_description', 'cate_status', 'cate_image', 'parent_id'];

    /**
     * Category parent
     *
     * @return \Illuminate\Http\Response
     */
    public function parent()
    {

        return $this->hasOne('\App\Models\Backend\Category', 'id', 'parent_id');


    }

    /**
     * Category Children
     *
     * @return \Illuminate\Http\Response
     */
    public function children()
    {

        return $this->hasMany('\App\Models\Backend\Category', 'parent_id', 'id');
    }

    /**
     * Function list all categories.
     *
     * @return \Illuminate\Http\Response
     */
    public static function tree()
    {
        $parentId = 0;
        return static::with(implode('.', array_fill(0, 10, 'children')))->where('parent_id', '=', $parentId)->get();
    }
}
