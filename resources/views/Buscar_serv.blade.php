@extends('layouts.app')

<div style="margin-top:20vh"></div>
    <div >
    <form class="form-inline">

        <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>

    </div>

    <div class="promo">              
                <div class="row promo_container" style="">               
                    @foreach($servicios as $servicio)
                        <div class="col-lg-4 promo_col my-3">
                            <div class="promo_item">
                                <div class="promo_image">
                                    <img src="{{($servicio->ser_img)}}" alt="" class=".img-responsive" style="width:100%">                                    
                                </div>
                                <div class="promo_link"><a href="{{action('ProductoController@show', $servicio->id)}}">{{$servicio->ser_nombre}}</a></div>
                                <div class="product_content clearfix">
                                    <div class="product_info">
                                        <div class="dervice_price">${{($servicio->ser_precio)}}</div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
