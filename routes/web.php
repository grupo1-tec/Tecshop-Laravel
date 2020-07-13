<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('principal',);
})->name('principal');



Auth::routes();
#Route::redirect('/', 'principal');

Route::redirect('/home', '/');
Route::get('/productos', 'ProductoController@index')->name('productosindex');
Route::get('/productos/MiProductos', 'ProductoController@userProductos')->name('MiProductos');
Route::delete('/productos/{id}', 'ProductoController@destroy')->name('productos.destroy');
Route::get('/productos/create','ProductoController@create');
Route::get('/productos/create','CategoriasController@all');
Route::post('/productos/create','ProductoController@store')->name('crearproducto');
Route::get('/productos/{id}', 'ProductoController@show')->name('producto');
Route::post('/productos','ComentarioProdController@store');

Route::get('/servicios', 'ServiciosController@index')->name('serviciosindex');
Route::get('/servicios/MiServicios', 'ServiciosController@userServicios')->name('MiServicios');
Route::delete('/servicios/{id}', 'ServiciosController@destroy')->name('servicios.destroy');

Route::post('/servicios/create','ServiciosController@store')->name('crearservicio');
Route::get('/servicios/create','CategoriasController@allserv');
Route::get('/servicios/{id}', 'ServiciosController@show')->name('servicio');
Route::post('/servicios','ComentarioController@store');

//Rutas para realizar el CRUD de usuarios
Route::get('/usuarios/eliminar', 'UserController@index')->name('usuarios');
Route::get('usuario/editar', 'UserController@edit')->name('editarUsuario');
Route::put('usuario/editar', 'UserController@update');
Route::delete('/usuarios/{id}', 'UserController@destroy')->name('usuarios.destroy');
Route::get('/administrador/create', function () { return view('create_admin',); })->name('crear_admin');
Route::post('/administrador/create', 'UserController@createAdmin')->name('registerAdmin');

Route::get('/categoria/create','CategoriasController@create');
Route::post('/categoria/create','CategoriasController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
