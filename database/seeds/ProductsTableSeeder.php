<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Backend\Product::truncate();
        $faker = Faker\Factory::create();

		$limit = 15;
		for ($i = 0; $i < $limit; $i++) 
		{
			DB::table('products')->insert([
				'brand_id' => rand(1,3),
				'name' => $faker->name,
				'image' => $faker->name,
				'old_price' => rand(),
				'quantity' => rand(),
				'description' => $faker->realText,
				'des_tech' => $faker->realText
			]);
		}
    }
}
