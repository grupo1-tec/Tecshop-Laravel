<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;
use App\Http\Resources\Categoria as CategoriaResources;

class CategoriaControllerAPI extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return CategoriaResources::collection($categorias);
    }
    public function store(Request $request)
    {
        $categoria = Categorias::create($request->all());
        return $categoria;
    }
    public function show($id)
    {
        $categoria = Categorias::find($id);
        return new CategoriaResources($categoria);
    }
    public function update(Request $request, $id)
    {
        $categoria = Categorias::find($id);
        $categoria->update($request->all());
        return $categoria;
    }
    public function destroy($id)
    {
        $categoria = Categorias::find($id);
        $categoria->delete();
    }
}
