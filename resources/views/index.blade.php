


@extends('layouts.app')
    <div style="margin-top:10vh"></div>

    <div class="home_slider_container">
        <div class="owl-carousel owl-theme home_slider">

            @foreach($banner as $ban)            
                <div class="owl-item">
                    <div class="home_slider_background" style="background-image:url({{asset($ban->banner_img)}}"></div>
                    <div class="home_slider_content">
                        <div class="home_slider_content_inner">
                            <div class="home_slider_subtitle">Promo Prices</div>
                            <div class="home_slider_title">New Collection</div>
                        </div>
                    </div>
                </div>
            @endforeach          
        </div>

        <div class="home_slider_next d-flex flex-column align-items-center justify-content-center"><img src="{{asset('img/arrow_r.png')}}" alt=""></div>
    </div>

    <div class="promo">
            <div class="container">
                 @auth
                    <div class="form-group">
                        <div class="button_myProductos">
                            <a class="btn btn-dark btn-lg btn-block" href="{{ route('MiServicios') }}" role="button">Ver solo mis servicios</a>
                        </div>
                    </div>
                    </br>
                    <div class="button_createProduc">
                        <a class="btn btn-success btn-lg btn-block" href="{{ route('crearservicio') }}" role="button">Crear un servicio</a>
                    </div>
                    </br>
                @endauth
                
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <div class="section_subtitle">only the best</div>
                            <div class="section_title">Destacados</div>
                        </div>
                    </div>
                </div>                
                <div class="row promo_container">               
                    @foreach($servicios as $servicio)
                        <div class="col-lg-4 promo_col my-3">
                            <div class="promo_item">
                                <div class="promo_image">
                                    <img title="$servicio->ser_img" src="{{($servicio->ser_img)}}" alt="" class=" round .img-responsive" style="width:100%">                                    
                                </div>
                                <div class="promo_link"><a href="{{action('ServiciosController@show', $servicio->id)}}">{{$servicio->ser_nombre}}</a></div>
                                <div class="product_content clearfix">
                                    <div class="product_info">
                                        
                                        <div class="product_price">Precio:S/{{($servicio->ser_precio)}}</div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>

@extends('layouts.footer')
    
