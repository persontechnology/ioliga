<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Equipo\Equipo;
use ioliga\Models\Campeonato\AsignacionNomina;
use ioliga\Models\Nomina\Nomina;
use ioliga\Models\Campeonato\GeneroSerie;

class Asignacion extends Model
{
    protected $table='asignacion';

    public function equipos()
	{
	     return $this->hasOne(Equipo::class,'id','equipo_id');
	}

	public function asignacionNomninas()
	{
		return $this->belongsToMany(Nomina::class,'asignacionNomina','asignacion_id','nomina_id')->as('asignacionNomina')->withPivot('numero','id')->orderBy('numero');
	}

	public function asignacionSoloNomninas()
	{
		return $this->belongsToMany(Nomina::class,'asignacionNomina','asignacion_id','nomina_id');
	}
	 public function unoGeneroSerie()
    {
    	return $this->belongsTo(GeneroSerie::class,'generoSerie_id');
    }

	

	
}

