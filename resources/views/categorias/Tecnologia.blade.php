
@section('tecnologia')
    <div class="container">
        @foreach($productos as $producto)
        <div class="row md-4 justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card card-body">
                        <h5 class="card-title">
                            <a href="{{action('ProductoController@show', $producto->id)}}">{{$producto->prod_nombre}}</a>
                        </h5>
                    </div>
                    <img src="{{($producto->prod_img)}}" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
        @endforeach
    </div>
@show