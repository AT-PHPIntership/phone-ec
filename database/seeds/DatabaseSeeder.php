<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        $this->call(OrdersTableSeeder::class);
=======
        $this->call(BrandsTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(RatingTableSeeder::class);
>>>>>>> a17a130c72a7aed61835c062b102623f3cb8d6b0
    }
}
