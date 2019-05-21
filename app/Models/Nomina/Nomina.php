<?php

namespace ioliga\Models\Nomina;

use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $table="nomina";

    protected $fillable = [
        'users_id', 'equipo_id', 'users_id','lugarProcedencia','nacionalidad','estado','detalle'
    ];
    public function user()
    {
    	return $this->belongsTo(User::class,'users_id');
    }
      public function equipo()
    {
    	return $this->belongsTo(Equipo::class,'equipo_id');
    }
}
