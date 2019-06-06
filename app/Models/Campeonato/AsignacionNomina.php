<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Nomina\Nomina;
use ioliga\Models\Campeonato\Asignacion;

class AsignacionNomina extends Model
{
    protected $table='asignacionNomina';

    public function unoNomina()
    {
    	return $this->belongsTo(Nomina::class,'nomina_id');
    }

    public function unoAsignacion()
    {
    	return $this->belongsTo(Asignacion::class,'asignacion_id');
    }
   
    
}
