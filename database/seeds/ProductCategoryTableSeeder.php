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
        $faker = Faker\Factory::create();
		$limit = 7;
		for ($i = 0; $i < $limit; $i++) 
		{
			DB::table('product_category')->insert([
				'cate_name' => $faker->name,
				'cate_description' => rand(1,10),
				'cate_image' => 'none image',	
				'cate_status' => 1,
				'parent_id' => 0,
			]);
		}
    }
}
