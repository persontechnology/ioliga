<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Models\Campeonato;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampeonatoPolicy
{
    use HandlesAuthorization;

    public function ver(User $user)
    {
        return $user->can('Ver campeonatos');
    }

    public function crear(User $user)
    {
        return $user->can('Crear campeonatos');
    }

    public function actualizar(User $user, Campeonato $campeonato)
    {
        return $user->can('Actualizar campeonatos');
    }

    public function eliminar(User $user, Campeonato $campeonato)
    {
        return $user->can('Eliminar campeonatos');
    }
}
