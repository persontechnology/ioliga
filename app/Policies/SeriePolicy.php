<?php

namespace ioliga\Policies;

use ioliga\User;
use ioliga\Models\Campeonato\Serie;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeriePolicy
{
    use HandlesAuthorization;

   
    public function ver(User $user, Serie $serie)
    {
        if($serie->genero->campeonato->estado){
            return true;
        }   
    }

    
    public function create(User $user)
    {
        //
    }

    
    public function update(User $user, Serie $serie)
    {
        //
    }

   
    public function delete(User $user, Serie $serie)
    {
        //
    }

}
