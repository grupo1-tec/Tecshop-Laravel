
@extends('layouts.app')

    <div style="margin-top:20vh"></div>
    <div class="container">
        <div class="row md-4 justify-content-md-center">
        @foreach($usuarios as $usuario)
            @if ($usuario->admin == 'true')
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header text-white bg-primary">Administrador
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-award-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 0l1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
                        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                        </svg>
                    </div>
                    <div class="card-body text-primary">
                        <h3 class="card-title">{{$usuario->name}}</h3>
                        <h4>
                            Email: {{$usuario->email}}
                        </h4>
                        <h4>
                            Fecha de Nacimiento:{{$usuario->fechaNac}}
                        </h4>
                        <h4>
                            Telefono: {{$usuario->telefono}}
                        </h4>
                        <h4>
                            Tipo de Domumento: {{$usuario->documento_tipo}}
                        </h4>
                        <h4>
                            Nro de Domumento: {{$usuario->documento_nro}}
                        </h4>
                    </div>
                    <div>
                        <form method="POST" action="{{ url("usuarios/{$usuario->id}") }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-3">Eliminar</button>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
            @else
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header bg-secondary text-white">Usuario</div>
                    <div class="card-body text-dark">
                        <h3 class="card-title">{{$usuario->name}}</h3>
                        <h4>
                            Email: {{$usuario->email}}
                        </h4>
                        <h4>
                            Fecha de Nacimiento:{{$usuario->fechaNac}}
                        </h4>
                        <h4>
                            Telefono: {{$usuario->telefono}}
                        </h4>
                        <h4>
                            Tipo de Domumento: {{$usuario->documento_tipo}}
                        </h4>
                        <h4>
                            Nro de Domumento: {{$usuario->documento_nro}}
                        </h4>
                    </div>
                    <div>
                        <form method="POST" action="{{ url("usuarios/{$usuario->id}") }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-3">Eliminar</button>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
            @endif
        @endforeach
        </div>
    </div>

