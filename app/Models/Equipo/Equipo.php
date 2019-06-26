<?php

namespace ioliga\Models\Equipo;

use Illuminate\Database\Eloquent\Model;
use ioliga\User;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Models\Nomina\Nomina;
use ioliga\Models\Campeonato\Asignacion;
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

    public function asignaciones()
    {
       return $this->hasMany(Asignacion::class,'equipo_id');
    }
    public function asignacionesVista()
    {
       return $this->hasMany(Asignacion::class,'equipo_id')->orderBy('id','desc');
    }

}
