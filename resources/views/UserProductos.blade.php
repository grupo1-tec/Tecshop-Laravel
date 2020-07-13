@extends('layouts.app')

@section('content')
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
 
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection