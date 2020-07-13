<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class,5)
        ->create()
        ->each(function($user){
            $user->servicios()->createMany(
                factory(App\Servicios::class,2)->make()->toArray()
            ); 
         });

        $users1 = factory(App\User::class,5)
        ->create()
        ->each(function($user){
            $user->productos()->createMany(
                factory(App\Producto::class,2)->make()->toArray()
            ); 
          });
         
        /*$usuarios = App\User::all();
        foreach( $usuarios as $usuario ) {
            $servicios = $usuario->Servicios()->all();
            foreach( $servicios as $servicio){
                $servicio->Comentarios()->createMany(
                    factory(App\Comentario_serv::class,5)->make()->toArray()
                );
            }
 
            
        }*/
    }


    /*
    public function run()
    {
        $users= factory(App\User::class,10)
        ->create()
        ->each(function($user){
            $user->posts()->createMany(
               factory(App\Post::class,5)->make()->toArray()
            );
        });
    }
     */

    //ObjectId("5f092fa424739a71cd4380bf")
}
