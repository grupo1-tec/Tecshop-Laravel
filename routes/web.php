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
Route::get('/notificate','UserController@notificate');
Route::get('/', function () {
    return view('principal',);
})->name('principal');

Route::get('/welcome',function(){
    return view('welcome');
});
Auth::routes();
#Route::redirect('/', 'principal');

Route::get('/productos', 'ProductoController@index')->name('productosindex');
Route::get('/productos/MiProductos', 'ProductoController@userProductos')->name('MiProductos');
Route::delete('/productos/{id}', 'ProductoController@destroy')->name('productos.destroy');
Route::get('/productos/create','ProductoController@create');
Route::get('/productos/create','CategoriasController@all');
Route::post('/productos/create','ProductoController@store')->name('crearproducto');
Route::get('/productos/read/{id}/{idn}','ProductoController@read');
Route::get('/productos/{id}', 'ProductoController@show')->name('producto');
Route::post('/productos','ComentarioProdController@store');
Route::get('/productos/edit/{id}','ProductoController@edit');
Route::put('/productos/edit/{id}','ProductoController@update');

#Route::get('/servicios', 'ServiciosController@index')->name('serviciosindex');
Route::get('/servicios/MiServicios', 'ServiciosController@userServicios')->name('MiServicios');
Route::delete('/servicios/{id}', 'ServiciosController@destroy')->name('servicios.destroy');

Route::post('/servicios/create','ServiciosController@store')->name('crearservicio');
Route::get('/servicios/create','CategoriasController@allserv');
Route::get('/servicios/read/{id}/{idn}','ServiciosController@read');
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
Route::get('/categorias/admin','CategoriasController@allx');
// Route::put();
Route::delete('/categorias/{id}','CategoriasController@destroy');
Route::get('/categorias/edit/{id}','CategoriasController@edit');
Route::put('/categorias/edit/{id}','CategoriasController@update');

Auth::routes();
//Notificaciones


Route::get('/home', 'HomeController@index')->name('home');


//Busqueda Productos (Ruta de pruebas)
Route::get('/buscarProd', 'ProductoController@busqueda');
Route::get('/servicios', 'ServiciosController@busqueda');

//Ruta Administrar Banner
Route::get('/administrar/banner', 'BannerController@index')->name('admin_banner');
Route::post('/administrar/banner','BannerController@store');
Route::get('/administrar/banner/{id}','BannerController@destroy');

//Ruta Principal
Route::get('/', 'BannerController@all');

//Rutas sociales
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');