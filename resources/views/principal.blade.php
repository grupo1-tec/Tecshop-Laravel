@extends('layouts.app')
    <!-- CSS Slide Swiper -->
    <link rel="stylesheet" href="/Swiper-Styles/css/style.css">
    <link rel="stylesheet" href="/Swiper-Styles/css/swiper.min.css">
    <!-- Booststrap -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

<div style="margin-top:20vh"></div>

<div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    <!---<a href="https://www.iubenda.com/privacy-policy/10847712" class="iubenda-black iubenda-embed" title="Privacy Policy ">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
    <br>
    <a href="https://www.iubenda.com/condiciones-de-uso/10847712" class="iubenda-black iubenda-embed" title="Condiciones de Uso ">Condiciones de Uso</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>    
    -->
</div>

<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <p hidden>{{$x = 0}}</p>
        @foreach ($banner as $ban)
            @if ($x == 0)
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            @else
                <li data-target="#carouselExampleCaptions" data-slide-to="{{$x}}"></li>
            @endif
            <p hidden>{{$x++}}</p>
        @endforeach
        </ol>
        <div class="carousel-inner">
        <p hidden>{{$p = 1}}</p>
        @foreach ($banner as $ban)
            @if ($p == 1)
                <div class="carousel-item active">
                <img src="{{asset($ban->banner_img)}}" alt="..."  width="100%">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$ban->title}}</h5>
                    <p>{{$ban->subtitle}}</p>
                </div>
                </div>
            @else
                <div class="carousel-item">
                <img src="{{asset($ban->banner_img)}}" alt="..." width="100%">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$ban->title}}</h5>
                    <p>{{$ban->subtitle}}</p>
                </div>
                </div>
            @endif
            <p hidden>{{$p++}}</p>
        @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<div class="heading">
    <h1>P R O D U C T &emsp; F O R &emsp; C A T E G O R Y</h1>
</div>
@foreach($categorias as $categoria)
<div class="heading">
        <h1>{{$categoria->cat_nombre}}</h1>
    </div>
<div class="ContenedorProductos" style="background-image: url('img/fondo4.jpg'); border-radius: 5px;">
    
    <div class="swiper-container">
        <div class="swiper-wrapper">
        @foreach($productos as $producto)
            @if ($producto->categoria_id === $categoria->id)
            <!-- slide 1-------------------------------->
            <div class="swiper-slide">
                <div class="slider-box">
                    <a href="{{ action('ProductoController@show', $producto->id) }}" class="time">{{$producto->prod_nombre}}</a>
                    <div class="img-box">
                        <img src="{{asset($producto->prod_img)}}" alt="">
                    </div> 
                    <p class="detail">{{substr($producto->prod_descripcion,0,80)}}
                        <a href="{{ action('ProductoController@show', $producto->id) }}" class="price"> Price-{{$producto->prod_precio}}$</a>
                    </p>
                    <div class="cart">
                        <a href="{{ action('ProductoController@show', $producto->id) }}">Ver más</a>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div> 

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    
    </div>
    <!-- Swiper Slider end -->
</div>
<br>
@endforeach


<!-- Swiper Slider 2 cellphones -------->
    <div class="heading">
        <h1>P R O D U C T &emsp; S E R V I C E &emsp; 2</h1>
    </div>
<div class="ContenedorProductos" style="background-image: url('img/fondo4.jpg'); border-radius: 5px;">
    <div class="swiper-container">
        <div class="swiper-wrapper">
        @foreach($servicios as $servicio)
            <!-- slide 1------------------------------ -->
            <div class="swiper-slide">
                <div class="slider-box">
                    <p class="time">{{$servicio->ser_nombre}}</p>
                    <div class="img-box">
                        <img src="{{asset($servicio->ser_img)}}" alt="">
                    </div> 
                    <p class="detail">{{substr($servicio->ser_descripcion,0,80)}}
                    <a href="{{ action('ServiciosController@show', $servicio->id) }}" class="price"> Price-{{$servicio->ser_precio}}$</a>
                    </p>
                    <div class="cart">
                        <a href="{{ action('ServiciosController@show', $servicio->id) }}">Ver mas</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    </div>
    <!-- Swiper Slider end -->
</div>


@extends('layouts.footer')






<script type="text/javascript" src="/Swiper-Styles/js/swiper.min.js"></script>
<script type="text/javascript" src="/Swiper-Styles/js/script.js"></script>
<!-- Js Booststrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--  /Booststrap -->