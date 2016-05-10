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
				'order_id' => 2,
				'product_id' => 1,
				'quantity' => 1,	
				'price' => 100,
			]);
		}
    }
}