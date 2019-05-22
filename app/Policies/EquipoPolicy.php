<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Equipo\Equipo;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipoPolicy
{
    use HandlesAuthorization;

     public function genero(User $user)
    {
        return $user->can('Ver categorias');
    }

    public function ver(User $user,Equipo $equipo)
    {
        return $user->can('Ver equipos');
    }

   
    public function crear(User $user)
    {
          return $user->can('Crear equipo');
    }

    
    public function update(User $user,Equipo $equipo)
    {
       
    }

    public function delete(User $user ,Equipo $equipo)
    {
       
    }

    public function restore(User $user)
    {
       
    }

    public function forceDelete(User $user)
    {
       
    }
}
