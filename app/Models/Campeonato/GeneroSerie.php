<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Equipo\Genero;
class GeneroSerie extends Model
{
    protected $table='generoSerie';


    /*GenerioSerie <--- Genero */
    public function genero()
	{
	    return $this->belongsTo(Genero::class, 'genero_id');
	}
}
