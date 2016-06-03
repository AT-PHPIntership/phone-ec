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
        // DB::table('orders')->delete();
        $faker = Faker\Factory::create();
		$limit = 20;
		for ($i = 0; $i < $limit; $i++) 
		{
			DB::table('orders')->insert([
				'user_name' => $faker->name,
				'user_id' => rand(1,10),
				'status' => 1,	
				'user_address' => $faker->address,
				'user_phone' => $faker->phoneNumber,
				'total_price' => $faker->randomNumber(4),
				'created_at' => Carbon\Carbon::now()
			]);
		}
    }
}