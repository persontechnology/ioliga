<?php

namespace ioliga\Models\Equipo;

use Illuminate\Database\Eloquent\Model;
use ioliga\User;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Nomina\Nomina;
use ioliga\Models\Campeonato\Asignacion;
use ioliga\Models\Campeonato\Tabla;
use ioliga\Models\Campeonato\Resultado;
use Illuminate\Support\Facades\DB;
class Equipo extends Model
{
    protected $table="equipo";

    protected $fillable = [
        'nombre', 'resenaHistorico', 'users_id','generoEquipo_id','localidad','telefono','anioCreacion','fraseIdentificacion','color','color1','color2','foto','estado'
    ];
    public function user()
    {
    	return $this->belongsTo(User::class,'users_id');
    }
      public function genero()
    {
    	return $this->belongsTo(GeneroEquipo::class,'generoEquipo_id');
    }
      public function nominas()
    {
       return $this->hasMany(Nomina::class,'equipo_id');
    }

      public function nominasActivas()
    {
       return $this->hasMany(Nomina::class,'equipo_id')->where('estado',1);
    }
   public function nominasInactivas()
    {
       return $this->hasMany(Nomina::class,'equipo_id')->where('estado',0);
    }
    public function asignaciones()
    {
       return $this->hasMany(Asignacion::class,'equipo_id');
    }
    public function asignacionesVista()
    {
       return $this->hasMany(Asignacion::class,'equipo_id')->orderBy('id','desc');
    }

    public function resultadoMejoreJugadores($id)
    { 
      $result=Nomina::
      join('asignacionNomina','asignacionNomina.nomina_id','=', 'nomina.id')
      ->join('alineacion','alineacion.asignacionNomina_id','=', 'asignacionNomina.id')
      ->select('nomina.id',DB::raw('sum(alineacion.goles) as golesTotal'))
      ->where('equipo_id',$id)    
      ->groupBy('nomina.id')
      ->orderBy('golesTotal','DESC')
      ->limit(2)  
      ->get();
      return $result;
    }
   
   
}
