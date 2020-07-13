@extends('layouts.app')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post">
            @csrf
            @method('PUT')
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                {!! csrf_field() !!}
                <fieldset>
                    <legend>Editar Usuario</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name" value="{!!  $usuario->name !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-lg-label">Email</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="email" name="email" value="{!!  $usuario->email !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fechaNac" class="col-lg-label">Fecha de Nacimineto</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="fechaNac" name="fechaNac" value="{!!  $usuario->fechaNac !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono" class="col-lg-label">Telefono</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="telefono" name="telefono" value="{!!  $usuario->telefono !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="documento_tipo" class="col-lg-label">Tipo de Documneto</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="documento_tipo" name="documento_tipo" value="{!!  $usuario->documento_tipo !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="documento_nro" class="col-lg-label">NRO de Documento</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="documento_nro" name="documento_nro" value="{!!  $usuario->documento_nro !!}">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a class="btn btn-dange" href="{{ route('productosindex') }}" role="button">Cancelar</a>
                            <button type="submit" class="btn btn-dark">Actualizar</button>
                        </div>
                    </div>
                     
                </fieldset>
            </form>
        </div>
    </div>
@endsection