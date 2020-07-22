<?php

namespace App\Http\Controllers;

use App\User as Usuario;
use Illuminate\Http\Request;
use App\Http\Resources\Usuario as UsuarioResources;
use Illuminate\Support\Facades\Hash;

class UsuarioControllerAPI extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return UsuarioResources::collection($usuarios);
    }
    public function create(Request $request)
    {
        $usuario = Usuario::create([
            'name' => $request->get('name'),
            'fechaNac' => $request->get('fechaNac'),
            'email' => $request->get('email'),
            'user_img' => $request->get('user_img'),
            'password' => Hash::make($request->get('password')),
            'telefono' => $request->get('telefono'),
            'admin' => 'false',
            'activo' => 'true',
            'documento_tipo' => $request->get('documento_tipo'),
            'documento_nro' => $request->get('documento_nro'),
        ]);

        return new UsuarioResources($usuario);
    }
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return new UsuarioResources($usuario);
    }
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->update($request->all());
        return $usuario;
    }
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
    }
    public function login(Request $request)
    {
        $usuarios = Usuario::all();
        $email = $request->get('email');
        $password = $request->get('password');
        for ($i=0; $i < count($usuarios); $i++) { 
            if($usuarios[$i]->email == $email && Hash::check($password, $usuarios[$i]->password)){
                return new UsuarioResources($usuarios[$i]);
            }
        }
        return 0;
    }
}