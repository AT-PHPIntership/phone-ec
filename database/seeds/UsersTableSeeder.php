<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('admin1'),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'active' => 0
            ]);
        }
    }
}
