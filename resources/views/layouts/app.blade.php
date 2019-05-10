<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@isset($titulo){{ $titulo }} |@endisset {{ config('app.name', 'IOLIGA') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Global stylesheets -->
    <link href="{{ asset('css/Roboto.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('global_assets/css/icons/fontawesome/styles.min.css') }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/ui/ripple.min.js') }}"></script>
    
    <link rel="stylesheet" href="{{ asset('plus/sweetalert/sweetalert.css') }}">
    <script src="{{ asset('plus/sweetalert/sweetalert.min.js') }}"></script>
    <!-- /core JS files -->
    <script src="{{ asset('/global_assets/js/demo_pages/form_checkboxes_radios.js') }}" type="text/javascript"></script>
    <!-- Theme JS files -->
    @stack('scriptsHeader')

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- /theme JS files -->
</head>

<body>

    <!-- Main navbar -->
    @include('layouts.barraPrincipal')
    <!-- /main navbar -->


    <!-- Contenido de página -->
    <div class="page-content">
        
        <!-- Barra lateral principal -->
        @auth
            @include('layouts.barraLateral')
        @endauth
        <!-- /Barra lateral principal -->

        <!-- Contenido principal -->
        <div class="content-wrapper">

            <!-- Encabezado de página -->
            <div class="page-header page-header-light">

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                           @yield('breadcrumbs')
                        </div>
                        @hasSection('acciones')
                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        @endif
                        
                    </div>

                    <div class="header-elements d-none">
                        <div class="breadcrumb justify-content-center">
                            @yield('acciones')
                        </div>
                    </div>

                </div>
            </div>
            <!-- /Encabezado de página -->


            <!-- Content area -->
            <div class="content">
                @include('layouts.alertas')
                @yield('content')

            </div>
            <!-- /content area -->


            <!-- pie de página -->
            @include('layouts.piePagina')
            <!-- /pie de página -->

        </div>
        <!-- /Contenido principal -->

    </div>
    <!-- /Contenido de página -->

    
   <script src="{{ asset('js/funciones.js') }}"></script>
    @stack('scriptsFooter')
</body>
</html>
