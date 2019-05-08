<?php

namespace ioliga\Models\Equipo;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Equipo;

class GeneroEquipo extends Model
{
    protected $table='generoEquipo';

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
