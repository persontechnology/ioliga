<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Models\Campeonato\Fecha;
use Illuminate\Auth\Access\HandlesAuthorization;

class FechaPolicy
{
    use HandlesAuthorization;

    public function VerFecha(User $user)
    {
        return $user->can('Ver fechas');
    }
    
    public function administrarFecha(User $user)
    {
        return $user->can('Administrar fechas');
    }

}
