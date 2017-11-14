<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Provider::class, function (Faker $faker) {
    return [
        'nit'             => $faker->numberBetween(10000,100000),
		'description'      => $faker->name,
		'address'       => $faker->address,
		'phone'           => $faker->phoneNumber
    ];
});
