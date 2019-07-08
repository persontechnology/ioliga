<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <!-- Site Title-->
    <title>@isset($titulo){{ $titulo }} |@endisset {{ config('app.name', 'LIGA') }}</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    {{--  <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>  --}}
    <link rel="icon" href="{{ asset('vendor/soccer/images/favicon.ico') }}" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Kanit:300,400,500,500i,600,900%7CRoboto:400,900">
    <link rel="stylesheet" href="{{ asset('vendor/soccer/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/soccer/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/soccer/css/style.css') }}" id="main-styles-link">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>


<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.3"></script>



    @php($nos=ioliga\Models\Nosotro::first())
    <div class="ie-panel">
      <a href="{{ url('/') }}">
        <img src="{{ asset('vendor/soccer/images/ie8-panel/warning_bar_0000_us.jpg') }}" height="42" width="820" alt="">
      </a>
    </div>
    <div id="preloader">
      <div class="preloader-body">
        <div class="preloader-item"></div>
      </div>
    </div>
    <!-- Page-->
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header rd-navbar-dark">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="166px" data-xl-stick-up-offset="166px" data-xxl-stick-up-offset="166px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-main"><span></span></button>
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel-inner container">
                <div class="rd-navbar-collapse rd-navbar-panel-item rd-navbar-panel-item-left">
                  <p>{{ $nos->nombre??config('app.name','LIGA') }}</p>
                </div>
                <div class="rd-navbar-panel-item rd-navbar-panel-item-right">
                  <ul class="list-inline list-inline-bordered">
                    
                      @auth
                      
                      <li>
                        <a href="{{ route('home') }}" class="link link-icon link-icon-left link-classic">
                          <i class="icon fa fa-home"></i>
                          Administración
                        </a>
                      </li>
                      <li>
                        <a class="link link-icon link-icon-left link-classic" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                          <span class="icon fa fa-user"></span>
                          <span class="link-icon-text">Salir del sistema</span>
                        </a>
                      </li>
                      @else
                      <li>
                      <a class="link link-icon link-icon-left link-classic" href="{{ route('home') }}">
                        <span class="icon fa fa-user"></span>
                        <span class="link-icon-text">Ingresar</span>
                      </a>
                    </li>
                      @endauth

                    
                  </ul>
                </div>
                <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
              </div>
            </div>
            <div class="rd-navbar-main">
              <div class="rd-navbar-main-top">
                <div class="rd-navbar-main-container container">
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <a class="brand" href="{{ url('/') }}">
                      @if(isset($nos->logo))
                        <img class="brand-logo " src="{{ Storage::url('public/nosotros/'.$nos->logo) }}" alt="" width="95" height="126"/>
                      @else
                        <img class="brand-logo " src="{{ asset('vendor/soccer/images/logo-soccer-default-95x126.png') }}" alt="" width="95" height="126"/>
                      @endif
                    </a>
                  </div>
                  <!-- RD Navbar List-->
                  <ul class="rd-navbar-list">
                    <li class="rd-navbar-list-item">
                      <a class="rd-navbar-list-link" href="#"><img src="{{ asset('vendor/soccer/images/partners-1-inverse-75x42.png') }}" alt="" width="75" height="42"/></a>
                    </li>
                    <li class="rd-navbar-list-item">
                      <a class="rd-navbar-list-link" href="#"><img src="{{ asset('vendor/soccer/images/partners-2-inverse-88x45.png') }}" alt="" width="88" height="45"/></a></li>
                    <li class="rd-navbar-list-item">
                      <a class="rd-navbar-list-link" href="#"><img src="{{ asset('vendor/soccer/images/partners-3-inverse-79x52.png') }}" alt="" width="79" height="52"/></a></li>
                  </ul>
                  <!-- RD Navbar Search-->
                  <div class="rd-navbar-search">
                    <div class="ml-5">
                      <div class="owl-carousel-navbar owl-carousel-inline-outer">
                    
               
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="rd-navbar-main-bottom rd-navbar-darker">
                <div class="rd-navbar-main-container container">
                  <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                        <li class="rd-nav-item" id="menuInicio">
                          <a class="rd-nav-link" href="{{ url('/') }}">Inicio</a>
                        </li>
                    
                        <li class="rd-nav-item" id="menuNosotros">
                          <a class="rd-nav-link" href="{{ route('nosotros') }}">Nosotros</a> 
                        </li>
                         <li class="rd-nav-item" id="menuEquipo">
                          <a class="rd-nav-link" href="{{ route('equipos-vista') }}">Equipos</a> 
                        </li>

                        <li class="rd-nav-item" id="menuCampeonato">
                            <a class="rd-nav-link" href="{{ route('campeonatos-vista') }}">Campeonatos</a> 
                        </li>
                        
                        <li class="rd-nav-item" id="menuNoticias">
                            <a class="rd-nav-link" href="{{ route('noticias') }}">Noticias</a> 
                        </li>
                        
                        <li class="rd-nav-item" id="menuContacto">
                          <a class="rd-nav-link" href="{{ route('contactos') }}">Contactos</a> 
                        </li>
                    </ul>
                  <div class="rd-navbar-main-element">
                    <ul class="list-inline list-inline-sm">
                      @if(isset($nos->facebook))
                      <li><a class="icon icon-xs icon-light fa fa-facebook" href="{{ $nos->facebook }}" target="_blank"></a></li>
                      @endif
                      @if(isset($nos->twitter))
                      <li><a class="icon icon-xs icon-light fa fa-twitter" href="{{ $nos->twitter }}" target="_blank"></a></li>
                      @endif
                      @if(isset($nos->youtube))
                      <li><a class="icon icon-xs icon-light fa fa-youtube" href="{{ $nos->youtube }}" target="_blank"></a></li>
                      @endif
                      @if(isset($nos->istagram))
                      <li><a class="icon icon-xs icon-light fa fa-instagram" href="{{ $nos->istagram }}" target="_blank"></a></li>
                      @endif
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      
      @yield('content')

      <!-- Page Footer-->
      <footer class="section footer-classic footer-classic-dark context-dark">
        <div class="footer-classic-main">
          <div class="container">
            <p class="heading-7">{{ $nos->nombre??'Acerca de nosotros' }}</p>
            <div class="row row-50">
              <div class="col-lg-5 text-center text-sm-left">
                <article class="unit unit-sm-horizontal unit-middle justify-content-center justify-content-sm-start footer-classic-info">
                  <div class="unit-left">
                    <a class="brand brand-md" href="{{ url('/') }}">
                      @if(isset($nos->logo))
                        <img class="brand-logo " src="{{ Storage::url('public/nosotros/'.$nos->logo) }}" alt="" width="95" height="126"/>
                      @else
                      <img class="brand-logo " src="{{ asset('vendor/soccer/images/logo-soccer-default-95x126.png') }}" alt="" width="95" height="126"/>
                      @endif
                    </a>
                  </div>
                  <div class="unit-body">
                    <p class="text-justify">
                      {{ $nos->acerca??'' }}
                    </p>
                  </div>
                </article>
                <ul class="list-inline list-inline-bordered list-inline-bordered-lg">
                  @if(isset($nos->email))
                  <li>
                    <div class="unit unit-horizontal unit-middle">
                      <div class="unit-left">
                          <i class="fas fa-envelope-open fa-3x" style="color:#00ae77;"></i>
                      </div>
                      <div class="unit-body">
                        <h6>Escribenos</h6>
                          <span class="text-white">{{ $nos->email??'' }}
                          </span>
                      </div>
                    </div>
                  </li>
                  @endif
                  @if(isset($nos->telefono))
                  <li>
                    <div class="unit unit-horizontal unit-middle">
                      <div class="unit-left">
                          <i class="fa fa-volume-control-phone fa-3x" style="color:#00ae77;"></i>
                      </div>
                      <div class="unit-body">
                        <h6>Contactanos</h6>
                          <span class="text-white" >{{ $nos->telefono }}
                          </span>
                      </div>
                    </div>
                  </li>
                  @endif
                </ul>
                <div class="group-md group-middle">
                  <div class="group-item">
                    <ul class="list-inline list-inline-xs">

                        @if(isset($nos->facebook))
                        <li><a class="icon icon-corporate fa fa-facebook" href="{{ $nos->facebook }}" target="_blank"></a></li>
                        @endif

                        @if(isset($nos->twitter))
                        <li><a class="icon icon-corporate fa fa-twitter" href="{{ $nos->twitter }}" target="_blank"></a></li>
                        @endif

                        @if(isset($nos->youtube))
                        <li><a class="icon icon-corporate fa fa-youtube" href="{{ $nos->youtube }}" target="_blank"></a></li>
                        @endif

                        @if(isset($nos->istagram))
                        <li><a class="icon icon-corporate fa fa-instagram" href="{{ $nos->istagram }}" target="_blank"></a></li>
                        @endif

                    </ul>
                  </div><a class="button button-sm button-gray-outline" href="{{route('contactos')}}">Estar en contacto</a>
                </div>
              </div>
              <div class="col-lg-7">
                <h5>Noticias populares</h5>
                <div class="divider-small divider-secondary"></div>
                <div class="row row-20">
                  @foreach(ioliga\Models\Noticia::where('estado',true)->latest()->take(2)->get() as $nof)
                  <div class="col-sm-6">
                    <!-- Post Classic-->
                    <article class="post-classic">
                      <div class="post-classic-aside">
                        <a class="post-classic-figure" href="blog-post.html">
                          <img src="{{ Storage::url('public/noticias/'.$nof->foto) }}" alt="" width="93" height="87"/>
                        </a>
                      </div>
                      <div class="post-classic-main">
                        <!-- Badge-->
                        
                        <p class="post-classic-title"><a href="{{ route('noticiaDetalle',$nof->id) }}">{{ $nof->titulo }}</a></p>
                        <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                          <time datetime="">{{ $nof->created_at }}</time>
                        </div>
                      </div>
                    </article>
                  </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-classic-aside footer-classic-darken">
          <div class="container">
            <div class="layout-center">
              <!-- Rights-->
              <a href="{{ url('/') }}">
              <p class="text-center text-success">
                <span>{{ $nos->nombre??config('app.name','LIGA') }}</span>
                <span>&nbsp;&copy;&nbsp;</span>
                <span class="">{{ date('Y') }}</span>
              </p>
            </a>
              
            </div>
          </div>
        </div>
      </footer>

      <!-- Modal Video-->
      <div class="modal modal-video fade" id="modal1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" width="560" height="315" id="contenedorUrlVideo" src="https://www.youtube.com/embed/46-Gaew_ClU"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="{{ asset('vendor/soccer/js/core.min.js') }}"></script>
    <script src="{{ asset('vendor/soccer/js/script.js') }}"></script>
    @stack('scriptsFooter')

    <script>
        function verVideoModal(arg){
          $('#contenedorUrlVideo').attr('src',$(arg).data('url'))
          $('#modal1').modal('show')
          
        }
    </script>
  </body>
  </html>