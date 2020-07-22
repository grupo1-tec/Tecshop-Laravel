<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Producto;
use App\Servicios;
use App\Categorias;
use Illuminate\Http\Request;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view('Banner', compact('banner'));
    }

    public function all()
    {
        $banner = Banner::all();
        $productos = Producto::all();
        $servicios = Servicios::all();
        $categorias = Categorias::all();
        return view('principal', ['banner'=>$banner, 'productos'=>$productos, 'servicios'=>$servicios, 'categorias'=>$categorias]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner_img' => 'required|image|mimes:jpeg,png,jpg|:max2048',
            'title'      => 'required:max:20',
            'subtitle'   => 'required:max:40',

        ]);

        $title     = $request->get('title');
        $subtitle  = $request->get('subtitle');
        $image     = $request->file('banner_img');
        $imageName = time().$image->getClientOriginalName();

        $banner = new Banner();
        $banner->title      = $title;
        $banner->subtitle   = $subtitle;
        $banner->banner_img = 'img/banner/' . $imageName;
        $banner->save();

        $request->banner_img->move(public_path('img/banner'),$imageName);

        return redirect('/administrar/banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Banner::find($id);
        $categoria->delete();
        $image_path = $categoria->banner_img;
        unlink($image_path);
        return redirect('/administrar/banner');
    }
}
