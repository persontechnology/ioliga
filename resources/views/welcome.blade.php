<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <!-- Site Title-->
    <title>Home</title>
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
                  <!-- Owl Carousel-->
                  <div class="owl-carousel-navbar owl-carousel-inline-outer">
                    <div class="owl-inline-nav">
                      <button class="owl-arrow owl-arrow-prev"></button>
                      <button class="owl-arrow owl-arrow-next"></button>
                    </div>
                    <div class="owl-carousel-inline-wrap">
                      <div class="owl-carousel owl-carousel-inline" data-items="1" data-dots="false" data-nav="true" data-autoplay="true" data-autoplay-speed="3200" data-stage-padding="0" data-loop="true" data-margin="10" data-mouse-drag="false" data-touch-drag="false" data-nav-custom=".owl-carousel-navbar">
                        <!-- Post Inline-->
                        <article class="post-inline">
                          <time class="post-inline-time" datetime="2019">Enero 15, 2019</time>
                          <p class="post-inline-title">Sportland vs Dream Team</p>
                        </article>
                        <!-- Post Inline-->
                        <article class="post-inline">
                          <time class="post-inline-time" datetime="2019">Febrero 15, 2019</time>
                          <p class="post-inline-title">Sportland vs Real Madrid</p>
                        </article>
                        <!-- Post Inline-->
                        <article class="post-inline">
                          <time class="post-inline-time" datetime="2019">Marzo 15, 2019</time>
                          <p class="post-inline-title">Sportland vs Barcelona</p>
                        </article>
                      </div>
                    </div>
                  </div>
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
                    <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                    <form class="rd-search" action="#" data-search-live="rd-search-results-live" method="GET">
                      <div class="form-wrap">
                        <label class="form-label" for="rd-navbar-search-form-input">Ingrese su solicitud de búsqueda aquí...</label>
                        <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off">
                        <div class="rd-search-results-live" id="rd-search-results-live"></div>
                      </div>
                      <button class="rd-search-form-submit fl-budicons-launch-search81" type="submit"></button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="rd-navbar-main-bottom rd-navbar-darker">
                <div class="rd-navbar-main-container container">
                  <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                        <li class="rd-nav-item active">
                          <a class="rd-nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                    
                        <li class="rd-nav-item">
                          <a class="rd-nav-link" href="#">Nosotros</a> 
                        </li>

                        <li class="rd-nav-item">
                            <a class="rd-nav-link" href="#">Partidos</a> 
                        </li>
                        
                        <li class="rd-nav-item">
                            <a class="rd-nav-link" href="#">Noticias</a> 
                        </li>
                        
                        <li class="rd-nav-item">
                          <a class="rd-nav-link" href="#">Contactos</a> 
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
      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-classic bg-gray-2" data-loop="true" data-autoplay="4000" data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper">
          <div class="swiper-slide text-center" data-slide-bg="{{ asset('vendor/soccer/images/slider-1-slide-1-1920x671.jpg') }}">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-xl-6">
                  <div class="swiper-slide-caption">
                    <h1 data-caption-animate="fadeInUp" data-caption-delay="100">Nosotros jugamos futbol</h1>
                    <h4 data-caption-animate="fadeInUp" data-caption-delay="200">Unete a nosotros</h4>
                    <a class="button button-primary" data-caption-animate="fadeInUp" data-caption-delay="300" href="about-us.html">Conocer más</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide" data-slide-bg="{{ asset('vendor/soccer/images/slider-1-slide-2-1920x671.jpg') }}">
            <div class="container">
              <div class="row justify-content-end">
                <div class="col-xl-5">
                  <div class="swiper-slide-caption">
                    <h1 data-caption-animate="fadeInUp" data-caption-delay="100">Somos los mejores</h1>
                    <h4 data-caption-animate="fadeInUp" data-caption-delay="200">en todo lo relacionado con el fútbol</h4>
                    <a class="button button-primary" data-caption-animate="fadeInUp" data-caption-delay="300" href="about-us.html">Lee mas</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide" data-slide-bg="{{ asset('vendor/soccer/images/slider-1-slide-3-1920x671.jpg') }}">
            <div class="container">
              <div class="row">
                <div class="col-xl-5">
                  <div class="swiper-slide-caption">
                    <h1 data-caption-animate="fadeInUp" data-caption-delay="100">Mejor sitio web</h1>
                    <h4 data-caption-animate="fadeInUp" data-caption-delay="200">Para noticias de fútbol, ​​actualizaciones , <br class="d-none d-xl-block"> y resultados de juegos.</h4>
                    <a class="button button-primary" data-caption-animate="fadeInUp" data-caption-delay="300" href="about-us.html">Lee mas</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button swiper-button-prev"></div>
        <div class="swiper-button swiper-button-next"></div>
        <div class="swiper-pagination"></div>
      </section>

      <!-- Latest News-->
      <section class="section section-md bg-gray-100">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-8">
              <div class="main-component">
                <!-- Heading Component-->
                <article class="heading-component">
                  <div class="heading-component-inner">
                    <h5 class="heading-component-title">Noticias populares
                    </h5><a class="button button-xs button-gray-outline" href="news-1.html">Todas las noticias</a>
                  </div>
                </article>
                <div class="row row-30">
                  <div class="col-md-6">
                    <!-- Post Future-->
                    <article class="post-future">
                        <a class="post-future-figure" href="blog-post.html">
                            <img src="{{ asset('vendor/soccer/images/news-2-1-368x287.jpg') }}" alt="" width="368" height="287"/>
                        </a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Sadio mane still makes a difference, sam wilson admits</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-secondary">The Team
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2019">April 15, 2019</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Liverpool would love to welcome Philippe Coutinho back, but Sadio Mane is carrying...</p>
                        </div>
                        <div class="post-future-footer group-flex group-flex-xs">
                          <a class="button button-gray-outline" href="blog-post.html">Read more</a>
                          <div class="post-future-share">
                            <div class="inline-toggle-parent">
                              <div class="inline-toggle icon material-icons-share"></div>
                              <div class="inline-toggle-element">
                                <ul class="list-inline">
                                  <li>Share</li>
                                  <li><a class="icon fa-facebook" href="#"></a></li>
                                  <li><a class="icon fa-twitter" href="#"></a></li>
                                  <li><a class="icon fa-google-plus" href="#"></a></li>
                                  <li><a class="icon fa-instagram" href="#"></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <!-- Post Future-->
                    <article class="post-future">
                        <a class="post-future-figure" href="blog-post.html">
                            <img src="{{ asset('vendor/soccer/images/news-2-2-368x287.jpg') }}" alt="" width="368" height="287"/></a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Robertsons decent debut at european cup 2019</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-secondary">The Team
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2019">April 15, 2019</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Robertson, in his first Anfield outing as a Liverpool player, looked assured at left-back...</p>
                        </div>
                        <div class="post-future-footer group-flex group-flex-xs"><a class="button button-gray-outline" href="blog-post.html">Read more</a>
                          <div class="post-future-share">
                            <div class="inline-toggle-parent">
                              <div class="inline-toggle icon material-icons-share"></div>
                              <div class="inline-toggle-element">
                                <ul class="list-inline">
                                  <li>Share</li>
                                  <li><a class="icon fa-facebook" href="#"></a></li>
                                  <li><a class="icon fa-twitter" href="#"></a></li>
                                  <li><a class="icon fa-google-plus" href="#"></a></li>
                                  <li><a class="icon fa-instagram" href="#"></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <!-- Post Future-->
                    <article class="post-future">
                        <a class="post-future-figure" href="blog-post.html">
                            <img src="{{ asset('vendor/soccer/images/news-2-3-368x287.jpg') }}" alt="" width="368" height="287"/>
                        </a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Pochettino and ‘gaffer’s son’ Rose estranged – reports</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-secondary">The Team
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2019">April 15, 2019</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Danny Rose and Mauricio Pochettino were once so close that he was nicknamed “the gaffer’s...</p>
                        </div>
                        <div class="post-future-footer group-flex group-flex-xs"><a class="button button-gray-outline" href="blog-post.html">Read more</a>
                          <div class="post-future-share">
                            <div class="inline-toggle-parent">
                              <div class="inline-toggle icon material-icons-share"></div>
                              <div class="inline-toggle-element">
                                <ul class="list-inline">
                                  <li>Share</li>
                                  <li><a class="icon fa-facebook" href="#"></a></li>
                                  <li><a class="icon fa-twitter" href="#"></a></li>
                                  <li><a class="icon fa-google-plus" href="#"></a></li>
                                  <li><a class="icon fa-instagram" href="#"></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <!-- Post Future-->
                    <article class="post-future">
                        <a class="post-future-figure" href="blog-post.html">
                            <img src="{{ asset('vendor/soccer/images/news-2-4-368x287.jpg') }}" alt="" width="368" height="287"/>
                        </a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Coutinho’s camp: It was all Barca’s fault and we can prove it</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-secondary">The Team
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2019">April 15, 2019</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Philippe Coutinho is reportedly seeking clear-the-air talks with Liverpool after...</p>
                        </div>
                        <div class="post-future-footer group-flex group-flex-xs"><a class="button button-gray-outline" href="blog-post.html">Read more</a>
                          <div class="post-future-share">
                            <div class="inline-toggle-parent">
                              <div class="inline-toggle icon material-icons-share"></div>
                              <div class="inline-toggle-element">
                                <ul class="list-inline">
                                  <li>Share</li>
                                  <li><a class="icon fa-facebook" href="#"></a></li>
                                  <li><a class="icon fa-twitter" href="#"></a></li>
                                  <li><a class="icon fa-google-plus" href="#"></a></li>
                                  <li><a class="icon fa-instagram" href="#"></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-12">
                    <!-- Post Gloria-->
                    <article class="post-gloria"><img src="{{ asset('vendor/soccer/images/post-gloria-1-769x429.jpg') }}" alt="" width="769" height="429"/>
                      <div class="post-gloria-main">
                        <h3 class="post-gloria-title"><a href="blog-post.html">Premier League Winners and Losers: a quick look</a></h3>
                        <div class="post-gloria-meta">
                          <!-- Badge-->
                          <div class="badge badge-primary">The League
                          </div>
                          <div class="post-gloria-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2019">April 15, 2019</time>
                          </div>
                        </div>
                        <div class="post-gloria-text">
                          <svg version="1.1" x="0px" y="0px" width="6.888px" height="4.68px" viewbox="0 0 6.888 4.68" enable-background="new 0 0 6.888 4.68" xml:space="preserve">
                            <path d="M1.584,0h1.8L2.112,4.68H0L1.584,0z M5.112,0h1.776L5.64,4.68H3.528L5.112,0z"></path>
                          </svg>
                          <p>During this year’s premier league, we are glad to announce that there are new players who are...</p>
                        </div><a class="button" href="blog-post.html">Read more</a>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-12">
                    <!-- Post Future-->
                    <article class="post-future post-future-horizontal">
                        <a class="post-future-figure" href="blog-post.html">
                            <img src="{{ asset('vendor/soccer/images/news-3-1-370x325.jpg') }}" alt="" width="370" height="325"/></a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Zidane: “We’re not going to change the way we play at the Calderón”</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-red">hot<span class="icon mdi mdi-fire"></span>
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2019">April 15, 2019</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Zidane spoke to the media at the Real Madrid City. The Whites coach explained how the team is going in to the second leg of the Champions...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-12">
                    <!-- Post Future-->
                    <article class="post-future post-future-horizontal">
                        <a class="post-future-figure" href="blog-post.html">
                            <img src="{{ asset('vendor/soccer/images/news-3-2-370x325.jpg') }}" alt="" width="370" height="325"/></a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">NFL Will Handle Referee Pete Morelli’s Uose of Profanity Internally</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-primary">The League
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2019">April 15, 2019</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>The NFL will internally address referee Pete Morellis recent microphone gaffe, a league spokesman said, but it does not appear Morelli...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-12">
                    <!-- Swiper-->
                    <div class="swiper-container swiper-slider post-slider" data-loop="false" data-autoplay="false" data-simulate-touch="false">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <div class="swiper-slide-caption">
                            <!-- Post Alice-->
                            <article class="post-alice">
                                <img src="{{ asset('vendor/soccer/images/post-slide-1-769x397.jpg') }}" alt="" width="769" height="397"/>
                                <div class="post-alice-main">
                                <!-- Badge-->
                                <div class="badge badge-secondary">the team
                                </div>
                                <h3 class="post-alice-title"><a href="blog-post.html">Lewis named AIG MCAA 
Sevens head coach</a></h3>
                                <div class="divider"></div>
                                <div class="post-alice-time"><span class="icon mdi mdi-clock"></span>
                                    <time datetime="2019">April 15, 2019</time>
                                </div>
                                </div>
                            </article>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="swiper-slide-caption">
                            <!-- Post Alice-->
                            <article class="post-alice"><img src="{{ asset('vendor/soccer/images/post-slide-2-769x397.jpg') }}" alt="" width="769" height="397"/>
                                <div class="post-alice-main">
                                <!-- Badge-->
                                <div class="badge badge-primary">The League
                                </div>
                                <h3 class="post-alice-title"><a href="blog-post.html">rumors about world soccer championship 2019</a></h3>
                                <div class="divider"></div>
                                <div class="post-alice-time"><span class="icon mdi mdi-clock"></span>
                                    <time datetime="2019">April 15, 2019</time>
                                </div>
                                </div>
                            </article>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="swiper-slide-caption">
                            <!-- Post Alice-->
                            <article class="post-alice"><img src="{{ asset('vendor/soccer/images/post-slide-3-769x397.jpg') }}" alt="" width="769" height="397"/>
                                <div class="post-alice-main">
                                <!-- Post Video Button--><a class="post-video-button" href="#modal1" data-toggle="modal"><span class="icon material-icons-play_arrow"></span></a>
                                <h3 class="post-alice-title"><a href="blog-post.html">2019 Europa League Final</a></h3>
                                <div class="divider"></div>
                                <div class="post-alice-time"><span class="icon mdi mdi-clock"></span>
                                    <time datetime="2019">April 15, 2019</time>
                                </div>
                                </div>
                            </article>
                          </div>
                        </div>
                      </div>
                      <!-- Swiper Pagination-->
                      <div class="swiper-pagination"></div>
                      <!-- Swiper Navigation-->
                      <div class="swiper-button-prev"></div>
                      <div class="swiper-button-next"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <!-- Post Future-->
                    <article class="post-future post-future-horizontal">
                        <a class="post-future-figure" href="blog-post.html">
                            <img src="{{ asset('vendor/soccer/images/news-3-3-370x325.jpg') }}" alt="" width="370" height="325"/></a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Zidane: “We’re not going to change the way we play at the Calderón”</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-red">hot<span class="icon mdi mdi-fire"></span>
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2019">April 15, 2019</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Zidane spoke to the media at the Real Madrid City. The Whites coach explained how the team is going in to the second leg of the Champions...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
              <div class="main-component">
                <!-- Heading Component-->
                <article class="heading-component">
                  <div class="heading-component-inner">
                    <h5 class="heading-component-title">PRÓXIMO PARTIDO
                    </h5><a class="button button-xs button-gray-outline" href="sport-elements.html">Calendario</a>
                  </div>
                </article>
                <!-- Game Result Bug-->
                <article class="game-result">
                  <div class="game-info game-info-creative">
                    <p class="game-info-subtitle">Real Stadium - 
                      <time datetime="08:30"> 08:30 PM</time>
                    </p>
                    <h3 class="game-info-title">Champions league semi-final 2019</h3>
                    <div class="game-info-main">
                      <div class="game-info-team game-info-team-first">
                        <figure><img src="{{ asset('vendor/soccer/images/team-sportland-75x99.png') }}" alt="" width="75" height="99"/>
                        </figure>
                        <div class="game-result-team-name">Sportland</div>
                        <div class="game-result-team-country">Italy</div>
                      </div>
                      <div class="game-info-middle game-info-middle-vertical">
                        <time class="time-big" datetime="2019-06-17"><span class="heading-3">Fri 19</span> May 2019
                        </time>
                        <div class="game-result-divider-wrap"><span class="game-info-team-divider">VS</span></div>
                        <div class="group-sm">
                          <div class="button button-sm button-share-outline">Compartir
                            <ul class="game-info-share">
                              <li class="game-info-share-item"><a class="icon fa fa-facebook" href="#"></a></li>
                              <li class="game-info-share-item"><a class="icon fa fa-twitter" href="#"></a></li>
                              <li class="game-info-share-item"><a class="icon fa fa-google-plus" href="#"></a></li>
                              <li class="game-info-share-item"><a class="icon fa fa-instagram" href="#"></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="game-info-team game-info-team-second">
                        <figure><img src="{{ asset('vendor/soccer/images/team-dream-team-91x91') }}.png" alt="" width="91" height="91"/>
                        </figure>
                        <div class="game-result-team-name">Dream Team</div>
                        <div class="game-result-team-country">Spain</div>
                      </div>
                    </div>
                  </div>
                  <div class="game-info-countdown">
                    <div class="countdown countdown-bordered" data-type="until" data-time="18 Jun 2019 16:00" data-format="dhms" data-style="short"></div>
                  </div>
                </article>
              </div>
            </div>
            <!-- Aside Block-->
            <div class="col-lg-4">
              <aside class="aside-components">
                <div class="aside-component">
                  <div class="owl-carousel-outer-navigation-1">
                    <!-- Heading Component-->
                    <article class="heading-component">
                      <div class="heading-component-inner">
                        <h5 class="heading-component-title">Últimos resultados
                        </h5>
                        <div class="owl-carousel-arrows-outline">
                          <div class="owl-nav">
                            <button class="owl-arrow owl-arrow-prev"></button>
                            <button class="owl-arrow owl-arrow-next"></button>
                          </div>
                        </div>
                      </div>
                    </article>
                    <!-- Owl Carousel-->
                    <div class="owl-carousel owl-spacing-1" data-items="1" data-dots="false" data-nav="true" data-autoplay="true" data-autoplay-speed="4000" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false" data-animation-in="fadeIn" data-animation-out="fadeOut" data-nav-custom=".owl-carousel-outer-navigation-1">
                      <!-- Game Result Creative-->
                      <article class="game-result game-result-creative">
                        <div class="game-result-main-vertical">
                          <div class="game-result-team game-result-team-horizontal game-result-team-first">
                            <figure class="game-result-team-figure"><img src="{{ asset('vendor/soccer/images/team-sportland-31x41.png') }}" alt="" width="31" height="41"/>
                            </figure>
                            <div class="game-result-team-title">
                              <div class="game-result-team-name">Sportland</div>
                              <div class="game-result-team-country">Los angeles</div>
                            </div>
                            <div class="game-result-score game-result-score-big game-result-team-win">2<span class="game-result-team-label game-result-team-label-right">Win</span>
                            </div>
                          </div><span class="game-result-team-divider">VS</span>
                          <div class="game-result-team game-result-team-horizontal game-result-team-second">
                            <figure class="game-result-team-figure"><img src="{{ asset('vendor/soccer/images/team-fenix-40x32.png') }}" alt="" width="40" height="32"/>
                            </figure>
                            <div class="game-result-team-title">
                              <div class="game-result-team-name">Real madrid</div>
                              <div class="game-result-team-country">Spain</div>
                            </div>
                            <div class="game-result-score game-result-score-big">1
                            </div>
                          </div>
                        </div>
                        <div class="game-result-footer">
                          <ul class="game-result-details">
                            <li>Home</li>
                            <li>New Yorkers Stadium</li>
                            <li>
                              <time datetime="2019-04-14">April 14, 2019</time>
                            </li>
                          </ul>
                        </div>
                      </article>
                      <!-- Game Result Creative-->
                      <article class="game-result game-result-creative">
                        <div class="game-result-main-vertical">
                          <div class="game-result-team game-result-team-horizontal game-result-team-first">
                            <figure class="game-result-team-figure"><img src="{{ asset('vendor/soccer/images/team-bavaria-fc-26x34.png') }}" alt="" width="26" height="34"/>
                            </figure>
                            <div class="game-result-team-title">
                              <div class="game-result-team-name">Bavaria FC</div>
                              <div class="game-result-team-country">Germany</div>
                            </div>
                            <div class="game-result-score game-result-score-big">2
                            </div>
                          </div><span class="game-result-team-divider">VS</span>
                          <div class="game-result-team game-result-team-horizontal game-result-team-second">
                            <figure class="game-result-team-figure"><img src="{{ asset('vendor/soccer/images/team-athletic-33x30.png') }}" alt="" width="33" height="30"/>
                            </figure>
                            <div class="game-result-team-title">
                              <div class="game-result-team-name">Atletico</div>
                              <div class="game-result-team-country">USA</div>
                            </div>
                            <div class="game-result-score game-result-score-big game-result-team-win">3<span class="game-result-team-label game-result-team-label-right">Win</span>
                            </div>
                          </div>
                        </div>
                        <div class="game-result-footer">
                          <ul class="game-result-details">
                            <li>Away</li>
                            <li>Bavaria Stadium</li>
                            <li>
                              <time datetime="2019-04-14">April 14, 2019</time>
                            </li>
                          </ul>
                        </div>
                      </article>
                    </div>
                  </div>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">En el punto de mira
                      </h5><a class="button button-xs button-gray-outline" href="news-1.html">Todas las noticias</a>
                    </div>
                  </article>
                  <!-- List Post Classic-->
                  <div class="list-post-classic">
                    <!-- Post Classic-->
                    <article class="post-classic">
                      <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="{{ asset('vendor/soccer/images/blog-element-1-94x94.jpg') }}" alt="" width="94" height="94"/></a></div>
                      <div class="post-classic-main">
                        <p class="post-classic-title"><a href="blog-post.html">Raheem Sterling turns the tide for Manchester</a></p>
                        <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                          <time datetime="2019">April 15, 2019</time>
                        </div>
                      </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post-classic">
                      <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="{{ asset('vendor/soccer/images/blog-element-2-94x94.jpg') }}" alt="" width="94" height="94"/></a></div>
                      <div class="post-classic-main">
                        <p class="post-classic-title"><a href="blog-post.html">Prem in 90 seconds: Chelseas crisis is over!</a></p>
                        <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                          <time datetime="2019">April 15, 2019</time>
                        </div>
                      </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post-classic">
                      <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="{{ asset('vendor/soccer/images/blog-element-3-94x94.jpg') }}" alt="" width="94" height="94"/></a></div>
                      <div class="post-classic-main">
                        <p class="post-classic-title"><a href="blog-post.html">Good vibes back at struggling Schalke</a></p>
                        <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                          <time datetime="2019">April 15, 2019</time>
                        </div>
                      </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post-classic">
                      <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="{{ asset('vendor/soccer/images/blog-element-4-94x94.jpg') }}" alt="" width="94" height="94"/></a></div>
                      <div class="post-classic-main">
                        <p class="post-classic-title"><a href="blog-post.html">Liverpool in desperate need of backup players</a></p>
                        <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                          <time datetime="2019">April 15, 2019</time>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Posiciones
                      </h5><a class="button button-xs button-gray-outline" href="standings.html">Posiciones completas</a>
                    </div>
                  </article>
                  <!-- Table team-->
                  <div class="table-custom-responsive">
                    <table class="table-custom table-standings table-classic">
                      <thead>
                        <tr>
                          <th colspan="2">Posición del equipo</th>
                          <th>W</th>
                          <th>L</th>
                          <th>PTS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span>1</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="{{ asset('vendor/soccer/images/team-sportland-31x41.png') }}" alt="" width="31" height="41"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Sportland</div>
                              <div class="team-country">USA</div>
                            </div>
                          </td>
                          <td>153</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                        <tr>
                          <td><span>2</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="{{ asset('vendor/soccer/images/team-dream-team-34x34.png') }}" alt="" width="34" height="34"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Dream team</div>
                              <div class="team-country">Spain</div>
                            </div>
                          </td>
                          <td>120</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                        <tr>
                          <td><span>3</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="{{ asset('vendor/soccer/images/team-real-madrid-28x37.png') }}" alt="" width="28" height="37"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Real Madrid</div>
                              <div class="team-country">Spain</div>
                            </div>
                          </td>
                          <td>100</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                        <tr>
                          <td><span>4</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="{{ asset('vendor/soccer/images/team-celta-vigo-35x39.png') }}" alt="" width="35" height="39"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Celta Vigo</div>
                              <div class="team-country">Italy</div>
                            </div>
                          </td>
                          <td>98</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                        <tr>
                          <td><span>5</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="{{ asset('vendor/soccer/images/team-barcelona-30x35.png') }}" alt="" width="30" height="35"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Barcelona</div>
                              <div class="team-country">Spain</div>
                            </div>
                          </td>
                          <td>98</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                        <tr>
                          <td><span>6</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="{{ asset('vendor/soccer/images/team-bavaria-fc-26x34.png') }}" alt="" width="26" height="34"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Bavaria FC</div>
                              <div class="team-country">Germany</div>
                            </div>
                          </td>
                          <td>98</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Síguenos
                      </h5>
                    </div>
                  </article>
                  <!-- Buttons Media-->
                  <div class="group-sm group-flex"><a class="button-media button-media-facebook" href="#">
                      <h4 class="button-media-title">50k</h4>
                      <p class="button-media-action">Like<span class="icon material-icons-add_circle_outline icon-sm"></span></p><span class="button-media-icon fa-facebook"></span></a><a class="button-media button-media-twitter" href="#">
                      <h4 class="button-media-title">120k</h4>
                      <p class="button-media-action">Follow<span class="icon material-icons-add_circle_outline icon-sm"></span></p><span class="button-media-icon fa-twitter"></span></a><a class="button-media button-media-google" href="#">
                      <h4 class="button-media-title">15k</h4>
                      <p class="button-media-action">Follow<span class="icon material-icons-add_circle_outline icon-sm"></span></p><span class="button-media-icon fa-google"></span></a><a class="button-media button-media-instagram" href="#">
                      <h4 class="button-media-title">85k</h4>
                      <p class="button-media-action">Follow<span class="icon material-icons-add_circle_outline icon-sm"></span></p><span class="button-media-icon fa-instagram"></span></a></div>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Nuestros premios
                      </h5>
                    </div>
                  </article>
                  <!-- Owl Carousel-->
                  <div class="owl-carousel owl-carousel-dots-modern awards-carousel" data-items="1" data-autoplay="true" data-autoplay-speed="4000" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="true" data-margin="0" data-mouse-drag="true">
                      <!-- Awards Item-->
                      <div class="awards-item"> 
                        <div class="awards-item-main">
                          <h4 class="awards-item-title"><span class="text-accent">World</span>Champions
                          </h4>
                          <div class="divider"></div>
                          <h5 class="awards-item-time">December 2014</h5>
                        </div>
                        <div class="awards-item-aside"> <img src="{{ asset('vendor/soccer/images/thumbnail-minimal-1-67x147.png') }}" alt="" width="67" height="147"/>
                        </div>
                      </div>
                      <!-- Awards Item-->
                      <div class="awards-item"> 
                        <div class="awards-item-main">
                          <h4 class="awards-item-title"><span class="text-accent">Best</span>Forward
                          </h4>
                          <div class="divider"></div>
                          <h5 class="awards-item-time">June 2015</h5>
                        </div>
                        <div class="awards-item-aside"> <img src="{{ asset('vendor/soccer/images/thumbnail-minimal-2-68x126.png') }}" alt="" width="68" height="126"/>
                        </div>
                      </div>
                      <!-- Awards Item-->
                      <div class="awards-item"> 
                        <div class="awards-item-main">
                          <h4 class="awards-item-title"><span class="text-accent">Best</span>Coach
                          </h4>
                          <div class="divider"></div>
                          <h5 class="awards-item-time">November 2016</h5>
                        </div>
                        <div class="awards-item-aside"> <img src="{{ asset('vendor/soccer/images/thumbnail-minimal-3-73x135.png') }}" alt="" width="73" height="135"/>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Galería
                      </h5>
                    </div>
                  </article>
                  <article class="gallery" data-lightgallery="group">
                    <div class="row row-10 row-narrow">
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4"><a class="thumbnail-creative" data-lightgallery="item" href="{{ asset('vendor/soccer/images/gallery-soccer-1-original.jpg') }}"><img src="{{ asset('vendor/soccer/images/gallery-soccer-1-212x212.jpg') }}" alt=""/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4"><a class="thumbnail-creative" data-lightgallery="item" href="{{ asset('vendor/soccer/images/gallery-soccer-2-original.jpg') }}"><img src="{{ asset('vendor/soccer/images/gallery-soccer-2-212x212.jpg') }}" alt=""/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4"><a class="thumbnail-creative" data-lightgallery="item" href="{{ asset('vendor/soccer/images/gallery-soccer-3-original.jpg') }}"><img src="{{ asset('vendor/soccer/images/gallery-soccer-3-212x212.jpg') }}" alt=""/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4"><a class="thumbnail-creative" data-lightgallery="item" href="{{ asset('vendor/soccer/images/gallery-soccer-4-original.jpg') }}"><img src="{{ asset('vendor/soccer/images/gallery-soccer-4-212x212.jpg') }}" alt=""/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4"><a class="thumbnail-creative" data-lightgallery="item" href="{{ asset('vendor/soccer/images/gallery-soccer-5-original.jpg') }}"><img src="{{ asset('vendor/soccer/images/gallery-soccer-5-212x212.jpg') }}" alt=""/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4"><a class="thumbnail-creative" data-lightgallery="item" href="{{ asset('vendor/soccer/images/gallery-soccer-6-original.jpg') }}"><img src="{{ asset('vendor/soccer/images/gallery-soccer-6-212x212.jpg') }}" alt=""/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Mejores goleadores
                      </h5>
                    </div>
                  </article>
                  <div class="block-voting">
                    <div class="group-md">
                      <!-- Player Voting Item-->
                      <div class="player-voting-item">
                        <div class="player-voting-item-figure"><img src="{{ asset('vendor/soccer/images/player-5-152x144.jpg') }}" alt="" width="152" height="144"/>
                          <div class="player-number">
                            <p>21</p>
                          </div>
                        </div>
                        <div class="player-voting-item-title">
                          <p>Joe Montana</p>
                        </div>
                        <div class="player-voting-item-progress">
                          <!-- Linear progress bar-->
                          <article class="progress-linear progress-bar-modern progress-bar-modern-red">
                            <div class="progress-header">
                              <p>Pass Acc</p>
                            </div>
                            <div class="progress-bar-linear-wrap">
                              <div class="progress-bar-linear"></div>
                            </div><span class="progress-value">95</span>
                          </article>
                          <!-- Linear progress bar-->
                          <article class="progress-linear progress-bar-modern">
                            <div class="progress-header">
                              <p>Shots Acc</p>
                            </div>
                            <div class="progress-bar-linear-wrap">
                              <div class="progress-bar-linear"></div>
                            </div><span class="progress-value">70</span>
                          </article>
                        </div>
                        <button class="button button-block button-icon button-icon-left button-primary" type="button"><span class="icon material-icons-thumb_up"></span><span>854 votes</span></button>
                      </div>
                      <!-- Player Voting Item-->
                      <div class="player-voting-item">
                        <div class="player-voting-item-figure"><img src="{{ asset('vendor/soccer/images/player-6-152x144.jpg') }}" alt="" width="152" height="144"/>
                          <div class="player-number">
                            <p>7</p>
                          </div>
                        </div>
                        <div class="player-voting-item-title">
                          <p>George Blanda</p>
                        </div>
                        <div class="player-voting-item-progress">
                          <!-- Linear progress bar-->
                          <article class="progress-linear progress-bar-modern progress-bar-modern-red">
                            <div class="progress-header">
                              <p>Pass Acc</p>
                            </div>
                            <div class="progress-bar-linear-wrap">
                              <div class="progress-bar-linear"></div>
                            </div><span class="progress-value">95</span>
                          </article>
                          <!-- Linear progress bar-->
                          <article class="progress-linear progress-bar-modern">
                            <div class="progress-header">
                              <p>Shots Acc</p>
                            </div>
                            <div class="progress-bar-linear-wrap">
                              <div class="progress-bar-linear"></div>
                            </div><span class="progress-value">70</span>
                          </article>
                        </div>
                        <button class="button button-block button-icon button-icon-left button-primary" type="button"><span class="icon material-icons-thumb_up"></span><span>436 votes</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              
              </aside>
            </div>
          </div>
        </div>
      </section>
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
                          <span class="text-white">{{ $nos->email }}
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
                        
                        <li><a class="icon icon-corporate fa fa-google-plus" href="{{ $nos->youtube }}" target="_blank"></a></li>
                        @endif
                        @if(isset($nos->istagram))
                        <li><a class="icon icon-corporate fa fa-instagram" href="{{ $nos->istagram }}" target="_blank"></a></li>
                        
                        @endif


                      
                      
                      
                      
                    </ul>
                  </div><a class="button button-sm button-gray-outline" href="contact-us.html">Estar en contacto</a>
                </div>
              </div>
              <div class="col-lg-7">
                <h5>Noticias populares</h5>
                <div class="divider-small divider-secondary"></div>
                <div class="row row-20">
                  <div class="col-sm-6">
                    <!-- Post Classic-->
                    <article class="post-classic">
                      <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="{{ asset('vendor/soccer/images/footer-soccer-post-1-93x87.jpg') }}" alt="" width="93" height="87"/></a></div>
                      <div class="post-classic-main">
                        <!-- Badge-->
                        <div class="badge badge-secondary">The Team
                        </div>
                        <p class="post-classic-title"><a href="blog-post.html">Bundy stymies Blue Jays and Orioles hit 2 HRs</a></p>
                        <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                          <time datetime="2019">April 15, 2019</time>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-sm-6">
                          <!-- Post Classic-->
                          <article class="post-classic">
                            <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="{{ asset('vendor/soccer/images/footer-soccer-post-2-93x87.jpg') }}" alt="" width="93" height="87"/></a></div>
                            <div class="post-classic-main">
                              <!-- Badge-->
                              <div class="badge badge-red">Hot<span class="icon material-icons-whatshot"></span>
                              </div>
                              <p class="post-classic-title"><a href="blog-post.html">Good vibes back at struggling Schalke</a></p>
                              <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                <time datetime="2019">April 15, 2019</time>
                              </div>
                            </div>
                          </article>
                  </div>
                  <div class="col-sm-6">
                          <!-- Post Classic-->
                          <article class="post-classic">
                            <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="{{ asset('vendor/soccer/images/footer-soccer-post-3-93x87.jpg') }}" alt="" width="93" height="87"/></a></div>
                            <div class="post-classic-main">
                              <!-- Badge-->
                              <div class="badge badge-primary">The League
                              </div>
                              <p class="post-classic-title"><a href="blog-post.html">Prem in 90 seconds: Chelseas crisis is over!</a></p>
                              <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                <time datetime="2019">April 15, 2019</time>
                              </div>
                            </div>
                          </article>
                  </div>
                  <div class="col-sm-6">
                          <!-- Post Classic-->
                          <article class="post-classic">
                            <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="{{ asset('vendor/soccer/images/footer-soccer-post-4-93x87.jpg') }}" alt="" width="93" height="87"/></a></div>
                            <div class="post-classic-main">
                              <!-- Badge-->
                              <div class="badge badge-primary">The League
                              </div>
                              <p class="post-classic-title"><a href="blog-post.html">Liverpool in desperate need of backup players</a></p>
                              <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                <time datetime="2019">April 15, 2019</time>
                              </div>
                            </div>
                          </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-classic-aside footer-classic-darken">
          <div class="container">
            <div class="layout-justify">
              <!-- Rights-->
              <p class="rights">
                <span>{{ $nos->nombre??config('app.name','LIGA') }}</span>
                <span>&nbsp;&copy;&nbsp;</span>
                <span class="">{{ date('Y') }}</span>
                <span>.&nbsp;</span>
                <a class="link-underline" href="privacy-policy.html">Política de privacidad</a>
              </p>
              <nav class="nav-minimal">
                <ul class="nav-minimal-list">
                  <li class="active"><a href="{{ url('/') }}">Inicio</a></li>
                  <li><a href="#">Nosotros</a></li>
                  <li><a href="#">Equipos</a></li>
                  <li><a href="#">Noticias</a></li>
                  <li><a href="#">Contactos</a></li>
                </ul>
              </nav>
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
                <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/46-Gaew_ClU"></iframe>
                
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
  </body>
  </html>