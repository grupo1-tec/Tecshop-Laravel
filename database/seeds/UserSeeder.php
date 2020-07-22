<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        $users1 = factory(App\User::class,10)
        ->create()
        ->each(function($user){
            $user->productos()->createMany(
                factory(App\Producto::class,8)->make()->toArray()
            ); 
          });
        
        DB::table('users')->insert([
            'name' => 'TecShop',
            'fechaNac' => '1990-07-20',
            'email' => 'tecshop@gmail.com',
            'telefono' => '4342342344',
            'user_img' => 'https://lorempixel.com/400/300/?27240',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'activo' => 'true',
            'admin' => 'true',
            'documento_tipo' => 'DNI',
            'documento_nro' => "56745299",
        ]);
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
