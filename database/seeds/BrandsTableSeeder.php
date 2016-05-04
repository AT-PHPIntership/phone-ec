<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

		$limit = 65;
		for ($i = 0; $i < $limit; $i++) 
		{
			DB::table('brands')->insert([
				'brand_name' => $faker->name
			]);
		}
    }
}
