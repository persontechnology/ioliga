<?php

namespace ioliga;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use ioliga\Models\Equipo\Equipo;
use ioliga\Models\Nomina\Nomina;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * Los atributos que se deben ocultar para las matrices.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function equipos()
    {
       return $this->hasMany(Equipo::class,'users_id');
    }

    public function nomina()
    {
       return $this->hasOne(Nomina::class,'users_id');
    }
    public function nominaUno()
    {
       return $this->hasOne(Nomina::class,'users_id');
    }
}
