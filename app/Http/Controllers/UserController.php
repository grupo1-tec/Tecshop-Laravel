<?php

namespace App\Http\Controllers;

use App\User;
use App\Servicios;
use App\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ->middleware('admin')
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['edit','update']);
    }
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
        $imagen = $request->file('avatar');
        $imageName = time().$imagen->getClientOriginalName();

        $user = new User();
        $user->name = $name;
        $user->fechaNac = $fechaNac;
        $user->telefono = $telefono;
        $user->admin = "true";
        $user->documento_tipo = $documento_tipo;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->user_img = 'img/users' . $imageName;
        $user->save();

        $request->avatar->move(public_path('img/users'),$imageName);

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

    public function notificate()
    {
        $user = Auth::user();
        return view('notificate',compact('user'));
    }

    public function update(Request $request)
    {
        $usuario = Auth::user();
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->fechaNac = $request->get('fechaNac');
        $usuario->telefono = $request->get('telefono');
        $usuario->documento_tipo = $request->get('documento_tipo');
        $usuario->documento_nro = $request->get('documento_nro');
        if($request->file('user_img')){
            if($usuario->user_img != ""){
                $name="/home/ubuntu/Workplace/TecShop/Laravel/tecshop/public/".$usuario->user_img;
                unlink($name);
            }
            $image=$request->file('user_img');
            $imageName =time().$image->getClientOriginalName();
            $image->move(public_path('img/users'),$imageName);
            $usuario->user_img="img/users/".$imageName;
        }

        $usuario->save();
        return redirect(action('UserController@edit'))->with('status', 'El Usuario ha sido actualizado');
    }


    public function destroy($id)
    {
        $usuario = User::find($id);
        $servicios = Servicios::where("user_id","=",$id)->get();
        $productos = Producto::where("user_id","=",$id)->get();
        for($i=0; $i<count($servicios); $i++){
            $servicios[$i]->delete();
        }
        for($i=0; $i<count($productos); $i++){
            $productos[$i]->delete();
        }
        $allservicios = Servicios::all();
        $allproductos = Producto::all();

        for($i=0; $i<count($allservicios); $i++){
            $allcomentarios = $allservicios[$i]->Comentarios;
            for($x=0; $x<count($allcomentarios); $x++){
                if($allcomentarios[$x]->user_id == $id){
                    $allcomentarios[$x]->delete();
                }
            }
        }
        for($i=0; $i<count($allproductos); $i++){
            $allcomentarios = $allproductos[$i]->Comentarios;
            for($x=0; $x<count($allcomentarios); $x++){
                if($allcomentarios[$x]->user_id == $id){
                    $allcomentarios[$x]->delete();
                }
            }
        }
        $usuario->delete();
        return redirect('/usuarios/eliminar');
    }
}
