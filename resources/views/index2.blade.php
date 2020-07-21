
@extends('layouts.app')

@section('content')
    <div class="container">
    @auth
    <div class="form-group">
        <div class="button_myProductos">
            <a class="btn btn-dark btn-lg btn-block" href="{{ route('MiProductos') }}" role="button">Ver solo mis productos</a>
        </div>
    </div>
    </br>
    <div class="button_createProduc">
        <a class="btn btn-success btn-lg btn-block" href="{{ route('crearproducto') }}" role="button">Crear un Producto</a>
    </div>
    </br>
    @endauth
        @foreach($productos as $producto)
        <div class="row md-4 justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card card-body">
                        <h5 class="card-title">
                            <a href="{{action('ProductoController@show', $producto->id)}}">{{$producto->prod_nombre}}</a>
                        </h5>
                    </div>
                    <img src="{{($producto->prod_img)}}" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection