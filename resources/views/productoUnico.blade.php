@extends('layouts.app')
   

    <div style="margin-top:20vh"></div>
    <div class="container">

        <div class="row" style="margin-bottom:-50px">
            <div class="col">
                <div class="current_page">
                    <ul>
                        <li><a href="{{action('ProductoController@busqueda')}}" class="badge badge-light p-2">
                                <h3> Ver todos los productos</h3>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product_row">

            <div class="col-lg-7">
                <div class="product_image">
                    <div class="product_image_large"><img src="{{asset($producto->prod_img)}}" alt="" class=".img-responsive" style="width:100%"></div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="product_content">
                    <h2 class="product_name" style="font-weight: bold; line-height: 150%">{{$producto->prod_nombre}}</h2>
                    <div class="review_date">{{$producto->created_at->toFormattedDateString()}}</div>
                    
                    <div class="product_text">
                        <p>{{$producto->prod_descripcion}}</p>
                    </div>
                    <br>
                    <div class="product_price"><h6>S/{{($producto->prod_precio)}}</h6></div>						
                    
                    <div class="product_price"><h6>Stock: {{($producto->prod_stock)}}</h6></div>  
                    <br>
                    <div class="product_price"><h6>Anunciante: {{($dueño->name)}}</h6></div>
                    @if (is_null($dueño->email))
                    @else
                    <div class="product_price"><h6>Correo: {{($dueño->email)}}</h6></div>
                    @endif
                   
                    <div class="product_price"><h6>Teléfono: {{($dueño->telefono)}}</h6></div>                             
                    
                </div>
            </div>
        </div>

        @auth
           <div class="row">
				<div class="col">
					<div class="review_form_container">
						<div class="review_form_title">{{__('Comment')}}</div>
						<div class="review_form_content">
							<form action="{{action('ComentarioProdController@store',['producto_id' => $producto->id])}}" id="review_form" class="review_form"
                                method="POST" enctype="multipart/form-data">
                                @csrf

								<div class="d-flex flex-md-row flex-column align-items-start justify-content-between">
                                    <textarea class="form-control @error('content') is-invalid @enderror review_form_text" id="content" name="content">
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
                            @forelse($producto->Comentarios as $comment)
                                <li class=" review clearfix">
                                    <div class="review_image">
                                        @if($comment->user->user_img !="")
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

        


        <br><br><br><br>
       
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
                        <div class="gallery_text text-center">Tal vez le interese estos productos relacionados</div>
                    </div>
                </div>
            </div>
            <div class="gallery_slider_container">

                <!-- Gallery Slider -->
                <div class="owl-carousel owl-theme gallery_slider">

                    <!-- Gallery Item -->
                    @foreach($recomendados as $producto)
                        <div class="">
                            <a class="colorbox" href="{{action('ProductoController@show', $producto->id)}}">
                                <img src="{{asset($producto->prod_img)}}" alt="">
                            </a>
                            <div class="promo_link"><a href="{{action('ProductoController@show', $producto->id)}}">{{$producto->prod_nombre}}</a></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@extends('layouts.footer')