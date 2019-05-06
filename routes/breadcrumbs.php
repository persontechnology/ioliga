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

