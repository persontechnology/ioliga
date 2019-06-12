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
	Route::post('/estadoEstadio', 'Estadios@estado')->name('estadoEstadio');

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
	Route::get('/campeonatos', 'Campeonatos@index')->name('campeonatos');
	Route::get('/campeonatos-crear', 'Campeonatos@crear')->name('crearCampeonato');
	Route::post('/campeonatos-crear', 'Campeonatos@guardar')->name('guardarCampeonato');
	Route::get('/campeonatos-actualizar/{id}', 'Campeonatos@actualizar')->name('actualizarCampeonato');
	Route::post('/campeonatos-editar', 'Campeonatos@editar')->name('editarCampeonato');
	Route::get('/campeonatos-eliminar/{id}', 'Campeonatos@eliminar')->name('eliminarCampeonato');

	/*series*/
	Route::namespace('Campeonatos')->group(function () {
	    // serires
	    Route::get('/series/{idGenero}', 'Series@index')->name('series');
	    Route::post('/series-agregar-a-campeonato', 'Series@agregar')->name('agregarSerieCampeonato');
		Route::get('/agregar-equipos-a-serie/{idGeneroSerie}', 'Series@asignarEquiposAserie')->name('asignarEquiposAserie');
		Route::post('/agregar-equipos-a-serie-guardar', 'Series@agregarEquipoAserie')->name('agregarEquipoAserie');
		/*Asignacion de mi campeonato*/
		Route::get('/mis-asignacines/{id}', 'Asignaciones@menuAsignacion')->name('mi-menu-equipo');	    
	    Route::get('/asignacion-nomina/{id}', 'Asignaciones@asignacionNomina')->name('asignacion-nomina');
	    Route::post('/crear-asignacion-nomina', 'Asignaciones@crearAsignarNomina')->name('crear-asignacion-nomina');
	    Route::get('/eliminarAsignarNomina/{id}', 'Asignaciones@eliminarAsignarNomina')->name('eliminarAsignarNomina');
	    /*Asignacion menu*/
	    Route::get('/asignacion/{id}', 'Asignaciones@menu')->name('asignacion');
	    Route::get('/nomina-asignacion/{id}', 'Asignaciones@nomina')->name('nomina-asignacion');
	    Route::post('/crear-nomina-asignacion', 'Asignaciones@crearNomina')->name('crear-nomina-asignacion');
	    Route::get('/eliminarNominaAsignar/{id}', 'Asignaciones@eliminarNomina')->name('eliminarNominaAsignar');
	    Route::post('/estado-nomina-asignacion', 'Asignaciones@estado')->name('estado-nomina-asignacion');
	    	
	    
	  	/*etapas*/
	  	Route::get('/etapas-serie/{id}', 'Etapas@etapasSerie')->name('etapas-serie');
	  	Route::post('/crear-etapa', 'Etapas@guradarEtapa')->name('crear-etapa');
	  	Route::post('/guardar-etapa-serie', 'Etapas@guardarEtapaSerie')->name('guardar-etapa-serie');
	  	Route::get('/eliminar-etapa-serie/{id}', 'Etapas@eliminarEtapaSerie')->name('eliminar-etapa-serie');

	  	/*fechas*/

	  	Route::get('/fechas/{id}', 'Fechas@index')->name('fechas-etapa');
	  	Route::post('/crear-fecha-etapa', 'Fechas@crearFecha')->name('crear-fecha-etapa');
	  	Route::get('/fecha/{id}', 'Fechas@fecha')->name('fecha');
	  	Route::get('/eliminar-fecha/{id}', 'Fechas@eliminarFecha')->name('eliminar-fecha');

	  	/*partidos*/
	  	Route::post('/crear-partido', 'Fechas@guardarPartidos')->name('crear-partido');


	  	/*Alineacio*/
	  	Route::get('/alineacion-index/{id}/{idAs}', 'Alineaciones@index')->name('alineacion');
	  	Route::post('/crear-alineacion', 'Alineaciones@guardarAlineacion')->name('crear-alineacion');
		Route::post('/actualizar-alineacion', 'Alineaciones@actualizarResultados')->name('actualizar-alineacion');
	  	
	  	

	});

	/*Equipos*/
	Route::get('/categorias', 'Equipos@genero')->name('categorias');	
	Route::get('/equipos/{id}', 'Equipos@equipo')->name('equipos');
	Route::get('/crear-equipos/{id}', 'Equipos@crear')->name('crear-equipos');
	Route::post('/equipo-guaradar', 'Equipos@guardar')->name('guardarEquipo');
	Route::get('/editar-equipo/{id}', 'Equipos@editar')->name('equipo-editar');
	Route::post('/actualizar-equipo', 'Equipos@actualizar')->name('actualizar-equipo');
	Route::post('/estadoEquipo', 'Equipos@estado')->name('estadoEquipo');
	Route::get('/eliminar-equipo/{id}', 'Equipos@eliminar')->name('eliminarEquipo');
	Route::get('/editar-mi-equipo/{id}', 'Equipos@editarMiEquipo')->name('editar-mi-equipo');
	Route::post('/actualizar-mi-equipo', 'Equipos@actualizarMiEquipo')->name('actualizar-mi-equipo');

	
	/*	Nominas*/
	Route::get('/nomina/{id}', 'Nominas@index')->name('nomina');
	Route::get('/mis-equipos', 'Nominas@nominaRepresentante')->name('mis-equipos');
	Route::get('/crear-jugador/{id}', 'Nominas@crearJugadorNomina')->name('crear-jugador');
	Route::post('/guardar-jugador', 'Nominas@guardarJugador')->name('guardar-jugador');
	Route::get('/editar-foto-jugador/{id}', 'Nominas@editarFoto')->name('editar-foto-jugador');
	Route::post('/Jugador-actualizar-foto', 'Nominas@actualizarFoto')->name('actualizarFotoJugador');
	Route::post('/Jugador-actualizar-inactivo', 'Nominas@inactivo')->name('inactivo');
	Route::post('/Jugador-actualizar-activo', 'Nominas@activo')->name('activo');
	Route::get('/vista-previa-jugador/{id}', 'Nominas@vistaPrevia')->name('vista-previa-jugador');
	Route::get('/listado-jugadores-nomina/{id}', 'Nominas@listadoNomina')->name('listado-jugadores-nomina');
	Route::get('/crear-jugador-equipo/{id}', 'Nominas@crearJugador')->name('crear-jugador-equipo');
	Route::post('/guardar-jugador-equipo', 'Nominas@guardarJugadorEquipo')->name('guardar-jugador-equipo');

	Route::get('/actualizar-foto-jugador/{id}', 'Nominas@actualizarFotoJugadorEquipo')->name('actualizar-foto-jugador');
	Route::post('/jugador-editar-foto', 'Nominas@editarFotoJugadorEquipo')->name('jugador-editar-foto');
	Route::get('/vista-jugador/{id}', 'Nominas@vistaPreviaJugador')->name('vista-jugador');
	Route::post('/jugador-actualizar-nomina', 'Nominas@acutualizaJugadorEquipo')->name('jugador-actualizar-nomina');

	/*Nominas Asignaciones*/
  	Route::get('/listar-mis-equipo', 'Campeonatos@representante')->name('listar-mis-equipo');

	



});