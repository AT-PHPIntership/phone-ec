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

$factory->define(App\Models\Backend\Admin::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
		'email' => $faker->email,
		'password' => bcrypt('admin1'),
		'address' => $faker->address,
		'phone' => $faker->phoneNumber,
		'active' => 1
    ];
});

$factory->define(App\Models\Backend\Admin::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
		'email' => $faker->email,
		'password' => bcrypt('admin1'),
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
