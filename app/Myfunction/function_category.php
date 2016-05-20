<?php
function cate_parent($cates, $parent=0, $str="--", $select=0){
    foreach($cates as $cate){
        $id = $cate['id'];
        $cate_name = $cate['cate_name'];
        if($cate['parent_id'] == $parent){
            if($select != 0 && $id == $select){
                echo "<option value='$id' selected='selected'>$str $cate_name</option>";
           }else{
                echo "<option value='$id'>$str $cate_name</option>";
           }
           cate_parent($cates, $id, $str."--");
        }
    }
}
