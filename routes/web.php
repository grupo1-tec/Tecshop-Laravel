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

Route::get('/servicios', 'ServiciosController@index');

Auth::routes();

Route::get('/productos', 'ProductoController@index');
Route::get('/productos/{id}', 'ProductoController@show')->name('producto');
Route::post('/productos','ComentarioProdController@store');
Route::get('/servicios/{id}', 'ServiciosController@show')->name('servicio');
Route::post('/servicios','ComentarioController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
