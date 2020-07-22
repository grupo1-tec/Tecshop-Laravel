<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// CRUD DE USUARIOS
Route::get('usuarios', 'UsuarioControllerAPI@index');
Route::get('usuarios/{id}', 'UsuarioControllerAPI@show');
Route::post('usuarios/register', 'UsuarioControllerAPI@create');
Route::put('usuarios/{id}', 'UsuarioControllerAPI@update');
Route::delete('usuarios/{id}', 'UsuarioControllerAPI@destroy');
Route::post('usuarios/login','UsuarioControllerAPI@login');
// Route::get()

// CRUD DE PRODUCTOS
Route::get('productos', 'ProductoControllerAPI@index');
Route::get('productos/{id}', 'ProductoControllerAPI@show');
Route::post('productos', 'ProductoControllerAPI@create');
Route::put('productos/{id}', 'ProductoControllerAPI@update');
Route::delete('productos/{id}', 'ProductoControllerAPI@destroy');
Route::get('productos/user/{id}', 'ProductoControllerAPI@userproducts');

// CRUD DE SERVICIOS
Route::get('servicios', 'ServicioControllerAPI@index');
Route::get('servicios/{id}', 'ServicioControllerAPI@show');
Route::post('servicios', 'ServicioControllerAPI@create');
Route::put('servicios/{id}', 'ServicioControllerAPI@update');
Route::delete('servicios/{id}', 'ServicioControllerAPI@destroy');
Route::get('servicios/user/{id}', 'ServicioControllerAPI@userservices');

// CRUD DE CATEGORIAS
Route::get('categorias', 'CategoriaControllerAPI@index');
Route::get('categorias/{id}', 'CategoriaControllerAPI@show');
Route::post('categorias', 'CategoriaControllerAPI@create');
Route::put('categorias/{id}', 'CategoriaControllerAPI@update');
Route::delete('categorias/{id}', 'CategoriaControllerAPI@destroy');