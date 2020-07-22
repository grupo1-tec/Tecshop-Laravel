<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="footer_logo"><a href="#">TecShop</a></div>
                    <nav class="footer_nav">
                        <ul>
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Productos</a></li>
                            <li><a href="#">Servicios</a></li>
                            <li><a href="#">Manual</a></li>
                            <li><a href="#">Acerca de nosotros</a></li>
                        </ul>
                    </nav>
                    <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Arequipa-Perú <i class="fa fa-heart-o" aria-hidden="true"></i><a href="https://www.tecsup.edu.pe/" target="_blank"> Tecsup-Sur</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <br><small>Esta página es de prueba y no es comercial, los datos son de prueba</small>
                </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>