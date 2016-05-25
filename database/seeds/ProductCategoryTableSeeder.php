<?php

use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->insert([
         array('id' => '1', 'cate_name' => 'Sport', 'cate_description' => '', 'cate_image' => '', 'cate_status' => '1', 'parent_id' => '0'),
         array('id' => '2', 'cate_name' => 'Football', 'cate_description' => '', 'cate_image' => '', 'cate_status' => '1', 'parent_id' => '1'),
         array('id' => '3', 'cate_name' => 'Tennis', 'cate_description' => '', 'cate_image' => '', 'cate_status' => '1', 'parent_id' => '1'),
         array('id' => '4', 'cate_name' => 'Entertaiment', 'cate_description' => '', 'cate_image' => '', 'cate_status' => '1', 'parent_id' => '0'),
         array('id' => '5', 'cate_name' => 'Iphone', 'cate_description' => '', 'cate_image' => '', 'cate_status' => '1', 'parent_id' => '4'),
         array('id' => '6', 'cate_name' => 'PCs', 'cate_description' => '', 'cate_image' => '', 'cate_status' => '1', 'parent_id' => '4'),
         array('id' => '7', 'cate_name' => 'Mac', 'cate_description' => '', 'cate_image' => '', 'cate_status' => '1', 'parent_id' => '4')
        ]);
    }
}
