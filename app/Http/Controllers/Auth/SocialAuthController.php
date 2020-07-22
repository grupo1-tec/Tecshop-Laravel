<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;   
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->user(); 
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) { 
            return $this->authAndRedirect($user,"true"); // Login y redirección
        } else {
            
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            //$social_user->avatar->move(public_path("img/users","avatar.jpg"));
            $imageName=time().$social_user->name.".jpg";
            file_put_contents(public_path("img/users/").$imageName, file_get_contents($social_user->avatar));
            $user = User::create([
                'name' => $social_user->name,
                'fechNac'=> "",
                'email' => $social_user->email,
                'email_verified_at' => now(),
                'telefono'=> "sin definir",
                'user_img'=> "img/users/".$imageName,
                'remember_token' => Str::random(10),
                'activo' => "true",
                'admin' => "false",
                'documento_tipo' => "",
                'documento_nro' => ""
            ]);
 
            return $this->authAndRedirect($user,"false"); // Login y redirección
        }
    }
 
    // Login y redirección
    public function authAndRedirect($user,$login)
    {
        Auth::login($user);
        if($login =="false"){
            return redirect()->to('/')->with('status','El usuario ah sido creado con algunos atributos vacios, si desea modifiquelos');
        }
        else{
            return redirect()->to('/');
        }
    }
}
