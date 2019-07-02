<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Campeonato\EtapaSerie;
use ioliga\Models\Campeonato\Partido;
use ioliga\Models\Campeonato\Alineacion;
use Illuminate\Support\Facades\DB;
class Fecha extends Model
{
    protected $table='fecha';

    public function etapaSerie()
	{
	    return $this->belongsTo(EtapaSerie::class, 'etapaSerie_id');
    }

    public function partidos()
	{
		return $this->hasMany(Partido::class, 'fecha_id')->orderby('hora');
	}
	public function partidosPreceso()
	{
		return $this->hasMany(Partido::class, 'fecha_id')->where('tipo','Proceso');
		
	}
	public function partidosDiferidos()
	{
		return $this->hasMany(Partido::class, 'fecha_id')->where('tipo','Diferido');		
	}
	public function totalGolesFecha()
    {
        return $this->hasManyThrough(
            Alineacion::class,
            Partido::class,
            'fecha_id', // Foreign key on GeneroSerie table...
            'partido_id', // Foreign key on Genero table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        )->select('partido.fecha_id',DB::raw('sum(alineacion.goles) as golesTotal'))->groupBy('partido.fecha_id')->limit(1);
    }
}
