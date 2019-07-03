<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Equipo\Equipo;
use ioliga\Models\Campeonato\AsignacionNomina;
use ioliga\Models\Nomina\Nomina;
use ioliga\Models\Campeonato\GeneroSerie;
use ioliga\Models\Campeonato\Alineacion;
use ioliga\Models\Campeonato\Tabla;

class Asignacion extends Model
{
    protected $table='asignacion';

    public function equipos()
	{
	     return $this->hasOne(Equipo::class,'id','equipo_id');
	}

	public function asignacionNomninas()
	{
		return $this->belongsToMany(Nomina::class,'asignacionNomina','asignacion_id','nomina_id')->as('asignacionNomina')->withPivot('numero','id','estado')->orderBy('numero');
	}

	public function asignacionSoloNomninas()
	{
		return $this->belongsToMany(Nomina::class,'asignacionNomina','asignacion_id','nomina_id');
	}
	 public function unoGeneroSerie()
    {
    	return $this->belongsTo(GeneroSerie::class,'generoSerie_id');
    }
        public function asignacionNominas()
    {
        return $this->hasMany(AsignacionNomina::class,'asignacion_id');
    }

	public function asignacionNominasPartido()
    {
        return $this->hasMany(AsignacionNomina::class,'asignacion_id')->where('estado',1);
    }
      public function partidoAsignacionAlineacion()
    {
        return $this->hasManyThrough(
            Alineacion::class,
            AsignacionNomina::class,
            'asignacion_id', // Foreign key on GeneroSerie table...
            'asignacionNomina_id', // Foreign key on Genero table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }
    public function calculoDeGOles($patido)
    {
        $nomina=$this->partidoAsignacionAlineacion;
        $alineacion=$nomina->whereIn('partido_id',[$patido])->sum('goles');
        return $alineacion;
    }
    public function tablas()
    {
        return $this->hasMany(Tabla::class,'asignacion_id');
    }

    //valores para la vista

    public function resultadosVista()
    {
        return $this->hasManyThrough(
            Resultado::class,
            tabla::class,
            'asignacion_id', // Foreign key on GeneroSerie table...
            'tabla_id', // Foreign key on Genero table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }

    public function resultadosVistaGanado()
    {
        return $this->hasManyThrough(
            Resultado::class,
            tabla::class,
            'asignacion_id', // Foreign key on GeneroSerie table...
            'tabla_id', // Foreign key on Genero table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        )->where('resultado.estado','Ganado');
    }

      public function resultadosVistaGolesA()
    {
        return $this->hasManyThrough(
            Resultado::class,
            tabla::class,
            'asignacion_id', // Foreign key on GeneroSerie table...
            'tabla_id', // Foreign key on Genero table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }
	
}

