<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Banner; 
use App\User;
use App\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->only(['create','edit']);
    }

    public function index()
    {
        $productos = Producto::all();
        $banner = Banner::all();
        return view('index2', compact('productos','banner'));
    }


    public function create()
    {
        return view('create_prod');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'prod_nombre' => 'required:max:120',
            'prod_descripcion' => 'required:max:500',
            'prod_img' => 'required|image|mimes:jpeg,png,jpg|:max2048',
            'prod_stock' => 'required:max:1000',
            'prod_precio' => 'required:max:10',
        ]);

        $image = $request->file('prod_img');
        $imageName = time().$image->getClientOriginalName();
        $nombre = $request->get('prod_nombre');
        $descripcion = $request->get('prod_descripcion');
        $stock = $request->get('prod_stock');
        $precio = $request->get('prod_precio');
        $categoria = $request->get('id');
        $userID = Auth::id();

        $producto = new Producto();
        $producto->prod_nombre = $nombre;
        $producto->prod_descripcion = $descripcion;
        $producto->prod_img = 'img/' . $imageName;
        $producto->prod_stock = $stock;
        $producto->prod_precio = $precio;
        $producto->user_id = $userID;
        $producto->categoria_id = $categoria;
        $producto->save();
        $request->prod_img->move(public_path('img'),$imageName);

        return redirect()->route('producto',['id' => $producto->id]);
    }

    public function show($id)
    {
        // $producto = Producto::find($id);
        // $dueño = User::find($producto->user_id);
        // $productos = Producto::where('categoria_id', '=', $producto->categoria_id)->where('_id', '<>', $id)->get()->toArray();
        // $claves_aleatorias = array_rand($productos, 3);
        // $productosx = array();
        // for ($i=0; $i < count($claves_aleatorias); $i++) { 
        //     $id = $productos[$claves_aleatorias[$i]]['_id'];
        //     $producto1 = Producto::find($id);
        //     array_push($productosx, $producto1);
        // }
        // return view('productoUnico',['producto' => $producto, 'recomendados' => $productos, 'dueño' => $dueño]);
        $producto = Producto::find($id);
        $dueño = User::find($producto->user_id);
        $productos = Producto::where('categoria_id', '=', $producto->categoria_id)->where('_id', '<>', $id)->get();
        return view('productoUnico',['producto' => $producto, 'recomendados' => $productos, 'dueño' => $dueño]);
    }

    public function read($id,$idn){
        $user=Auth::user();
        $n="";
        foreach($user->unreadNotifications as $notification){
            if(strcmp($notification->_id,$idn) === 0){
                $n=$notification;
                break;
            }
        }
        $n->markAsRead();
        return redirect()->route('producto',['id'=>$id]);
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categorias::all();
        $categoriax = Categorias::find($producto->categoria_id);
        return view('edit_producto', compact('producto', 'categorias', 'categoriax'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prod_nombre' => 'required:max:120',
            'prod_descripcion' => 'required:max:500',
            'prod_stock' => 'required:max:1000',
            'prod_precio' => 'required:max:10',
        ]);
        
        $nombre = $request->get('prod_nombre');
        $descripcion = $request->get('prod_descripcion');
        $stock = $request->get('prod_stock');
        $precio = $request->get('prod_precio');
        $categoria = $request->get('id');
        
        $producto = Producto::find($id);
        $producto->prod_nombre = $nombre;
        $producto->prod_descripcion = $descripcion;
        $producto->prod_stock = $stock;
        $producto->prod_precio = $precio;
        $producto->categoria_id = $categoria;

        if($request->file('prod_img')){
            if($producto->prod_img != ""){
                $name="/home/ubuntu/Workplace/TecShop/Laravel/tecshop/public/".$producto->prod_img;
                unlink($name);
            }
            $image=$request->file('prod_img');
            $imageName =time().$image->getClientOriginalName();
            $image->move(public_path('img/'),$imageName);
            $$producto->prod_img="img/".$imageName;
        }

        $producto->save();
        return redirect(action('ProductoController@edit',$producto->id))->with('status', 'El Producto ha sido actualizado');
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

    public function categoria_productos($cat_id)
    {
        $productos = Producto::where('categoria_id', '=', $cat_id)->get();
        return view('categoria', compact('productos'));
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        $producto->delete();
        return redirect('/productos/MiProductos');
    }

    public function busqueda(Request $request)
    {
        $nombreM =$request->get('buscarpor');
        if(empty($nombreM)){
            $productos =Producto::all();
            return view('index2',compact('productos'));
        }else{
            $productos =Producto::where('prod_nombre','like',"%$nombreM%")->get();
            return view('index2',compact('productos'));
        }
    }
}

