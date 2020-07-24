@extends('layouts.app')
    <div style="margin-top:20vh"></div>
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach

                {!! csrf_field() !!}
                <fieldset>
                    <div class="col-md-10">
                        <legend class="text-center">Editar Usuario</legend>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-lg-label">Imagen</label>
                        <div class="col-md-10">
                            <li class="review clearfix" style="list-style:none;margin:0">
                                <div class="review_image">
                                    @if($usuario->user_img !="")
                                        <img src="{{asset($usuario->user_img)}}" alt="">
                                    @else
                                        <img src="{{asset('img/users/unnamed.jpg')}}" alt="">
                                    @endif
                                </div>
                                <div class="review_content">
                                    <div class="review_text">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input " id="user_img" name="user_img" >
                                            <label class="custom-file-label" for="customFile">Imagen</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>
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
                            <input type="date" class="form-control" id="fechaNac" name="fechaNac" value="{!!  $usuario->fechaNac !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono" class="col-lg-label">Telefono</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="telefono" name="telefono" value="{!!  $usuario->telefono !!}">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="telefono" class="col-lg-label">Tipo de Documento</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="documento_tipo" name="documento_tipo" >     
                            @if($usuario->documento_tipo=="")
                                <option value="DNI" >DNI</option>
                                <option value="RUC" >RUC</option>
                            @else
                                <option value="{{$usuario->documento_tipo}}">{{$usuario->documento_tipo}}</option>
                                @if ($usuario->documento_tipo=="DNI")
                                    <option value="RUC" >RUC</option>
                                @else
                                    <option value="DNI" >DNI</option>
                                @endif
                            @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="documento_nro" class="col-lg-label">NRO de Documento</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="documento_nro" name="documento_nro" value="{!!  $usuario->documento_nro !!}">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2 d-flex justify-content-center">
                            <a class="btn btn-dange" href="{{ url('/') }}" role="button">Cancelar</a>
                            <button type="submit" class="btn btn-dark">Actualizar</button>
                        </div>
                    </div>
                     
                </fieldset>
            </form>
        </div>
    </div>
