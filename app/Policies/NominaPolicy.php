<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Models\Nomina\Nomina;
use ioliga\Models\Equipo\Equipo;
use Illuminate\Auth\Access\HandlesAuthorization;

class NominaPolicy
{
    use HandlesAuthorization;

   
    public function representante(User $user)
    {
        return $user->can('Ver equipo representante');
    }

    public function actualizarImagenJugador(User $user, Nomina $nomina)
    {
        if($user->can('Actualizar imagen jugador representante')){

            if($nomina->equipoUno->users_id==$user->id){
                return true;
            }

        }
        
    }

    public function verListadoNomina(User $user)
    {
        return $user->can('Listar nómina equipo');
    }

    public function crearJugadorEquipo(User $user)
    {
        return $user->can('Crear jugador equipo');
    }
     public function actualizarFotoJugador(User $user)
    {
        return $user->can('Actualizar foto jugador');
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
