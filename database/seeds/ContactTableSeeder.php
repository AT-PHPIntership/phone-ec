<?php
use Illuminate\Database\Seeder;
class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for ($i=0; $i < 10; $i++) { 
        	DB::table('contacts')->insert([
				'name'       => $faker->name,
				'email'      => $faker->email,
				'enquiry'    => $faker->address,
				'created_at' => Carbon\Carbon::now(),
			]);
        }
    }
}
