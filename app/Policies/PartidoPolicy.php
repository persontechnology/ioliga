<?php

namespace ioliga\Policies;

use ioliga\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartidoPolicy
{
    use HandlesAuthorization;

    public function VerPartidos(User $user)
    {
        return $user->can('Ver partidos');
    }
       public function administrarFecha(User $user)
    {
        return $user->can('Administrar partidos');
    }
    
}
