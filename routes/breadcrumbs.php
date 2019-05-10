<?php

Breadcrumbs::for('inicio', function ($trail) {
    $trail->push('Inicio', url('/'));
});

/*home*/
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Administración', route('home'));
});
/*estadios*/
Breadcrumbs::for('estadios', function ($trail) {
    $trail->parent('home');
    $trail->push('Estadios', route('estadios'));
});
Breadcrumbs::for('crearEstadio', function ($trail) {
    $trail->parent('estadios');
    $trail->push('Crear estadio', route('crearEstadio'));
});

Breadcrumbs::for('estadiosEditar', function ($trail,$estadio) {
    $trail->parent('estadios');
    $trail->push('Actualizar '.$estadio->nombre, route('estadiosEditar',$estadio->id));
});
/*usuarios*/
Breadcrumbs::for('usuarios', function ($trail) {
    $trail->parent('home');
    $trail->push('Usuarios', route('usuarios'));
});
Breadcrumbs::for('crearUsuario', function ($trail) {
    $trail->parent('usuarios');
    $trail->push('Crear usuario', route('crearUsuario'));
});
Breadcrumbs::for('editarUsuario', function ($trail,$usuario) {
    $trail->parent('usuarios');
    $trail->push('Actualizar '.$usuario->email, route('editarUsuario',$usuario->id));
});

/*seguridades*/
/*roles*/
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('home');
    $trail->push('Roles', route('roles'));
});

/*Campeonato*/
Breadcrumbs::for('campeonatos', function ($trail) {
    $trail->parent('home');
    $trail->push('Campeonatos', route('campeonatos'));
});
Breadcrumbs::for('crearCampeonato', function ($trail) {
    $trail->parent('campeonatos');
    $trail->push('Crear campeonato', route('crearCampeonato'));
});
Breadcrumbs::for('actualizarCampeonato', function ($trail,$campeonato) {
    $trail->parent('campeonatos');
    $trail->push('Actualizar campeonato '.$campeonato->nombre, route('actualizarCampeonato',$campeonato));
});

/*serieries*/

Breadcrumbs::for('series', function ($trail,$genero) {
    $trail->parent('campeonatos');
    $trail->push('Series en campeonato '.$genero->campeonato->nombre, route('series',$genero->id));
});

/*Equipos*/
Breadcrumbs::for('categorias', function ($trail) {
    $trail->parent('home');
    $trail->push('Categorias', route('categorias'));
});