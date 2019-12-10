<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Libros::class, function (Faker $faker) {
    return [
        'ISBN' => $faker->unique()->randomNumber(3,true),
        'Titulo' => $faker->realText($maxNbChars = 30, $indexSize = 2),
        'IdAutor' => App\Libros::all()->random()->IdAutor,
        'IdEditorial' => App\Libros::all()->random()->IdEditorial,
        'IdCarrera' => App\Libros::all()->random()->IdCarrera,
        'dewey' => App\Libros::all()->random()->dewey,
        'Edicion' => $faker->randomDigit (2),
        'Year' => $faker->year($max = 'now'),  
        'Volumen' => $faker->randomDigit (2),               
        'Ejemplares' => $faker->randomDigit (2) ,
        'EjemDisp' => $faker->randomDigit (2),
        'Imagen' => $faker->realText($maxNbChars = 20, $indexSize = 2),
        'FechaRegistro' => $faker->date($format = 'Y-m-d', $max = 'now'),  
        'Existe' => 1,
    ];
});