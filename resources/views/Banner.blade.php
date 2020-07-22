@extends('layouts.app')


<div style="margin-top:20vh"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="container text-center">
                        <h1>Administrar Banner</h1>
                    </div>
                </div>
                <br>
                <div id="visorArchivo"  align="center">
                   <!-- Aqui se despliega el preview -->
                </div>
                    
                <div class="card-body">
                    <form action="{{ action('BannerController@store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $title }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subtitle" class="col-md-4 col-form-label text-md-right">{{ __('Subtitulo') }}</label>

                            <div class="col-md-6">
                                <input id="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle') }}" required autocomplete="subtitle" autofocus>

                                @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right"></label>
                            <div class="col-md-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input{{ $errors->has('banner_img') ? ' is-invalid' : '' }}" id="banner_img" name="banner_img" onchange="return validarExt()" >
                                    <label class="custom-file-label" for="customFile">Imagen</label>
                                    @if ($errors->has('banner_img'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('banner_img') }}</strong>
                                        </span>
                                    @endif
                                </div>    
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    <form>
                    
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <h1 align="center"> Imagenes actuales en el banner</h1>
    @forelse($banner as $ban)
        <div class="row mb-4 justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <img src="{{asset($ban->banner_img)}}" class="card-img-top" alt="...">
                    @if (Auth::user()->admin == "true")
                        <a href="{{ action('BannerController@destroy', $ban->id)}}" class="card-link">Eliminar banner</a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        @if (Auth::check())
            <p>No hay imagenes en el banner</p>
        @endif
    @endforelse
</div>



    
<script type="text/javascript" src="/js/carga.js"></script>