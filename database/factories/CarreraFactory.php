<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Carrera;
use Faker\Generator as Faker;

$factory->define(Carrera::class, function (Faker $faker) {
    return [
        'Clave' => $faker->unique()->randomNumber(3,true),
        'Nombre' => $faker->sentence(3),
        'Existe' => 1,
    ];
});
