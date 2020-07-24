@extends('layouts.app')
   

    <div style="margin-top:20vh"></div>
    <div class="container">

        <div class="row" style="margin-bottom:-50px">
            <div class="col">
                <div class="current_page">
                    <ul>
                        <li><a href="{{action('ServiciosController@busqueda')}}" class="badge badge-light">
                                <h3> Ver todos los servicios</h3>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product_row">

            <div class="col-lg-7">
                <div class="product_image">
                    <div class="product_image_large"><img src="{{asset($servicio->ser_img)}}" alt="" class=".img-responsive" style="width:100%"></div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="product_content">
                    <h2 class="product_name" style="font-weight: bold">{{$servicio->ser_nombre}}</h2>
                    <div class="review_date">{{$servicio->created_at->toFormattedDateString()}}</div>
                    <br>
                    <div class="product_price">S/{{$servicio->ser_precio}}</div>
                    <div class="product_price">Correo del dueño: {{($dueño->email)}}</div>
                    <div class="product_price">Teléfono del dueño: {{($dueño->telefono)}}</div>						                 
                    <div class="product_text">
                        <p>{{$servicio->ser_descripcion}}</p>
                    </div>
                </div>
            </div>
        </div>

        @auth
           <div class="row">
				<div class="col">
					<div class="review_form_container">
						<div class="review_form_title">{{__('Comment')}}</div>
						<div class="review_form_content">
							<form action="{{action('ComentarioController@store',['servicio_id' => $servicio->id])}}" id="review_form" class="review_form"
                                method="POST" enctype="multipart/form-data">
                                @csrf

								<div class="d-flex flex-md-row flex-column align-items-start justify-content-between">
                                    <textarea class="form-control @error('content') is-invalid @enderror review_form_text" id="content" name="content" placeholder="Comentario">
                                        {{old('content')}}
                                    </textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
								</div>								
								<button type="submit" class="btn btn-secondary review_form_button">Crear</button>
							</form>
						</div>
					</div>
				</div>
			</div>
        @endauth
        
        @guest
            <p>Si deseas comentar 
                <a href="{{action('Auth\LoginController@showLoginForm')}}">inicia sesión</a> o
                <a href="{{action('Auth\RegisterController@showRegistrationForm')}}">regístrate</a>                
            </p>
        @endguest

       
        <div class="row">
            <div class="col">
                <div class="reviews">
                    <div class="reviews_title"><h3 style="font-weight:200">Comentarios</h3></div>
                    <div class="reviews_container">
                        <ul>
                            @forelse($servicio->Comentarios as $comment)
                                <li class=" review clearfix">
                                    <div class="review_image">
                                        @if($comment->user->user_img != "")
                                            <img src="{{asset($comment->user->user_img)}}" alt="">
                                        @else
                                            <img src="{{asset('img/users/unnamed.jpg')}}" alt="">
                                        @endif
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name"><a href="#">{{$comment->user->name}}</a></div>
                                        <div class="review_date">{{$comment->created_at->toFormattedDateString()}}</div>

                                        <div class="review_text">
                                            <p>{{$comment->Comen_texto}}</p>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <p>No hay comentarios en esta publicación, se el primero</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>          
    </div>

    <div class="super_container">
        <div class="gallery">
            <div class="gallery_image" style="background-image:url({{asset('img/backgrounds/gallery.jpg')}})"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="gallery_title text-center">
                            <ul>
                                <li><a href="#"><h1>RELACIONADOS</h1></a></li>
                            </ul>
                        </div>
                        <div class="gallery_text text-center">Tal vez le interese estos servicios relacionados</div>
                    </div>
                </div>
            </div>
            <div class="gallery_slider_container">

                <!-- Gallery Slider -->
                <div class="owl-carousel owl-theme gallery_slider">

                    <!-- Gallery Item -->
                    @foreach($recomendados as $servicio)
                        <div class="">
                            <a class="colorbox" href="{{action('ServiciosController@show', $servicio->id)}}">
                                <img src="{{asset($servicio->ser_img)}}" alt="">
                            </a>
                            <div class="promo_link"><a href="{{action('ServiciosController@show', $servicio->id)}}">{{$servicio->ser_nombre}}</a></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@extends('layouts.footer')