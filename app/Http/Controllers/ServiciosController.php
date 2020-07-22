<?php

namespace App\Http\Controllers;

use App\Servicios;
use App\User;
use App\Banner;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ServiciosController extends Controller
{

    public function index()
    {
        $servicios = Servicios::all();
        $banner = Banner::all();
        #return view('index', compact('servicios','banner'));
        return view('index', compact('banner'));
    }

    public function create()
    {
        return view('createserv');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ser_nombre' => 'required:max:120',
            'ser_img' => 'required|image|mimes:jpeg,png,jpg|:max2048',
            'ser_descripcion' => 'required:max:2200',
            'ser_precio' => 'required:max:10',
        ]);

        $image = $request->file('ser_img');
        $imageName = time().$image->getClientOriginalName();
        $nombre = $request->get('ser_nombre');
        $descripcion = $request->get('ser_descripcion');
        $precio = $request->get('ser_precio');
        $userID = Auth::id();
        
        $servicio = new Servicios();
        $servicio->ser_nombre = $nombre;
        $servicio->ser_img = 'img/' . $imageName;
        $servicio->ser_descripcion = $descripcion;
        $servicio->ser_precio = $precio;
        $servicio->user_id = $userID;
        $servicio->save();

        $request->ser_img->move(public_path('img'),$imageName);

        return redirect()->route('servicio',['id' => $servicio->id]);       
    }

    public function show($id)
    {
        // $servicio = Servicios::find($id);
        // $dueño = User::find($servicio->user_id);
        // $servicios = Servicios::where('categoria_id', '=', $servicio->categoria_id)->where('_id', '<>', $id)->get()->toArray();
        // $claves_aleatorias = array();
        // if (count($servicios) < 3){
        //     if (count($servicios) === 1){
        //         array_push($claves_aleatorias, 0);
        //     }else{
        //         $claves_aleatorias = array_rand($servicios, count($servicios));
        //     }            
        // }else{
        //     $claves_aleatorias = array_rand($servicios, 3);
        // }
        // $serviciosx = array();
        // for ($i=0; $i < count($claves_aleatorias); $i++) { 
        //     $id = $servicios[$claves_aleatorias[$i]]['_id'];
        //     $servicio1 = Servicios::find($id);
        //     array_push($serviciosx, $servicio1);
        // }
        // return view('servicioUnico',['servicio' => $servicio, 'recomendados' => $servicios, 'dueño' => $dueño]);
        $servicio = Servicios::find($id);
        $dueño = User::find($servicio->user_id);
        $servicios = Servicios::where('categoria_id', '=', $servicio->categoria_id)->where('_id', '<>', $id)->get();
        return view('servicioUnico',['servicio' => $servicio, 'recomendados' => $servicios, 'dueño' => $dueño]);
    }

    public function edit(Servicios $servicios)
    {
        //
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
        return redirect()->route('servicio',['id' => $id]);
    }

    public function update(Request $request, Servicios $servicios)
    {
        //
    }

    public function userServicios()
    {
        $user_id = Auth::id();
        $servicios = Servicios::where('user_id', '=', $user_id)->get();
        return view('UserServicios', compact('servicios'));
    }

    public function destroy($id)
    {
        $servicio = Servicios::find($id);
        $servicio->delete();
        return redirect('/servicios/MiServicios');
    }
    
    public function busqueda(Request $request)
    {
        $nombreM =$request->get('buscarpor');
        if(empty($nombreM)){
            $servicios =Servicios::all();
            $banner = Banner::all();
            return view('index',compact('servicios', 'banner'));
        }else{
            $servicios =Servicios::where('ser_nombre','like',"%$nombreM%")->get();
            $banner = Banner::all();
            return view('index',compact('servicios', 'banner'));
        }
    }
}
