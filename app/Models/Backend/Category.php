<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = "product_category";
    protected $fillable = ['id', 'cate_name', 'cate_description', 'cate_status', 'cate_image', 'parent_id'];

    /**
     * Function list all categories
     *
     * @param int    $cates  cates
     * @param int    $parent parent
     * @param string $str    str
     * @param int    $select select
     *
     * @return \Illuminate\Http\Response
     */

    public function parent() {

    return $this->hasOne('\App\Models\Backend\Category', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('\App\Models\Backend\Category', 'parent_id', 'id');
    }

    public static function tree() {
        $parentId = 0;
        $start_index = 0;
        $num = 10;
        return static::with(implode('.', array_fill($start_index, $num, 'children')))->where('parent_id', '=', $parentId)->get();
    }

}
