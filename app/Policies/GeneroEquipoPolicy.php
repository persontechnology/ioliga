<?php

namespace ioliga\Policies;

use ioliga\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeneroEquipoPolicy
{
    use HandlesAuthorization;

   /* public function Ver(User $user)
    {
        
    }*/
    public function generoEquipo(User $user)
    {
        return $user->can('Ver categorias');
    }
}
