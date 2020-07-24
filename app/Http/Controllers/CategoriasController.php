<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Servicios;
use App\Producto;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{

    public function all()
    {
        $categorias = Categorias::all();
        return view('create_prod', compact('categorias'));
    }

    public function allserv()
    {
        $categorias = Categorias::all();
        return view('createserv', compact('categorias'));
    }

    public function create()
    {
        return view('create_categoria');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_nombre' => 'required:max:30',
        ]);

        $nombre = $request->get('cat_nombre');

        $categoria = new Categorias();
        $categoria->cat_nombre =  $nombre;
        $categoria->save();

        return redirect('/categorias/admin');
    }

    public function allx()
    {
        $categorias = Categorias::all();
        return view('categorias', compact('categorias'));
    }

    public function edit($id)
    {
        $categoria = Categorias::find($id);
        return view('categoriaEdit',['categoria' => $categoria]);
    }

    public function update(Request $request)
    {
        $categoria = Categorias::find($request->get('cat_id'));
        $categoria->cat_nombre = $request->get('cat_nombre');
        $categoria->save();
        return redirect('/categorias/admin');
    }

    public function destroy($id)
    {
        $categoria = Categorias::find($id);
        $servicios = Servicios::all();
        $productos = Producto::all();
        $contador = 0;
        for($i=0; $i<count($servicios); $i++){
            if($servicios[$i]->categoria_id == $id){
                $contador++;
            }
        }
        for($i=0; $i<count($productos); $i++){
            if($productos[$i]->categoria_id == $id){
                $contador++;
            }
        }
        $name = $categoria->cat_nombre;
        if($contador == 0){
            $categoria->delete();
            return redirect(action('CategoriasController@allx'))->with('status', "La categoría $name fué eliminada correctamente");
        }else{
            return redirect(action('CategoriasController@allx'))->with('status', "No se eliminó la categoría $name, ya que hay $contador productos/servicios con esa categoría.");
        }
        
    }
}
