
@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($usuarios as $usuario)
        <div class="row md-4 justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card card-body">
                        <h4 class="card-title">
                            Nombre: {{$usuario->name}}
                        </h4>
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
                            Administrador: {{$usuario->admin}}
                        </h4>
                        <h4>
                            Tipo de Domumento: {{$usuario->documento_tipo}}
                        </h4>
                        <h4>
                            Nro de Domumento: {{$usuario->documento_nro}}
                        </h4>
                    </div>   
                </div>
                <div>
                    <form method="POST" action="{{ url("usuarios/{$usuario->id}") }}">
                        @csrf
                        @method('DELETE')
 
                        <button type="submit" class="btn btn-outline-danger">Eliminar Usuario</button>
                    </form>
                </div>
                <br>
            </div>
        </div>
        @endforeach
    </div>

@endsection