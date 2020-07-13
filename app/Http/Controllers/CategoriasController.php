<?php

namespace App\Http\Controllers;

use App\Categorias;
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
        $categoria->cat_nombre = $nombre;
        $categoria->save();

        return redirect()->route('principal');
    }

    public function show(Categorias $categorias)
    {
        //
    }

    public function edit(Categorias $categorias)
    {
        
    }

    public function update(Request $request, Categorias $categorias)
    {
        //
    }

    public function destroy(Categorias $categorias)
    {
        //
    }
}
