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
	Route::post('/editar-estadio/{id}', 'Estadios@actualizar')->name('actualizar');
});