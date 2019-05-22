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
    $trail->push('Series en categoria '.$genero->generoEquipo->nombre, route('series',$genero->id));
});

// Equipos en serie
Breadcrumbs::for('asignarEquiposAserie', function ($trail,$generoSerie) {
    $trail->parent('series',$generoSerie->genero);
    $trail->push('Equipos en serie '.$generoSerie->serie->nombre, route('asignarEquiposAserie',$generoSerie->id));
});


/*Equipos*/
Breadcrumbs::for('categorias', function ($trail) {
    $trail->parent('home');
    $trail->push('Categorias', route('categorias'));
});

Breadcrumbs::for('equipos', function ($trail,$generos) {   
     $trail->parent('categorias');
    $trail->push('Categorias Tipo ' . $generos->nombre, route('equipos',$generos->id));
});

Breadcrumbs::for('crear-equipos', function ($trail,$generos) {   
     $trail->parent('categorias');
     $trail->push('Equipos Tipo ' . $generos->nombre, route('equipos',$generos->id));
    $trail->push('Crear Equipo Tipo ' . $generos->nombre, route('crear-equipos',$generos->id));
});
Breadcrumbs::for('editar-equipos', function ($trail,$equipo) {       
    $trail->parent('categorias');
    $trail->push('Equipos Tipo ' . $equipo->genero->nombre, route('equipos',$equipo->genero->id));
<<<<<<< HEAD
    $trail->push('Editar Equipo  ' . $equipo->nombre, route('equipo-editar',$equipo->id));
  
});


=======
    $trail->push('Editar Equipo  ' . $equipo->nombre, route('equipo-editar',$equipo->id));  
});
Breadcrumbs::for('mis-equipos', function ($trail) {       
   $trail->parent('home');
    $trail->push('Mis Equipos', route('mis-equipos'));     
});
Breadcrumbs::for('editar-mi-equipo', function ($trail,$equipo) {       
   $trail->parent('home');
    $trail->push('Mis Equipos', route('mis-equipos')); 
    $trail->push('Editar Equipo'.' '.$equipo->nombre, route('editar-mi-equipo',$equipo->id));     
});
/*nominas*/
Breadcrumbs::for('nomina-mi-equipo', function ($trail,$equipo) {       
   $trail->parent('home');
    $trail->push('Mis Equipos', route('mis-equipos')); 
    $trail->push('Nomina del Equipo'.' '.$equipo->nombre, route('nomina',$equipo->id));     
});

Breadcrumbs::for('nomina-jugadores-representante', function ($trail,$equipo) {       
   $trail->parent('home');
    $trail->push('Mis Equipos', route('mis-equipos')); 
    $trail->push('Nómina de jugadores '.' '.$equipo->nombre, route('nomina',$equipo->id));     
});
>>>>>>> 89b30192db0a436b91c6e46cd39fc4504b028aec
