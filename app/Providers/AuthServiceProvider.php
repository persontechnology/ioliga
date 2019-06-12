<?php

namespace ioliga\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use ioliga\Models\Estadio;
use ioliga\Policies\EstadioPolicy;
use ioliga\Policies\Usuarios\UsuarioPolicy;
use ioliga\Policies\NominaPolicy;
use ioliga\User;
use ioliga\Models\Campeonato;
use ioliga\Policies\CampeonatoPolicy;
use ioliga\Models\Nomina\Nomina;
use ioliga\Models\Equipo\Equipo;
use ioliga\Models\Equipo\GeneroEquipo;
use ioliga\Policies\EquipoPolicy;
use ioliga\Policies\GeneroEquipoPolicy;
use ioliga\Models\Campeonato\Etapa;
use ioliga\Models\Campeonato\Asignacion;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Estadio::class => EstadioPolicy::class,
        User::class=>UsuarioPolicy::class,
        Campeonato::class=>CampeonatoPolicy::class,
        Nomina::class=>NominaPolicy::class,
        GeneroEquipo::class=>GeneroEquipoPolicy::class,
        Equipo::class=>EquipoPolicy::class,
        Etapa::class=>EtapaPolicy::class,
        Asignacion::class=>AsignacionPolicy::class,



    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasAnyRole(['SuperAdministrador','Administrador']) ? true : null;
        });
    }
}
