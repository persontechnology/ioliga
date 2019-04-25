 <!-- Principal -->
<li class="nav-item-header">
    <div class="text-uppercase font-size-xs line-height-xs">{{ __('Main') }}</div> 
    <i class="icon-menu" title="Main"></i>
</li>

<li class="nav-item">
    <a href="index.html" class="nav-link">
        <i class="icon-home4"></i>
        <span>
            {{ __('Home') }}
        </span>
    </a>
</li>
<!-- /Principal -->

{{-- estadio --}}

@can('Menu estadio')
<li class="nav-item" id="menu_estadio">
    <a href="{{ route('estadios') }}" class="nav-link">
        <i class="fas fa-table"></i>
        <span>
            {{ __('Stadium') }}
        </span>
    </a>
</li>
@endcan