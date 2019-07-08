<?php

namespace ioliga\Models;

use Illuminate\Database\Eloquent\Model;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Equipo\Genero;
use ioliga\Models\Campeonato\GeneroSerie;
use ioliga\Models\Campeonato\Asignacion;
use Illuminate\Support\Facades\DB;
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

    public function contadorDeAsignaciones($camp)
    {
        $result=Campeonato::
        join('genero','genero.campeonato_id','=', 'campeonato.id')    
        ->join('generoSerie','generoSerie.genero_id','=', 'genero.id')
        ->join('asignacion','asignacion.generoSerie_id','=', 'generoSerie.id')
        ->select('campeonato.id',DB::raw('count(campeonato.id) as total'))
        ->where('campeonato.id',$camp)      
        ->groupBy('campeonato.id')    
        ->get();
        return $result;
    }
   
}   
