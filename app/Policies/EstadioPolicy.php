<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Models\Estadio;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstadioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine si el usuario puede ver el estadio.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Models\Estadio  $estadio
     * @return mixed
     */
    public function view(User $user, Estadio $estadio)
    {
        return $user->can('Ver estadios');
    }

    /**
     * Determine whether the user can create estadios.
     *
     * @param  \ioliga\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('Crear estadios');
    }

    /**
     * Determine whether the user can update the estadio.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Models\Estadio  $estadio
     * @return mixed
     */
    public function update(User $user, Estadio $estadio)
    {
        return $user->can('Actualizar estadios');
    }

    /**
     * Determine whether the user can delete the estadio.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Models\Estadio  $estadio
     * @return mixed
     */
    public function delete(User $user, Estadio $estadio)
    {
        return $user->can('Eliminar estadios');
    }

    /**
     * Determine whether the user can restore the estadio.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Models\Estadio  $estadio
     * @return mixed
     */
    public function restore(User $user, Estadio $estadio)
    {
        return $user->can('Restaurar estadios');
    }

    /**
     * Determine whether the user can permanently delete the estadio.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Models\Estadio  $estadio
     * @return mixed
     */
    public function forceDelete(User $user, Estadio $estadio)
    {
        return $user->can('Forzar eliminacion estadios');
    }
}
