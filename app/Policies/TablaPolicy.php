<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Models\Campeonato\Tabla;
use Illuminate\Auth\Access\HandlesAuthorization;

class TablaPolicy
{
    use HandlesAuthorization;

    
    public function bonificar()
    {
        return $user->can('Actualizar bonificación');
    }
}
