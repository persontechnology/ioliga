<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Nomina\Nomina;
use ioliga\Models\Campeonato\Asignacion;
use ioliga\Models\Campeonato\Alineacion;
use Illuminate\Support\Facades\DB;
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
    public function alineaciones()
    {
    	return $this->hasMany(Alineacion::class,'asignacionNomina_id')
    	->where('estadoSale',0);
    }
     public function alineacionesPar()
    {
        return $this->hasMany(Alineacion::class,'asignacionNomina_id');
    }
     public function alineacionesTotalGoles()
    {
        return $this->hasMany(Alineacion::class,'asignacionNomina_id')
        ->selectRaw('alineacion.asignacionNomina_id,count(alineacion.asignacionNomina_id) as totalJuegos,SUM(alineacion.goles) as totalgoles,SUM(alineacion.amarillas) as totalAmarillas,SUM(alineacion.rojas) as totalrojas') ->groupBy('alineacion.asignacionNomina_id');
    }
}
