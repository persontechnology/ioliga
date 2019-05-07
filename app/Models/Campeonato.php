<?php

namespace ioliga\Models;

use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
     protected $table="campeonato";

    protected $fillable = [
        'nombre', 'fechainicio', 'fechafin','descripcion','estado'
    ];

    protected $hidden = [
        // 'usuarioCreado', 'usuarioActualizado',
    ];
}
