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

@can('view', 'ioliga\Models\Estadio::class')
<li class="nav-item">
    <a href="{{ route('estadios') }}" class="nav-link" id="menuEstadio" title="Estadio">
        <i class="fas fa-table"></i>
        <span>
            {{ __('Stadium') }}
        </span>
    </a>
</li>
@endcan
@role('Administrador')
    <li class="nav-item-header">
        <div class="text-uppercase font-size-xs line-height-xs">{{ __('Sistema') }}</div> 
        <i class="icon-menu" title="Sistema"></i>
    </li>
    <li class="nav-item">
        <a href="{{ route('usuarios') }}" class="nav-link" id="menuUsuario">
            <i class="fas fa-users-cog"></i>
            <span>
                {{ __('Usuarios del sistema') }}
            </span>
        </a>
    </li>
@endrole
