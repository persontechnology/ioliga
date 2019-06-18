<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Campeonato\EtapaSerie;
use ioliga\Models\Campeonato\Partido;

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
}
