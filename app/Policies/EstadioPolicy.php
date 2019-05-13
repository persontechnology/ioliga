<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Models\Estadio;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstadioPolicy
{
    use HandlesAuthorization;
    
    public function ver(User $user)
    {
        return $user->can('Ver estadios');
    }
    
    public function crear(User $user)
    {
        return $user->can('Crear estadios');
    }

    public function actualizar(User $user, Estadio $estadio)
    {
        return $user->can('Actualizar estadios');
    }

    public function eliminar(User $user, Estadio $estadio)
    {
        return $user->can('Eliminar estadios');
    }
     public function estado(User $user, Estadio $estadio)
    {
        return $user->can('Estado estadios');
    }

}
