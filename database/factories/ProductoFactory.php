<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    $id = App\Categorias::all()->pluck('_id');
    return [
        'prod_nombre' => $faker->randomElement(['Laptop Dell', 'Papaya', 'Fósforo']), 
        'prod_img' => $faker->imageUrl(400,300), 
        'prod_descripcion'=>$faker->paragraph(3),
        'prod_stock' => $faker->numberBetween($min = 1, $max = 100),
        'prod_precio' => $faker->numberBetween($min = 1, $max = 1000), 
        'categoria_id' =>$faker->randomElement($id),
    ];
});
