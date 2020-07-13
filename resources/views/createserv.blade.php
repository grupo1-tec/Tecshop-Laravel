@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Nuevo Servicio</h2>
        </div>
        
        <div class="row justify-content-center">
            @if (count($errors) > 0)
                <div class="row alert alert-danger">
                    <p>¡Opss! Hubo problemas con los datos proporcionados</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            <form action="{{ action('ServiciosController@store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-sm-8 col-form-label" for="ser_nombre">{{ __('Nombre de su servicio: ') }}</label>
                    <div class="col-sm-12"> 
                        <input id="ser_nombre" class="form-control{{ $errors->has('ser_nombre') ? ' is-invalid' : '' }}" type="text" name="ser_nombre" value="{{ old('ser_nombre') }}" autofocus>
                        @if ($errors->has('ser_nombre'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('ser_nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-form-label" for="ser_descripcion">{{ __('Descripción de su servicio: ') }}</label>
                    <div class="col-sm-12"> 
                        <textarea class="form-control{{ $errors->has('ser_descripcion') ? ' is-invalid' : '' }}" if="ser_descripcion" name="ser_descripcion" rows="3">{{ old('ser_descripcion') }}</textarea>
                        @if ($errors->has('ser_descripcion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ser_descripcion') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-form-label" for="ser_precio">{{ __('Precio: ') }}</label>
                    <div class="col-sm-12"> 
                        <textarea class="form-control{{ $errors->has('ser_precio') ? ' is-invalid' : '' }}" if="ser_precio" name="ser_precio" rows="3">{{ old('ser_precio') }}</textarea>
                        @if ($errors->has('ser_precio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ser_precio') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input{{ $errors->has('ser_img') ? ' is-invalid' : '' }}" id="ser_img" name="ser_img">
                            <label class="custom-file-label" for="customFile">{{ __('Escoja una imagen...') }}</label>
                            @if ($errors->has('ser_img'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ser_img') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="combo_categoria">Categoría</label>
                        <select class="form-control" id="combo_categoria" name="id">
                            @foreach($categorias as $categoria)
                                <option value="{{ ($categoria->id) }}" >{{ $categoria->cat_nombre }}</option>
                            @endforeach
                        </select>
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
            </form>
        </div>
    </div>
@endsection