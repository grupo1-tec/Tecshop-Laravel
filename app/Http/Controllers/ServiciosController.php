<?php

namespace App\Http\Controllers;

use App\Servicios;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ServiciosController extends Controller
{

    public function index()
    {
        $servicios = Servicios::all();
        return view('index', compact('servicios'));
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
        return view('servicioUnico',['servicio' => Servicios::find($id)]);
    }

    public function edit(Servicios $servicios)
    {
        //
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
    
}
