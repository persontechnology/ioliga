<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Feha;
use Illuminate\Auth\Access\HandlesAuthorization;

class FechaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the feha.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Feha  $feha
     * @return mixed
     */
    public function view(User $user, Feha $feha)
    {
        //
    }

    /**
     * Determine whether the user can create fehas.
     *
     * @param  \ioliga\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the feha.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Feha  $feha
     * @return mixed
     */
    public function update(User $user, Feha $feha)
    {
        //
    }

    /**
     * Determine whether the user can delete the feha.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Feha  $feha
     * @return mixed
     */
    public function delete(User $user, Feha $feha)
    {
        //
    }

    /**
     * Determine whether the user can restore the feha.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Feha  $feha
     * @return mixed
     */
    public function restore(User $user, Feha $feha)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the feha.
     *
     * @param  \ioliga\User  $user
     * @param  \ioliga\Feha  $feha
     * @return mixed
     */
    public function forceDelete(User $user, Feha $feha)
    {
        //
    }
}
