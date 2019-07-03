
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">
    <!-- Alternador móvil de barra lateral -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navegación
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /Alternador móvil de barra lateral -->
    <!-- Contenido de la barra lateral -->
    <div class="sidebar-content">
        <!-- Menú del Usuario -->
        <div class="sidebar-user-material">
            <div class="sidebar-user-material-body">
                <div class="card-body text-center">
                    <a href="#">
                        <img src="{{ asset('global_assets/images/demo/users/face6.jpg') }}" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
                    </a>
                    <h6 class="mb-0 text-white text-shadow-dark">
                        {{ Auth::user()->name }}
                    </h6>
                    <span class="font-size-sm text-white text-shadow-dark">
                        {{ Auth::user()->email }}
                    </span>
                </div>
                                            
                <div class="sidebar-user-material-footer">
                    <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>Mi cuenta</span></a>
                </div>
            </div>

            <div class="collapse" id="user-nav">
                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-user-plus"></i>
                            <span>Mi perfil</span>
                        </a>
                    </li>
                 
                   
            
                  
                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="icon-switch2"></i>
                            <span>Cerrar sesión</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /Menú del Usuario -->
        <!-- Navegación Principal -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

               @include('layouts.menuLateral')               

            </ul>
        </div>
        <!-- /Navegación Principal -->
    </div>
    <!-- /Contenido de la barra lateral -->
</div>

