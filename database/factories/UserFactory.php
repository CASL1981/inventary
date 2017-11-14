<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
		'cc'             => $faker->numberBetween(10000,100000),
		'firstname'      => $faker->name,
		'lastname'       => $faker->name,
		'role'           => $faker->randomElement(['edit', 'normal']),
		'email'          => $faker->unique()->safeEmail,
		'area'           => $faker->randomElement(['administracion', 'comercial', 'farmacia']),
		'nick'           => str_random(6),
		'avatar'		 => $faker->randomElement(['avatar-male.png', 'avatar-male2.png', 'avatar-female.png', 'avatar-female2.png']),
		'password'       => $password ?: $password = bcrypt('secret'),
		'remember_token' => str_random(10),        
    ];
});
