 <!-- Principal -->
<li class="nav-item-header">
    <div class="text-uppercase font-size-xs line-height-xs">{{ __('Main') }}</div> 
    <i class="icon-menu" title="Main"></i>
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
    <a href="{{ route('estadios') }}" class="nav-link" id="menuEstadio">
        <i class="fas fa-table"></i>
        <span>
            {{ __('Stadium') }}
        </span>
    </a>
</li>
@endcan