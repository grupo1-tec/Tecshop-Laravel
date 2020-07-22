<?php

namespace App\Http\Controllers;

use App\Comentario_serv;
use App\Servicios;
use Illuminate\Http\Request;
use App\Notifications\newComment;

class ComentarioController extends Controller
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

        $comment = new Comentario_serv();
        $comment->user_id = $request->user()->id;
        $comment->Comen_texto = $request->get('content');

        $servicio = Servicios::find($request->get('servicio_id'));
        $user=$servicio->user()->get()[0];
        // $user->notify(new newComment("servicio",$request->user(),$servicio));
        if ($comment->user_id != $servicio->user_id){
            $user->notify(new newComment("servicio",$request->user(),$servicio));
        }
        $servicio->Comentarios()->save($comment);

        return redirect()->route('servicio',['id'=>$request->get('servicio_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
