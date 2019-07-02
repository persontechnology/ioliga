<?php

namespace ioliga\Models\Nomina;

use Illuminate\Database\Eloquent\Model;
use ioliga\User;
use ioliga\Models\Equipo\Equipo;
use ioliga\Models\Campeonato\AsignacionNomina;
use ioliga\Models\Nomina\Nomina;
use ioliga\Models\Campeonato\Alineacion;
use DateTime;
class Nomina extends Model
{
    protected $table="nomina";

    protected $fillable = [
        'users_id', 'equipo_id','lugarProcedencia','nacionalidad','estado','detalle'
    ];
    public function user()
    {
    	return $this->belongsTo(User::class,'users_id');
    }
    public function equipo()
    {
    	return $this->belongsTo(Equipo::class,'equipo_id');
    }

    public function equipoUno()
    {
     
        return $this->hasOne(Equipo::class,'id','equipo_id');
    }
    public function usuarioUno()
    {
     
        return $this->hasOne(User::class,'id','users_id');
    }
    public function asignacionNomina()
    {
        return $this->hasMany(AsignacionNomina::class,'nomina_id');
    }
    public function asignacionNominaUno()
    {
     
        return $this->hasOne(AsignacionNomina::class,'id','nomina_id');
    }

    public function calcularaEdad($fecha)
    {
        $nacio = DateTime::createFromFormat('Y-m-d', $fecha);
        $calculo = $nacio->diff(new DateTime());
        $edad=  $calculo->y;    
        return $edad;
    }

    
    public function alineacionResultado()
    {
        return $this->hasManyThrough(
            Alineacion::class,//Taabla asignacion
            asignacionNomina::class,//Tabla genero serie 
            'nomina_id',//Id para igualar la tabla genero - genero serie
            'asignacionNomina_id',//Id para igualar la tabla asignacion genero serie 
            'id',
            'id' 
        );
    }
    public function vistaNomina($idnomina)
    {
        $nomina=Nomina::findOrFail($idnomina);
        return $nomina;
    }
}

