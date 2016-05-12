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
        // DB::table('order_details')->delete();
        $faker = Faker\Factory::create();
		$limit = 10;
		for ($i = 0; $i < $limit; $i++) 
		{
			DB::table('orderdetails')->insert([
				'order_id' => rand(1,10),
				'product_id' => rand(1,20),
				'quantity' => $faker->randomNumber(1),	
				'price' => $faker->randomNumber(4),
			]);
		}
    }
}