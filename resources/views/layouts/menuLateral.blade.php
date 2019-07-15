 <!-- Principal -->
<li class="nav-item-header">
    <div class="text-uppercase font-size-xs line-height-xs">{{ __('Main') }}</div> 
    <i class="icon-menu" title="Principal"></i>
</li>

<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link" id="menuHome">
        <i class="icon-home4"></i>
        <span>
            {{ __('Home') }}
        </span>
    </a>
</li>
<!-- /Principal -->

{{-- estadio --}}

@can('ver', ioliga\Models\Estadio::class)
<li class="nav-item">
    <a href="{{ route('estadios') }}" class="nav-link" id="menuEstadio" title="Estadio">
        <i class="fas fa-table"></i>
        <span>
            {{ __('Stadium') }}
        </span>
    </a>
</li>
@endcan
{{-- equipos --}}

@can('Ver categorias', 'ioliga\Models\Equipo\GeneroEquipo::class')
<li class="nav-item">
    <a href="{{ route('categorias') }}" class="nav-link" id="menuEquipo" title="Equipos">
        <i class="fas fa-futbol"></i>
        <span>
            {{ __('Equipos') }}
        </span>
    </a>
</li>
@endcan

{{-- campeonatos --}}

@can('ver', ioliga\Models\Campeonato::class)
<li class="nav-item">
    <a href="{{ route('campeonatos') }}" class="nav-link" id="menuCampeo" title="Campeonato">
        <i class="fas fa-trophy"></i>
        <span>
            {{ __('Campeonato') }}
        </span>
    </a>
</li>
@endcan



@can('representante', ioliga\Models\Nomina\Nomina::class)
    <li class="nav-item">
        <a href="{{ route('mis-equipos') }}" class="nav-link" id="menuNominare">
            <i class="fas fa-users-cog"></i>
            <span>
                {{ __('Mis equipos') }}
            </span>
        </a>
    </li>
@endcan

@can('Ver mis campeonatos', ioliga\Models\Campeonato::class)
    <li class="nav-item">
        <a href="{{ route('listar-mis-equipo') }}" class="nav-link" id="menuNominare">
            <i class="fas fa-trophy"></i>
            <span>
                {{ __('Mis Campeonatos') }}
            </span>
        </a>
    </li>
@endcan

@can('administrarNoticias', ioliga\Models\Noticia::class)
    <li class="nav-item">
        <a href="{{ route('noticiasAdmin') }}" class="nav-link" id="menuNoticias">
            <i class="far fa-newspaper"></i>
            <span>
                {{ __('Noticias') }}
            </span>
        </a>
    </li>
@endcan

    <li class="nav-item">
        <a href="{{ route('mis-participaciones') }}" class="nav-link" id="menuparticipaciones">
            <i class="far fa-newspaper"></i>
            <span>
                {{ __('Mis participaciones') }}
            </span>
        </a>
    </li>


    <li class="nav-item-header">
        <div class="text-uppercase font-size-xs line-height-xs">{{ __('Sistema') }}</div> 
        <i class="icon-menu" title="Sistema"></i>
    </li>

@can('ver', ioliga\User::class)
    <li class="nav-item">
        <a href="{{ route('usuarios') }}" class="nav-link" id="menuUsuario">
            <i class="fas fa-users-cog"></i>
            <span>
                {{ __('Usuarios del sistema') }}
            </span>
        </a>
    </li>
@endcan

@role('Administrador|SuperAdministrador')
    <li class="nav-item">
        <a href="{{ route('roles') }}" class="nav-link" id="menuRoles">
            <i class="fas fa-clipboard-check"></i>
            <span>
                {{ __('Roles') }}
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('nosotrosAdmin') }}" class="nav-link" id="menuNosotros">
            <i class="fas fa-cogs"></i>
            <span>
                {{ __('Nosotros') }}
            </span>
        </a>
    </li>

@endrole
