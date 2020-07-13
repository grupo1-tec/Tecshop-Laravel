<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Servicios;
use Faker\Generator as Faker;

$factory->define(Servicios::class, function (Faker $faker) {
    $id = App\Categorias::all()->pluck('_id');
    return [
        'ser_nombre' => $faker->randomElement(['Electricidad', 'Cómputo', 'Veterinaria', 'Jardinería']),
        'ser_img' => $faker->imageUrl(400,300), 
        'ser_descripcion' => $faker->sentence(5),
        'ser_precio'=> $faker->numberBetween($min = 50, $max = 2000),
        'categoria_id' =>$faker->randomElement($id),
    ];
});
