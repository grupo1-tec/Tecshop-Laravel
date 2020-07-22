<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use App\Http\Resources\Producto as ProductoResources;

class ProductoControllerAPI extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return ProductoResources::collection($productos);
    }
    public function userproducts($id)
    {
        $productos = Producto::where('user_id',$id)->get();
        return ProductoResources::collection($productos);
    }
    public function store(Request $request)
    {
        $producto = Producto::create($request->all());
        return $producto;
    }
    public function show($id)
    {
        $producto = Producto::find($id);
        return new ProductoResources($producto);
    }
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->update($request->all());
        return $producto;
    }
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
    }
}
