<?php

namespace ioliga\Models\Equipo;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Equipo\Equipo;
use ioliga\Models\Equipo\GeneroEquipo;
use Illuminate\Support\Facades\DB;

class GeneroEquipo extends Model
{
    protected $table='generoEquipo';

    public function equipos()
    {
        return $this->hasMany(Equipo::class,'generoEquipo_id')->orderBy('nombre','ASC');
    }

    /*mi contador de equipos*/

    public function contadorDeAsignaciones($idasig)
    {
    	$result=GeneroEquipo::
		join('genero','genero.generoEquipo_id','=', 'generoEquipo.id')
		->join('generoSerie','generoSerie.genero_id','=', 'genero.id')
		->join('asignacion','asignacion.generoSerie_id','=', 'generoSerie.id')
		->select('generoEquipo.id',DB::raw('count(generoEquipo.id) as total'))
		->where('generoEquipo.id',$idasig)		
		->groupBy('generoEquipo.id')	
		->get();
		return $result;
    }

   
}
