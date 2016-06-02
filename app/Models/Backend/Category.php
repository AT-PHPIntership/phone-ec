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
    public function cateParent($cates, $parent = 0, $str = "--", $select = 0) {
        foreach ($cates as $cate) {
            $cateId = $cate['id'];
            $cateName = $cate['cate_name'];
            if ($cate['parent_id'] == $parent) {
                if ($select != 0 && $cateId === $select) {
                    echo "<option value='$cateId' selected='selected'>$str $cateName</option>";
                } else {
                    echo "<option value='$cateId'>$str $cateName</option>";
                }
                $this->cateParent($cates, $cateId, $str . "--");
            }
        }
    }

}
