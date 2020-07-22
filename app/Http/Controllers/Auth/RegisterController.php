<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telefono' => ['required', 'string', 'min:9', 'max:9'],
            'documento_nro' => ['required', 'string', 'min:8', 'max:11'],
            // 'user_img' => ['required','mimes:jpeg,png,jpg','max:2048'],
        ]);
    }

    protected function create(array $data)
    {   
        if(isset($data['user_img'])){
            $image = $data['user_img'];
            $imageName = time().$image->getClientOriginalName();
            $data['user_img']->move(public_path('img/users'),$imageName);
            $imageName='img/users/' .$imageName;
        }
        else{
            $imageName = "";
        }
        return User::create([
            'name' => $data['name'],
            'user_img' =>  $imageName,
            'fechaNac' => $data['fechaNac'],
            'telefono' => $data['telefono'],
            'admin' => 'false',
            'documento_tipo' => $data['documento_tipo'],
            'documento_nro' => $data['documento_nro'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
        ]);
    }

    // public function create1(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:120',
    //         'email' => 'required|email|max:100',
    //         'password' => 'required|string|min:8|confirmed',
    //         'user_img' => 'required|image|mimes:jpeg,png,jpg|:max2048',
    //     ]);

    //     $image = $request->file('user_img');
    //     $imageName = time().$image->getClientOriginalName();
    //     $nombre = $request->get('name');
    //     $fechaNac = $request->get('fechaNac');
    //     $email = $request->get('email');
    //     $password = Hash::make($request->get('name'));
    //     $activo = "true";
    //     $admin = "false";
    //     $documento_tipo = $request->get('documento_tipo');
    //     $documento_nro = $request->get('documento_nro');

    //     $usuario = new User();
    //     $usuario->name = $nombre;
    //     $usuario->fechaNac = $fechaNac;
    //     $usuario->email = $email;
    //     $usuario->password = $password;
    //     $usuario->activo = $activo;
    //     $usuario->admin = $admin;
    //     $usuario->documento_tipo = $documento_tipo;
    //     $usuario->documento_nro = $documento_nro;
    //     $usuario->save();

    //     $request->user_img->move(public_path('img/users'),$imageName);

    // }

    protected function createAdmin(array $data)
    {
        //
    }
}
