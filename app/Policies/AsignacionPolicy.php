<?php

namespace ioliga\Policies;

use ioliga\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AsignacionPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        
    }
    public function ver(User $user)
    {
        return $user->can('Ver asignacion equipo');
    }  
}
