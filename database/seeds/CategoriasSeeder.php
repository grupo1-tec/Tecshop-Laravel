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
        $categorias = factory(App\Categorias::class,10)
        ->create()
        ->each(function($categoria){
            $categoria->Productos()->createMany(
                factory(App\Producto::class,5)
                ->create()
                ->each(function($producto){
                    $producto->Comentarios()->createMany(
                        factory(App\Comentario_prod::class,5)->make()->toArray()
                    );                                       
                })
            );
        });
    }
}
