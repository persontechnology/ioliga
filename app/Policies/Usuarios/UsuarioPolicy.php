<?php

namespace ioliga\Policies\Usuarios;

use ioliga\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\User  $model
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->can('Ver usuarios');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \ioliga\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('Crear usuarios');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\User  $model
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->can('Actualizar usuarios');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\User  $model
     * @return mixed
     */
    public function delete(User $user)
    {
        /*usuario no puede autoeliminarse*/
        return $user->can('Eliminar usuarios') && $user->id!=Auth::id();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\User  $model
     * @return mixed
     */
    public function restore(User $user)
    {
        return $user->can('Restaurar usuarios');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\User  $model
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return $user->can('Forzar eliminacion usuarios');
    }
}
