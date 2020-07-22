<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta property="og:title" content="TecShop">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://tecshoop.gq/">
    <meta property="og:image" content="">
    <meta propety="og:description" content="Mi sitio web">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tecshop- Aplicación para emprendedores y vendedores</title>
    <meta description="Hola">


    
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}" defer></script>
    <script src="{{ asset('plugins/easing/easing.js') }}" defer></script>
    <script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}" defer></script>
    <script src="{{ asset('plugins/colorbox/jquery.colorbox-min.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

   

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/colorbox/colorbox.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/main_styles.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/responsive.css') }}" rel="stylesheet">
    
    

    <link href="{{ asset('styles/product.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/product_responsive.css') }}" rel="stylesheet">

    


    
    
</head>


<body>
    
    <div id="app" class="super_container">
    	<header class="header">
			<div class="header_inner d-flex flex-row align-items-center justify-content-start">
				<div class="logo"><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></div>
				<nav class="main_nav">
					<ul>
						<li><a href="/productos">Productos</a></li>
						<li><a href="/servicios">Servicios</a></li>					
					</ul>
				</nav>
				<div class="header_content">
					<div class="search header_search">
						<form action="#">
							<input type="search" class="search_input">
							<button type="submit" id="search_button" class="search_button" ><img src="{{asset('img/magnifying-glass.svg')}}" alt=""></button>
						</form>
					</div>
					<div></div>
				</div>
				
				<div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
			</div>
		</header>
        
		<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
			<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
			<div class="logo menu_mm"><a href="#">TecShop</a></div>
			<div class="search">
				<form action="#">
					<input name="buscarpor" type="search" class="search_input menu_mm" >
					<button type="submit" id="search_button_menu" class="search_button menu_mm"><img class="menu_mm" src="{{asset('img/magnifying-glass.svg')}}" alt=""></button>
                </form>
			</div>
            @auth
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Notificaciones <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @foreach(Auth::user()->unreadNotifications as $notification)
                        @if($notification->data['tipo']=="servicio")
                            <a class="dropdown-item" href="{{ action('ServiciosController@read',['id'=> $notification->data['post'], 'idn'=>$notification->_id]) }}">
                                <div class="review_image">
                                    @if(App\User::find($notification->data["user"]) !="")
                                        <img src="{{asset(App\User::find($notification->data['user'])->user_img)}}" alt="">
                                    @else
                                        <img src="{{asset('img/users/unnamed.jpg')}}" alt="">
                                    @endif
                                </div>
                                <div class="review_content">
                                    <div class="review_text">
                                        {{ App\User::find($notification->data["user"])->name }} comentó la publicación de tu servicio.
                                    </div>
                                </div>
                            </a>
                        @else
                            <a class="dropdown-item" href="{{ action('ProductoController@read',[ 'id'=>$notification->data['post'],'idn'=> $notification->_id] )}}">
                                <div class="review_image">
                                    @if(App\User::find($notification->data["user"]) !="")
                                        <img src="{{asset(App\User::find($notification->data['user'])->user_img)}}" alt="">
                                    @else
                                        <img src="{{asset('img/users/unnamed.jpg')}}" alt="">
                                    @endif
                                </div>
                                <div class="review_content">
                                    <div class="review_text">
                                {{ App\User::find($notification->data["user"])->name }} comentó la publicación de tu producto.
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                    <a class="dropdown-item" href="{{ action('UserController@notificate') }}">
                        Mostrar todas las notificaciones
                    </a>
                </div>
            </li>
            @endauth
			<nav class="menu_nav navbar">
				<ul class="menu_mm navbar-nav">
                    @auth
                        @if (Auth::user()->admin == "true")
                            <li class="menu_mm nav-item dropdown">
                                <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Administrador') }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                                    <a class="dropdown-item" href="/administrador/create">Crear Admin</a>
                                    <a class="dropdown-item" href="/categoria/create">Crear Categoria</a>
                                    <a class="dropdown-item" href="/usuarios/eliminar">Eliminar Usuario</a>                                     
                                    <a class="dropdown-item" href="/categorias/admin">Categorias</a>
                                    <a class="dropdown-item" href="/administrar/banner">Administrar Banner</a>                                    
                                </div>
                            </li>
                        @endif
                    @endauth
                    @guest
                        <li class="menu_mm"><a href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a></li>
                            @if (Route::has('register'))
                                <li class="menu_mm"><a href="{{ route('register') }}">{{ __('Registrarse') }}</a></li>
                            @endif
                        <li class="menu_mm"><a href="/productos">Productos</a></li>
						<li class="menu_mm"><a href="/servicios">Servicios</a></li>	
                    @else
                        <li class="menu_mm"><a href="/productos">Productos</a></li>
						<li class="menu_mm"><a href="/servicios">Servicios</a></li>	
                        <li class="menu_mm"><a href="#">{{ Auth::user()->name }}</a></li>
                        <li class="menu_mm"><a href="/usuario/editar">Editar usuario</a></li>
                        <li class="menu_mm">
                            <a  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" 
                                href="{{ route('logout') }}">{{ __('Salir') }}</a></li>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>                       
                    @endguest
				</ul>
			</nav>            
		</div>
	</div>
    
</body>
</html>


