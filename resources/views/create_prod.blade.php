@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Nuevo Producto</h2>
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
            <form action="{{ action('ProductoController@store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-sm-2 col-form-label" for="prod_nombre">{{ __('prod_nombre') }}</label>
                    <div class="col-sm-12"> 
                        <input id="prod_nombre" class="form-control{{ $errors->has('prod_nombre') ? ' is-invalid' : '' }}" type="text" name="prod_nombre" value="{{ old('prod_nombre') }}" autofocus>
                        @if ($errors->has('prod_nombre'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('prod_nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label" for="prod_stock">{{ __('prod_stock') }}</label>
                    <div class="col-sm-12"> 
                        <textarea class="form-control{{ $errors->has('prod_stock') ? ' is-invalid' : '' }}" if="prod_stock" name="prod_stock" rows="3">{{ old('prod_stock') }}</textarea>
                        @if ($errors->has('prod_stock'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('prod_stock') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label" for="prod_precio">{{ __('prod_precio') }}</label>
                    <div class="col-sm-12"> 
                        <textarea class="form-control{{ $errors->has('prod_precio') ? ' is-invalid' : '' }}" if="prod_precio" name="prod_precio" rows="3">{{ old('prod_precio') }}</textarea>
                        @if ($errors->has('prod_precio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('prod_precio') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label" for="prod_activo">{{ __('prod_activo') }}</label>
                    <div class="col-sm-12"> 
                        <textarea class="form-control{{ $errors->has('prod_activo') ? ' is-invalid' : '' }}" if="prod_activo" name="prod_activo" rows="3">{{ old('prod_activo') }}</textarea>
                        @if ($errors->has('prod_activo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('prod_activo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="combo_categoria">Categoría</label>
                    <select class="form-control" id="combo_categoria" name="id">
                        @foreach($categorias as $categoria)
                            <option value="{{ ($categoria->id) }}" >{{ $categoria->cat_nombre }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input{{ $errors->has('prod_img') ? ' is-invalid' : '' }}" id="prod_img" name="prod_img">
                            <label class="custom-file-label" for="customFile">{{ __('choose prod_img') }}</label>
                            @if ($errors->has('prod_img'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('prod_img') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

