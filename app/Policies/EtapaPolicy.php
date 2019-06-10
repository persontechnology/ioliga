<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Campeonato\Etapa;
use Illuminate\Auth\Access\HandlesAuthorization;

class EtapaPolicy
{
    use HandlesAuthorization;
    
    public function ver(User $user)
    {
        return $user->can('Ver etapas');
    }    
    public function crear(User $user)
    {
        return $user->can('Crear etapa');
    }
    
    public function update(User $user, Etapa $etapa)
    {
        //
    }

    /**
     * Determine whether the user can delete the etapa.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Etapa  $etapa
     * @return mixed
     */
    public function delete(User $user, Etapa $etapa)
    {
        //
    }

    /**
     * Determine whether the user can restore the etapa.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Etapa  $etapa
     * @return mixed
     */
    public function restore(User $user, Etapa $etapa)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the etapa.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Etapa  $etapa
     * @return mixed
     */
    public function forceDelete(User $user, Etapa $etapa)
    {
        //
    }
}
