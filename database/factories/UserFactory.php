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
    return [
        'name' => $faker->name,
        'fechaNac' => $faker->date($format = 'Y-m-d', $max = 'now'), //date($format = 'Y-m-d', $max = 'now')
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'telefono'=> $faker->phoneNumber, //phoneNumber
        'img'=> $faker->imageUrl(400,300),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'activo' => $faker->boolean($chanceOfGettingTrue = 50),
        'admin' => $faker->boolean($chanceOfGettingTrue = 50),
        'documento_tipo' => $faker->randomElement(['DNI', 'RUC', 'PA']),//randomElement($array = array ('a','b','c')),
        'documento_nro' => $faker->randomNumber($nbDigits = 8, $strict = true)//randomDigit numberBetween($min = 1000, $max = 9000),
    ];
});
