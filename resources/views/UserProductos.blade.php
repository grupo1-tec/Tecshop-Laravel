@extends('layouts.app')

<div style="margin-top:20vh"></div>
<div class="container">
    @foreach( $productos as $producto)
    <div class="row mb-4 justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ action('ProductoController@show', $producto->id) }}">{{ $producto->prod_nombre }}</a>
                    </h5>
                </div>
                <img src="{{ asset($producto->prod_img) }}" class="card-img-top" alt="...">
            </div>
            <div>
                <form method="POST" action="{{ url("productos/{$producto->id}") }}">
                    @csrf
                    @method('DELETE')
                    <a type="button" class="btn btn-outline-warning" href="{{action('ProductoController@edit', $producto->id)}}">Editar</a>
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
