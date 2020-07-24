@extends('layouts.app')

<div style="margin-top:20vh"></div>
<div class="promo">
    <div class="container">
        <div class="row promo_container" style="">               
            @foreach($productos as $producto)
                <div class="col-lg-4 promo_col my-3">
                    <div class="promo_item">
                        <div class="promo_image">
                            <img title="$producto->prod_img" src="{{ asset($producto->prod_img) }}" alt="" class="round .img-responsive" style="width:100%;">                                    
                        </div>
                        <div class="promo_link"><a href="{{ action('ProductoController@show', $producto->id) }}">{{$producto->prod_nombre}}</a></div>
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
    </div>
</div>