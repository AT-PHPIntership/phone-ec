<?php

use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

		$limit = 10;
		for ($i = 0; $i < $limit; $i++) 
		{
			DB::table('order_details')->insert([
				'order_id' => 1,
				'product_id' => 1,
				'quantity' => 1,	
				'price' => 100,
			]);
		}
    }
}
