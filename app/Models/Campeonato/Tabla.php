<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Campeonato\Asignacion;
use ioliga\Models\Campeonato\Resultado;
class Tabla extends Model
{
   protected $table='tabla';

    public function asignacion()
	{
	    return $this->belongsTo(Asignacion::class, 'asignacion_id');
    }
     public function resultados()
    {
        return $this->hasMany(Resultado::class,'tabla_id');
    }

    public function partidosGanados()
    {
    	return $this->hasMany(Resultado::class,'tabla_id')->where('estado','Ganado');
    }
    public function partidosEmpatados()
    {
    	return $this->hasMany(Resultado::class,'tabla_id')->where('estado','Empate');
    }
    public function golesFavor()
    {
    	return $this->hasMany(Resultado::class,'tabla_id');
    }
     public function golesContra()
    {
    	return $this->hasMany(Resultado::class,'tabla_id');
    }
     public function golesTotal($golFavor,$golContra)
    {
    	return $golFavor-$golContra;
    }

     public function puntosTotales($ganados,$empatados,$bonificacion)
    {
    	$ganado=$ganados*3;
    	$ampate=$empatados*1;
    	return $ganado+$ampate+$bonificacion;
    }
}
