@extends('layouts.app')

<div style="margin-top:20vh"></div>
<div class="promo">
    <div class="container">
        <div class="row promo_container" style="">               
            @foreach( $servicios as $servicio)
                <div class="col-lg-4 promo_col my-3">
                    <div class="promo_item">
                        <div class="promo_image">
                            <img title="$servicio->ser_img" src="{{ asset($servicio->ser_img) }}" alt="" class="round .img-responsive" style="width:100%;">                                    
                        </div>
                        <div class="promo_link"><a href="{{ action('ServiciosController@show', $servicio->id) }}">{{ $servicio->ser_nombre }}</a></div>
                        <div>
                            <form method="POST" action="{{ url("servicios/{$servicio->id}") }}">
                                @csrf
                                @method('DELETE')
                                <a type="button" class="btn btn-outline-warning" href="{{action('ServiciosController@edit', $servicio->id)}}">Editar</a>
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>