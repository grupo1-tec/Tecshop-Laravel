<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Servicio;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'servicio_nombre' => $faker->name,
        'servicio_descripcion' => $faker->seentence(5),
        'servicio_precio' => $faker->number,
        'cat_id' => $faker->number,
    ];
});
