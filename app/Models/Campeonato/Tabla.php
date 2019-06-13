<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Campeonato\Asignacion;

class Tabla extends Model
{
   protected $table='tabla';

    public function asignacion()
	{
	    return $this->belongsTo(Asignacion::class, 'asignacion_id');
    }
}
