<?php

namespace ioliga\Policies\Usuarios;

use ioliga\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
class UsuarioPolicy
{
    use HandlesAuthorization;
           
    public function ver(User $user)
    {
        return $user->can('Ver usuarios');
    }
   
    public function crear(User $user)
    {
        return $user->can('Crear usuarios');
    }
    
    public function actualizar(User $user,User $model)
    {
        return $user->can('Actualizar usuarios');
    }

    public function eliminar(User $user,User $model)
    {
        if($user->can('Eliminar usuarios')){
            return $user->id!=$model->id;
        }
    }

}
