@extends('layouts.app')

@section('content')
<div class="container">
    @auth
    <div class="button_myPosts">
        <a class="btn btn-dark btn-lg btn-block" href="{{ route('MiServicios') }}" role="button">Ver solo mis servicios</a>
    </div>
    </br>
    <div class="button_createPost">
        <a class="btn btn-success btn-lg btn-block" href="{{ route('crearservicio') }}" role="button">Crear un servicio</a>
    </div>
    </br>
    @endauth
        @foreach($servicios as $servicio)
        <div class="row md-4 justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card card-body">
                        <h5 class="card-title">
                            <a href="{{action('ServiciosController@show', $servicio->id)}}">{{$servicio->ser_nombre}}</a>
                        </h5>
                    </div>
                    <img src="{{($servicio->ser_img)}}" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection