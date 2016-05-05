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
        //
    	// factory(App\User::class, 10)->create()->each(function($u) {
     //        $u->posts()->save(factory(App\Post::class)->make());
     //    });
        $faker = Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'created_at'  => $faker->dateTime,
                'updated_at'  => $faker->dateTime,
            ]);
        }
    }
}
