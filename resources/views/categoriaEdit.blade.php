@extends('layouts.app')

    <div style="margin-top:20vh"></div>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="col-sm-8 col-form-label" for="cat_nombre">{{ __('Nombre de la categoría: ') }}</label>
                <div class="col-sm-12"> 
                    <input id="cat_nombre" class="form-control{{ $errors->has('cat_nombre') ? ' is-invalid' : '' }}" type="text" name="cat_nombre" value="{{ $categoria->cat_nombre }}" autofocus>
                    <input id="cat_id" name="cat_id" type="hidden" value="{{ $categoria->id }}">
                    @if ($errors->has('cat_nombre'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('cat_nombre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Guardar') }}
                        </button>
                    </div>
                </div>
            </div>
        <form>
    </div>
