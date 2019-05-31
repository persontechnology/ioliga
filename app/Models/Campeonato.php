<?php

namespace ioliga\Models;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Equipo\Genero;

class Campeonato extends Model
{
     protected $table="campeonato";

    protected $fillable = [
        'nombre', 'fechaInicio', 'fechaFin','descripcion','estado'
    ];

    // protected $hidden = [
    //     'usuarioCreado', 'usuarioActualizado',
    // ];


    public function categoriaGenero()
    {
    	return $this->belongsToMany(GeneroEquipo::class, 'genero', 'campeonato_id', 'generoEquipo_id')->as('genero')->withPivot('id');
    }

      public function generos()
    {
        return $this->hasMany(Genero::class,'campeonato_id');
    }
}   
