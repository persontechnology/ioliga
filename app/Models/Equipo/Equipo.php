<?php

namespace ioliga\Models\Equipo;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table="equipo";

    protected $fillable = [
        'nombre', 'resenaHistorico', 'users_id','generoEquipo_id','localidad','telefono','anioCreacion','fraseIdentificacion','color','color1','color2','foto','estado'
    ];
     public function user()
    {
    	return $this->belongsTo(User::class);
    }
      public function genero()
    {
    	return $this->belongsTo(GeneroEquipo::class);
    }

}
