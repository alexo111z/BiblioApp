<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Materiales::class, function (Faker $faker) {
    return [
        'Titulo' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'Clave' => App\Materiales::all()->random()->Clave,
        'Year' => $faker->year($max = 'now'),                   
        'Ejemplares' => $faker->randomDigit ,
        'Tipo' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'Existe' => 1,
    ];
});