<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Campeonato\AsignacionNomina;
use ioliga\Models\Campeonato\Partido;
class Alineacion extends Model
{
      protected $table='alineacion';

      public function asignacionNomina()
      {
      	return $this->belongsTo(AsignacionNomina::class,'asignacionNomina_id');
      }
      public function partido()
      {
      	return $this->belongsTo(partido::class,'partido_id');
      }


}
