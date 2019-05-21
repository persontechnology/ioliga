<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Models\Nomina\Nomina;
use Illuminate\Auth\Access\HandlesAuthorization;

class NominaPolicy
{
    use HandlesAuthorization;

   
    public function representante(User $user)
    {
        return $user->can('Ver nomina representante');
    }

       public function actualizarMiEquipo(User $user)
    {
       return $user->can('Actualizar equipo representante');
    }

    public function update(User $user, Nomina $nomina)
    {
        //
    }

    /**
     * Determine whether the user can delete the nomina.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Nomina  $nomina
     * @return mixed
     */
    public function delete(User $user, Nomina $nomina)
    {
        //
    }

    /**
     * Determine whether the user can restore the nomina.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Nomina  $nomina
     * @return mixed
     */
    public function restore(User $user, Nomina $nomina)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the nomina.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Nomina  $nomina
     * @return mixed
     */
    public function forceDelete(User $user, Nomina $nomina)
    {
        //
    }
}
