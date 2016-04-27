<?php

use Illuminate\Database\Seeder;

class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Backend\Rating::truncate();
        $faker = Faker\Factory::create();

		$limit = 65;
		for ($i = 0; $i < $limit; $i++) 
		{
			DB::table('rating')->insert([
				'product_id' => rand(1,3),
				'user_id' => 1,
				'score' => rand(1,5),
				'comment' => $faker->realText,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now()
			]);
		}
    }
}
