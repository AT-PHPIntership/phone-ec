<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/



$factory->define(App\Models\Backend\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
		'email' => $faker->email,
		'password' => bcrypt('847464'),
		'address' => $faker->address,
		'phone' => $faker->phoneNumber,
		'active' => 1
    ];
});


$factory->define(App\Models\Backend\Brand::class, function (Faker\Generator $faker) {
    return [
        'brand_name' => $faker->name,
    ];
});

$factory->define(App\Models\Backend\Rating::class, function (Faker\Generator $faker) {
    return [
        'product_id' => rand(1,10),
		'user_id' => 1,
		'score' => rand(1,5),
		'comment' => $faker->realText,
		'created_at' => Carbon\Carbon::now(),
		'updated_at' => Carbon\Carbon::now()
    ];
});

$factory->define(App\Models\Backend\Admin::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
		'email' => $faker->email,
		'password' => bcrypt('admin1'),
		'address' => $faker->address,
		'phone' => $faker->phoneNumber,
		'active' => 0,
    ];
});

$factory->define(App\Models\Backend\Order::class, function (Faker\Generator $faker) {
    return [
        'user_name' => $faker->name,
		'user_id' => rand(1,10),
		'status' => 1,	
		'user_address' => $faker->address,
		'user_phone' => $faker->phoneNumber,
		'total_price' => $faker->randomNumber(4),
    ];
});
