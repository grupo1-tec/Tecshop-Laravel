<?php

namespace App\Http\Controllers;

use App\Comentario_prod;
use App\Producto;
use Illuminate\Http\Request;

class ComentarioProdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'content'=>'required:max:250',
        ]);

        $comment = new Comentario_prod();
        $comment->user_id = $request->user()->id;
        $comment->Comen_texto = $request->get('content');

        $producto = Producto::find($request->get('producto_id'));
        $producto->Comentarios()->save($comment);

        return redirect()->route('producto',['id'=>$request->get('producto_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario_prod  $comentario_prod
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario_prod $comentario_prod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentario_prod  $comentario_prod
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario_prod $comentario_prod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario_prod  $comentario_prod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario_prod $comentario_prod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario_prod  $comentario_prod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario_prod $comentario_prod)
    {
        //
    }
}
