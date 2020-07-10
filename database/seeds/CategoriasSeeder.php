<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = factory(App\Categorias::class,4)
        ->create()
        ->each(function($producto){
            $producto->Productos()->createMany(
                factory(App\Producto::class,5)->make()->toArray()
            ); 
         });
    }
}
