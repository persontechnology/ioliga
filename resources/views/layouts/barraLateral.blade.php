
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
                        <a href="#" class="nav-link">
                            <i class="icon-coins"></i>
                            <span>Mi balance</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-comment-discussion"></i>
                            <span>Mensajes</span>
                            <span class="badge bg-teal-400 badge-pill align-self-center ml-auto">58</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-cog5"></i>
                            <span>Configuraciones de la cuenta</span>
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

                <!-- Principal -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Principal</div> 
                    <i class="icon-menu" title="Main"></i>
                </li>

                <li class="nav-item">
                    <a href="index.html" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>
                            {{ __('Inicio') }}
                        </span>
                    </a>
                </li>
                <!-- /Principal -->

                <!-- Diseño -->
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-tree5"></i> <span>Menu levels</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Menu levels">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-IE"></i> Second level</a></li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-firefox"></i> Second level with child</a>
                            <ul class="nav nav-group-sub">
                                <li class="nav-item"><a href="#" class="nav-link"><i class="icon-android"></i> Third level</a></li>
                                <li class="nav-item nav-item-submenu">
                                    <a href="#" class="nav-link"><i class="icon-apple2"></i> Third level with child</a>
                                    <ul class="nav nav-group-sub">
                                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-html5"></i> Fourth level</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-css3"></i> Fourth level</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="icon-windows"></i> Third level</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chrome"></i> Second level</a></li>
                    </ul>
                </li>
                <!-- /Diseño -->


                <!-- tablas -->
                <li class="nav-item nav-item-submenu nav-item-expanded nav-item-open">
                    <a href="#" class="nav-link"><i class="icon-alignment-unalign"></i> <span>Data tables extensions</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Data tables extensions">
                        <li class="nav-item"><a href="datatable_extension_reorder.html" class="nav-link">Columns reorder</a></li>
          
                        <li class="nav-item nav-item-submenu nav-item-expanded nav-item-open">
                            <a href="#" class="nav-link">Buttons</a>
                            <ul class="nav nav-group-sub">
                               
                                <li class="nav-item"><a href="datatable_extension_buttons_print.html" class="nav-link">Print buttons</a></li>
                                <li class="nav-item"><a href="datatable_extension_buttons_html5.html" class="nav-link active">HTML5 buttons</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="datatable_extension_colvis.html" class="nav-link">Columns visibility</a></li>
                    </ul>
                </li>
                <!-- /tablas -->

               

            </ul>
        </div>
        <!-- /Navegación Principal -->
    </div>
    <!-- /Contenido de la barra lateral -->
</div>

