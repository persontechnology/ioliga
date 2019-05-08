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
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::group(['middleware' => ['verified','auth']], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	/*estadios*/
	Route::get('/estadios', 'Estadios@index')->name('estadios');
	Route::get('/estadios-crear', 'Estadios@crear')->name('crearEstadio');
	Route::post('estadios-guardar', 'Estadios@guardar')->name('guardarEstadio');


	Route::get('/editar-estadio/{id}', 'Estadios@editar')->name('estadiosEditar');
	Route::post('/editar-estadio', 'Estadios@actualizar')->name('actualizar');
	Route::get('/eliminar-estadio/{id}', 'Estadios@eliminar')->name('eliminarEstadio');

	/*Modulo de usuarios*/
	Route::namespace('Usuarios')->group(function () {
	    // usuarios del sistema
	    Route::get('/usuarios', 'Usuarios@index')->name('usuarios');
	    Route::get('/usuarios-crear', 'Usuarios@crear')->name('crearUsuario');
	    Route::post('/usuarios-guardar', 'Usuarios@guardar')->name('guardarUsuario');
	    Route::get('/usuarios-editar/{id}', 'Usuarios@editar')->name('editarUsuario');
	    Route::post('/usuarios-actualizar', 'Usuarios@actualizar')->name('actualizarUsuario');
	    Route::get('/usuarios-editar-foto/{id}', 'Usuarios@editarFoto')->name('editarFotoUsuario');
	    Route::post('/usuarios-actualizar-foto', 'Usuarios@actualizarFoto')->name('actualizarFotoUsuario');
	    Route::get('/usuarios-eliminar/{id}', 'Usuarios@eliminar')->name('eliminarUsuario');
	});


	/*seguridades*/
	Route::namespace('Seguridades')->group(function () {
	    // roles del sistema
	    Route::get('/roles', 'Roles@index')->name('roles');
	    Route::post('/roles-actualizar-permisos', 'Roles@actualizarPermisos')->name('actualizarPermisos');
	    Route::get('/roles-eliminar/{id}', 'Roles@eliminar')->name('eliminarRol');
	    Route::get('/roles-pdf/{id}', 'Roles@pdf')->name('pdfRol');
	    Route::post('/roles-crear', 'Roles@crear')->name('crearRol');
	    
	});

	/*Campeonatos*/
	Route::get('/campeonato', 'Campeonatos@index')->name('campeonatos');
	Route::get('/campeonato-crear', 'Campeonatos@crear')->name('campeonatoCrear');


});