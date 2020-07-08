<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categorias;
use Faker\Generator as Faker;

$factory->define(Categorias::class, function (Faker $faker) {
    return [
        'cat_nombre' => $faker->randomElement(['Electricidad', 'Tecnología', 'Ropa', 'Calzado']),
    ];
});
