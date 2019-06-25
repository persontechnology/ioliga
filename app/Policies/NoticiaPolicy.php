<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Models\Noticia;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticiaPolicy
{
    use HandlesAuthorization;

  
    public function administrarNoticias(User $user)
    {
        return $user->can('Administrar noticias');
    } 

}
