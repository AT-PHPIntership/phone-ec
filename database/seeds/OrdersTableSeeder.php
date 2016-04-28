<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Models\Backend\Order::truncate();
        $faker = Faker\Factory::create();

		$limit = 10;
		for ($i = 0; $i < $limit; $i++) 
		{
			DB::table('orders')->insert([
				'user_name' => $faker->name,
				'user_iD' => 1,
				'status' => 1,	
				'user_address' => $faker->address,
				'user_phone' => 1,
			]);
		}
    }
}
