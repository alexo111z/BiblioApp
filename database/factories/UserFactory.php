<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $userFaked = [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];

    $careers = ['ISC', 'ITCS', 'ARQ', 'EM', 'IGEM', 'TUR'];
    $career = $careers[array_rand($careers)];
    $userType = User::SESSION_TYPES[array_rand(User::SESSION_TYPES)];

    if ($userType === User::TYPE_TEACHER || $userType === User::TYPE_ADMINISTRATIVE) {
        $userFaked['payroll'] = $faker->numberBetween(1000, 10000);
    }

    if ($userType === User::TYPE_STUDENT) {
        $userFaked['control_number'] = $faker->numberBetween(1271291, 48938429);
        $userFaked['career'] = $career;
    }

    if ($userType === User::TYPE_ADMINISTRATIVE) {
        $userFaked['position'] = 'Bibliotecario';
    }

    $userFaked['user_type'] = $userType;

    return $userFaked;
});
