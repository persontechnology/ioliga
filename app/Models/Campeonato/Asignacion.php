<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Equipo\Equipo;

class Asignacion extends Model
{
    protected $table='asignacion';

    public function equipos()
	{
	     return $this->hasOne(Equipo::class,'id','equipo_id');
	}

}

