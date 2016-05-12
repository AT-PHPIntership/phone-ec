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
        // App\Models\Backend\Product::truncate();
        $faker = Faker\Factory::create();

		$limit = 60;
		for ($i = 0; $i < $limit; $i++) 
		{
			DB::table('products')->insert([
				'brand_id' => rand(1,5),
				'name' => $faker->name,
				'image' => $faker->name,
				'old_price' => $faker->randomNumber(3),
				'current_price' => $faker->randomNumber(4),
				'quantity' => $faker->randomNumber(1),
				'description' => $faker->realText,
				'des_tech' => $faker->realText
			]);
		}
    }
}
