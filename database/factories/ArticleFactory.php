<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Article::class, function (Faker $faker) {
    return [        
		'description' => $faker->name,
		'make'        => $faker->name,
		'ABC'         => $faker->randomElement(['A', 'A', 'B', 'C']),
		'stockmin'    => 1,
		'stockmax'    => 10,
		'residue'     => $faker->numberBetween(2,9),
		'status'      => $faker->randomElement(['No Pedir', 'No Pedir', 'Pedir', 'Pedir Uregente']),
		'typearticle' => $faker->randomElement(['aseo_cafeteria', 'papeleria', 'otro']),
		'provider_id' => $faker->numberBetween(1,10),
		'um'          => $faker->randomElement(['Caja x 10', 'Rollo', 'Unidad', 'Libra']),
    ];
});