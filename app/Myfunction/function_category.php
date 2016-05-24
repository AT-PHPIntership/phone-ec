<?php
/**
     * Get category select list.
     *
     * @param int $cates  cates
     * @param int $parent parent
     * @param int $str    str
     * @param int $select select
     *
     * @return array
     */
function cateParent($cates, $parent = 0, $str = "--", $select = 0)
{
    foreach ($cates as $cate) {
        $id = $cate['id'];
        $cateName = $cate['cate_name'];
        if ($cate['parent_id'] == $parent) {
            if ($select != 0 && $id == $select) {
                echo "<option value='$id' selected='selected'>$str $cateName</option>";
            } else {
                echo "<option value='$id'>$str $cateName</option>";
            }
            cateParent($cates, $id, $str."--");
        }
    }
}
