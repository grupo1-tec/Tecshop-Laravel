<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
 
    public function index()
    {
        $productos = Producto::all();
        return view('index2', compact('productos'));
    }


    public function create()
    {
        return view('create_prod');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'prod_nombre' => 'required:max:120',
            'prod_img' => 'required|image|mimes:jpeg,png,jpg|:max2048',
            'prod_stock' => 'required:max:1000',
            'prod_precio' => 'required:max:10',
            'prod_activo' => 'required:max:10', 
        ]);

        $image = $request->file('prod_img');
        $imageName = time().$image->getClientOriginalName();
        $nombre = $request->get('prod_nombre');
        $stock = $request->get('prod_atock');
        $precio = $request->get('prod_precio');
        $activo = $request->get('prod_activo');
        $categoria = $request->get('id');
        $userID = Auth::id();

        $producto = new Producto();
        $producto->prod_nombre = $nombre;
        $producto->prod_img = 'img/' . $imageName;
        $producto->prod_stock = $stock;
        $producto->prod_precio = $precio;
        $producto->prod_activo = $activo;
        $producto->user_id = $userID;
        $producto->categoria_id = $categoria;
        $producto->save();

        $request->prod_img->move(public_path('img'),$imageName);

        return redirect()->route('producto',['id' => $producto->id]);
    }

    public function show($id)
    {
        return view('productoUnico',['producto' => Producto::find($id)]);
    }

    public function edit(Producto $producto)
    {
        //
    }

    public function update(Request $request, Producto $producto)
    {
        //
    }


    public function userProductos()
    {
        $user_id = Auth::id();
        $productos = Producto::where('user_id', '=', $user_id)->get();
        return view('UserProductos', compact('productos'));
    }

    public function CatProductos()
    {
        $categoria = '5f092fa424739a71cd4380ab';
        $productos = Producto::where('cat_id', '=', $categoria)->get();
        return view('categorias.Tecnologia', compact('productos'));
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        $producto->delete();
        return redirect('/productos/MiProductos');
    }
}

