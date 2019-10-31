<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Editoriales;
use Faker\Generator as Faker;

$factory->define(Editoriales::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->sentence,
        'Existe' => 1
    ];
});
