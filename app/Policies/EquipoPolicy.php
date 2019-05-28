<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Models\Equipo\Equipo;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipoPolicy
{
    use HandlesAuthorization;
   
    public function ver(User $user)
    {
        return $user->can('Listar equipos categorias');
    }
   
    public function crear(User $user)
    {
        return $user->can('Crear equipos');
    }
    
    public function actualizar(User $user, Equipo $equipo)
    {
        return $user->can('Actualizar equipo');
    }

    public function eliminar(User $user, Equipo $equipo)
    {
        return $user->can('Eliminar equipo');
    }

    public function verNominaRepresentante(User $user,Equipo $equipo)
    {
        if($user->can('Ver nómina representante')){

            if($equipo->users_id==$user->id){
                return true;
            }

        }
        
    }

     public function crearJugadorNomina(User $user,Equipo $equipo)
    {
         if($user->can('Crear jugadores representante')){

            if($equipo->users_id==$user->id){
                return true;
            }

        }
        
    }

    public function actualizarMiEquipo(User $user,Equipo $equipo)
    {
       if($user->can('Actualizar equipo representante')){

            if($equipo->users_id==$user->id){
                return true;
            }

        }
    }
}
