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
    return view('auth.login');
});

Route::get('/login', 'AuthController@getLogin')->name('login')->middleware('guest');
Route::post('/login', 'AuthController@postLogin')->middleware('guest');
Route::get('/logout', 'AuthController@logout')->name('logout')->middleware('auth');

Route::resource('dashboard', 'DashboardController')->middleware('auth');

Route::resource('users', 'UsuariosController')->middleware('auth');
Route::get('users/baja/{id}', 'UsuariosController@baja')->middleware('auth');
Route::get('users-password', 'UsuariosController@password')->name('users.password')->middleware('auth');
Route::put('users-password-nuevo/{id}', 'UsuariosController@passwordnuevo')->name('users.passwordnuevo')->middleware('auth');

Route::resource('puntosventa', 'PuntosVentaController')->middleware('auth');
Route::get('puntosventa/baja/{id}', 'PuntosVentaController@baja')->middleware('auth');

Route::resource('topproductos', 'TopProductosController')->middleware('auth');
Route::get('topproductos/baja/{id}', 'TopProductosController@baja')->middleware('auth');

Route::resource('productos', 'ProductosController')->middleware('auth');
Route::get('productos/baja/{id}', 'ProductosController@baja')->middleware('auth');

Route::resource('fotos-productos', 'FotosProductosController')->middleware('auth');

Route::resource('universidades', 'UniversidadesController')->middleware('auth');
Route::get('universidades/baja/{id}', 'UniversidadesController@baja')->middleware('auth');

Route::resource('promociones', 'PromocionesController')->middleware('auth');
Route::get('promociones/baja/{id}', 'PromocionesController@baja')->middleware('auth');

