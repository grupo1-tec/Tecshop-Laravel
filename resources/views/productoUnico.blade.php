@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="{{asset($producto->prod_img)}}" class="card-img-top" alt="">
                    <!--<img src="{{Storage::url($producto->image)}}" class="card-img-top" alt="">-->
                    <div class="card-body">
                        <h3 class="card-title">{{$producto->prod_nombre}}</h3>
                        <h6 class="card-subtitle mb-2 text-muted">{{$producto->created_at->toFormattedDateString()}}</h6>
                        <p class="card-text">{{$producto->prod_descripcion}}</p>
                        <a href="{{action('ProductoController@index')}}" class="card-link">
                            Todas las publicaciones
                        </a>
                    </div>
                </div>
                @auth
                    <form action="{{action('ComentarioProdController@store',['producto_id' => $producto->id])}}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-sm-2 col-form-label" for="content">
                                    {{__('Comment')}}
                                </label>
                                <div class="col-sm-12">
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3">
                                        {{old('content')}}
                                    </textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{__('Create')}}
                                    </button>
                                </div>
                            </div>                    
                    </form>
                @endauth
                
                @guest
                <p>Si deseas comentar 
                    <a href="{{action('Auth\LoginController@showLoginForm')}}">inicia sesión</a> o
                    <a href="{{action('Auth\RegisterController@showRegistrationForm')}}">regístrate</a>                
                </p>
                @endguest
                
                @forelse($producto->Comentarios as $comment)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$comment->user->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$comment->created_at->toFormattedDateString()}}</h6>
                            <p class="card-text">{{$comment->Comen_texto}}</p>
                        </div>
                    </div>
                    @empty
                    <p>No hay comentarios en esta publicación, se el primero</p>
                @endforelse
            </div>
        </div>
    </div>
    @endsection