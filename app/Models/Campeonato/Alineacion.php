<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Campeonato\AsignacionNomina;

class Alineacion extends Model
{
      protected $table='alineacion';

      public function asignacionNomina()
      {
      	return $this->belongsTo(AsignacionNomina::class,'asignacionNomina_id');
      }


}
