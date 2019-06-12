<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Campeonato\Asignacion;
use ioliga\Models\Estadio;
use ioliga\User;
use ioliga\Models\Campeonato\Alineacion;
use ioliga\Models\Campeonato\Fecha;


class Partido extends Model
{
    protected $table='partido';

    public function asignacioUno()
    {
    	return $this->belongsTo(Asignacion::class, 'asignacion1_id');
    }
    public function asignacioDos()
    {
    	return $this->belongsTo(Asignacion::class, 'asignacion2_id');
    }
 	public function estadio()
    {
    	return $this->belongsTo(Estadio::class, 'estadio_id');
    }
   public function arbitro()
    {
    	return $this->belongsTo(User::class, 'users_id');
    }
    public function alineaciones()
    {
        return $this->hasMany(Alineacion::class, 'partido_id');
    }

    public function fecha()
    {
        return $this->belongsTo(Fecha::class, 'fecha_id');
    }


    
}
