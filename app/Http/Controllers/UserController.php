<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        return view('Usuarios', compact('usuarios'));
    }

    public function createAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required:max:50'
        ]);
        
        $name = $request->get('name');
        $fechaNac = $request->get('fechaNac');
        $telefono = $request->get('telefono');
        $documento_tipo = $request->get('documento_tipo');
        $documento_nro = $request->get('documento_nro');
        $email = $request->get('email');
        $password = $request->get('password');

        $user = new User();
        $user->name = $name;
        $user->fechaNac = $fechaNac;
        $user->telefono = $telefono;
        $user->admin = "true";
        $user->documento_tipo = $documento_tipo;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        return view('principal');
    }


    public function store(Request $request)
    {
        
    }

    public function show(User $user)
    {
        
    }

    public function edit()
    {
        $user_id = Auth::id();
        $usuario = User::find($user_id);
        return view('UserEdit', compact('usuario'));
    }

    public function update(Request $request)
    {
        $user_id = Auth::id();
        $usuario = User::find($user_id);
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->fechaNac = $request->get('fechaNac');
        $usuario->telefono = $request->get('telefono');
        $usuario->documento_tipo = $request->get('documento_tipo');
        $usuario->documentos_nro = $request->get('documentos_nro');

        $usuario->save();
        return redirect(action('UserController@edit'))->with('status', 'El Usuario ha sido actualizado');
    }


    public function destroy($id)
    {
        $usuario = User::find($id);
        
        $usuario->delete();
 
        return redirect('/usuarios/eliminar');
    }
}
