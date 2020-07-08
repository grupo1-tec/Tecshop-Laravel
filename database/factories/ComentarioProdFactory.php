<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentario_prod;
use Faker\Generator as Faker;

$factory->define(Comentario_prod::class, function (Faker $faker) {
    return [
        'Comen_texto'=> $faker->sentence(4) , 
        'Comen_fecha'=> $faker->date($format = 'Y-m-d', $max = 'now'), 
    ];
});
