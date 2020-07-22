<?php

namespace App\Http\Controllers;

use App\Servicios;
use Illuminate\Http\Request;
use App\Http\Resources\Servicio as ServicioResources;

class ServicioControllerAPI extends Controller
{
    public function index()
    {
        $servicios = Servicios::all();
        return ServicioResources::collection($servicios);
    }
    public function userservices($id)
    {
        $servicios = Servicios::where('user_id',$id)->get();
        return ServicioResources::collection($servicios);
    }
    public function store(Request $request)
    {
        $servicio = Servicios::create($request->all());
        return $servicio;
    }
    public function show($id)
    {
        $servicio = Servicios::find($id);
        return new ServicioResources($servicio);
    }
    public function update(Request $request, $id)
    {
        $Servicio = Servicios::find($id);
        $Servicio->update($request->all());
        return $Servicio;
    }
    public function destroy($id)
    {
        $Servicio = Servicios::find($id);
        $Servicio->delete();
    }
}
