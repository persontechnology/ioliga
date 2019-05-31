<?php

namespace ioliga\Models\Equipo;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Campeonato;
use ioliga\Models\Campeonato\Serie;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Campeonato\GeneroSerie;
use ioliga\Models\Campeonato\Asignacion;
class Genero extends Model
{
    protected $table='genero';

    public function campeonato()
	{
	    return $this->belongsTo(Campeonato::class, 'campeonato_id');
	}
	
	public function series()
	{
		return $this->belongsToMany(Serie::class, 'generoSerie', 'genero_id', 'serie_id')->withPivot('id');
	}

	public function generoEquipo()
    {
        return $this->belongsTo(GeneroEquipo::class,'generoEquipo_id');
	}
	

	public function GenerosSeries()
	{
		return $this->hasMany(GeneroSerie::class, 'genero_id');
	}
/*	   public function asignacionesGenero()
    {
    	return $this->belongsToMany(Asignacion::class, 'generoSerie', 'genero_id', 'generoEquipo_id')->as('genero')->withPivot('id');
    }*/

      public function asignacionesGenero()
    {
        return $this->hasManyThrough(Asignacion::class,GeneroSerie::class,'genero_id','generoSerie_id','id','id' );
    }

}
