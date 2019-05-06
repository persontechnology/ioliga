<?php

namespace ioliga\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use ioliga\Models\Estadio;
use ioliga\Policies\EstadioPolicy;
use ioliga\Policies\Usuarios\UsuarioPolicy;
use ioliga\User;

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
