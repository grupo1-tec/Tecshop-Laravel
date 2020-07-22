@extends('layouts.app')

<div style="margin-top:20vh"></div>
<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr class="d-flex">
                    <th scope="col" class="col-2">#</th>
                    <th scope="col" class="col-6">Nombre</th>
                    <th scope="col" class="col-4">Operaciones</th>
                </tr>
            </thead>
            <tbody>
            <p hidden>{{ $i = 1 }}</p>
            @foreach ($categorias as $categoria)
                <tr class="d-flex">
                    <th scope="row" class="col-2">{{ $i }}</th>
                    <td class="col-6">{{ $categoria->cat_nombre }}</td>
                    <td class="col-4">
                        <form method="POST" class="form-inline" action="{{ url("categorias/{$categoria->id}") }}">
                            @csrf
                            @method('DELETE')
                            <a type="button" class="btn btn-warning" href="{{action('CategoriasController@edit', $categoria->id)}}">Editar</a>
                            <button type="submit" class="btn btn-danger mx-3">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <p hidden>{{ $i++ }}</p>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
