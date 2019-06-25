<?php

namespace ioliga\Models;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Equipo\Genero;
use ioliga\Models\Campeonato\GeneroSerie;
use ioliga\Models\Campeonato\Asignacion;

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

    //busqueda de campeonatos a genero serie

    public function generoSerie()
    {
        return $this->hasManyThrough(
            GeneroSerie::class,
            Genero::class,
            'campeonato_id', // Foreign key on Genero table...
            'genero_id', // Foreign key on GeneroSerie table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }

    //busquedas para la vista

    public function generosVista()
    {
        return $this->hasMany(Genero::class,'campeonato_id')->orderBy('generoEquipo_id','asc');
    }
      public function generoSerieVista()
    {
        return $this->hasManyThrough(
            GeneroSerie::class,
            Genero::class,
            'campeonato_id', // Foreign key on Genero table...
            'genero_id', // Foreign key on GeneroSerie table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }
}   
