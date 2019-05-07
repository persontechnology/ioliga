<?php

namespace ioliga\Models;

use Illuminate\Database\Eloquent\Model;

class Estadio extends Model
{
    protected $table="estadio";

    protected $fillable = [
        'nombre', 'direccion', 'telefono','estado'
    ];

    // protected $hidden = [
    //     'usuarioCreado', 'usuarioActualizado',
    // ];
}
