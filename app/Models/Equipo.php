<?php

namespace ioliga\Models;

use Illuminate\Database\Eloquent\Model;
use ioliga\User;

class Equipo extends Model
{
    protected $table="equipo";

    protected $fillable = [
        'nombre', 'resenaHistorico', 'localidad','telefono','anioCreacion','fraseIdentificacion','color','color1','color2','foto','estado'
    ];
    public function user()
    {
    	return $this->belongsTo(User::class, 'repre_id');
    }

}
