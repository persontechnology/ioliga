@extends('layouts.info',['titulo'=>'Bienvenido'])
@section('content')


@php($nosw=ioliga\Models\Nosotro::first())
@php($campAc=ioliga\Models\Campeonato::count())
@php($equipos=ioliga\Models\Equipo\Equipo::get())
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
              <a class="button button-primary" data-caption-animate="fadeInUp" data-caption-delay="300" href="{{ route('nosotros') }}">Conocer más</a>
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
              <a class="button button-primary" data-caption-animate="fadeInUp" data-caption-delay="300" href="{{ route('noticias') }}">Lee mas</a>
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
              <a class="button button-primary" data-caption-animate="fadeInUp" data-caption-delay="300" href="{{ url('equipos-vista') }}">Lee mas</a>
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
              </h5><a class="button button-xs button-gray-outline" href="{{ route('noticias') }}">Todas las noticias</a>
            </div>
          </article>
          <div class="row row-30">

          @foreach(ioliga\Models\Noticia::where('estado',true)->latest()->take(4)->get() as $now)
            <div class="col-md-6">
              <!-- Post Future-->
              <article class="post-future">
                  <a class="post-future-figure" href="{{ route('noticiaDetalle',$now->id) }}">
                      <img src="{{ Storage::url('public/noticias/'.$now->foto) }}" alt="" width="368" height="287"/>
                  </a>
                <div class="post-future-main">
                  <h4 class="post-future-title">
                    <a href="{{ route('noticiaDetalle',$now->id) }}">
                      {{ $now->titulo }}
                    </a></h4>
                  <div class="post-future-meta">
                    <!-- Badge-->
                    <div class="badge badge-secondary">La liga
                    </div>
                    <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                      <time datetime="">{{ $now->created_at }}</time>
                    </div>
                  </div>
                  <hr/>
                  <div class="post-future-text">
                    
                        
                    
                  </div>
                  <div class="post-future-footer group-flex group-flex-xs">
                    <a class="button button-gray-outline" href="{{ route('noticiaDetalle',$now->id) }}">ver detalle</a>
                    <div class="post-future-share">
                      <div class="inline-toggle-parent">
                        <div class="inline-toggle icon material-icons-share"></div>
                        <div class="inline-toggle-element">
                          <ul class="list-inline">
                              <div class="fb-share-button" data-href="{{ route('noticiaDetalle',$now->id) }}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('noticiaDetalle',$now->id) }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          @endforeach  

          

          </div>
        </div>

        <div class="main-component">
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
           
            </div>
          </article>
          <!-- Game Result Bug-->

          @if($campAc>0 )
          @if($campeonatoActivo->count() >0 )
          @php($campeo=$campeonatoActivo->first())
          <article class="game-result">
            <div class="game-info game-info-creative">
              <p class="game-info-subtitle">Campeonato Actual: {{$campeo->estado?'Activo':"Inactivo"}} 
         
              <a class="button button-xs button-gray-outline" href="{{route('calendario-vista',$campeo->id)}}">Calendario
              </a>
              </p>
              <h3 class="game-info-title">Campeonato: {{$campeo->nombre .' ' .$campeo->fechaInicio }}  </h3>
              <div class="game-info-main">
                <div class="game-info-team game-info-team-first">
                  <figure>  
                  @if(isset($nosw->logo))
                    <img class="brand-logo " src="{{ Storage::url('public/nosotros/'.$nosw->logo) }}" alt="" width="95" height="126"/>
                  @else
                   <img class="brand-logo " src="{{ asset('vendor/soccer/images/logo-soccer-default-95x126.png') }}" alt="" width="95" height="126"/>
                  @endif
                  </figure>
                  
                </div>
                <div class="game-info-middle game-info-middle-vertical">
                  <time class="time-big" datetime="2019-06-17"><span class="heading-3">{{$campeo->fechaInicio }} </span> al {{$campeo->fechaFin }} 
                  </time>          
                </div>
                <div class="game-info-team game-info-team-second">
                  @foreach($campeo->generos as $generos)
                 <div class="game-result-team-name">{{$generos->generoEquipo->nombre}}</div>
                 @foreach($generos->GenerosSeries as $generosse)
                  <div class="game-result-team-country">serie-"{{$generosse->serie->nombre}}"</div>
                  @endforeach
                   @endforeach
                </div>
              </div>
            </div>
            <div class="game-info-countdown">
              <div class="countdown countdown-bordered" data-type="until" data-time="18 Jun 2019 16:00" data-format="dhms" data-style="short"></div>
            </div>
          </article>
          @else
          <div class="heading-component-inner">
            <h5 class="heading-component-title">ver historial datos
            </h5>
          </div>
          @endif
          @else
          <div class="heading-component-inner">
            <h5 class="heading-component-title">No exiten datos
            </h5>
          </div>
          @endif


        </div>
      </div>
      <!-- Aside Block-->


   
      <div class="col-lg-4">
        <aside class="aside-components">

             <div class="aside-component">
                  <div class="owl-carousel-outer-navigation">
                    <!-- Heading Component-->
                    <article class="heading-component">
                      <div class="heading-component-inner">
                        <h5 class="heading-component-title">Equipos
                        </h5><a class="button button-xs button-gray-outline" href="{{route('equipos-vista')}}">Ver todos</a>
                        <div class="owl-carousel-arrows-outline">
                          <div class="owl-nav">
                            <button class="owl-arrow owl-arrow-prev"></button>
                            <button class="owl-arrow owl-arrow-next"></button>
                          </div>
                        </div>
                      </div>
                    </article>
                    <!-- Owl Carousel-->
                    <div class="owl-carousel owl-spacing-1" data-items="1" data-dots="false" data-nav="true" data-autoplay="true" data-autoplay-speed="4000" data-stage-padding="0" data-loop="false" data-margin="30" data-mouse-drag="false" data-nav-custom=".owl-carousel-outer-navigation">
                      @if($equipos->count()>0)
                      @foreach($equipos as $equi)
                      <article class="product">
                        <header class="product-header">
                          <!-- Badge-->
                          <div class="badge badge-{{$equi->estado==true?'secondary':'danger'}}">{{$equi->genero->nombre}}<span class="icon material-icons-whatshot"></span>
                          </div>
                          <div class="product-figure"><img width="200" height="200" src="{{ Storage::url('public/equipos/'.$equi->foto) }}" alt=""/></div>
                          <div class="product-buttons">
                           <a class="product-button" href="{{route('nomina-vista',$equi->id)}}" style="font-size: 20px"><i class="fa fa-user"></i></a>

                          <a class="product-button" href="{{route('equipo-vista',$equi->id)}}" style="font-size: 20px"> <i class="fa fa-list"></i></a>
                           <a class="product-button fl-bigmug-line-zoom60" href="{{ Storage::url('public/equipos/'.$equi->foto) }}" data-lightgallery="item" style="font-size: 25px"></a>
                          </div>
                        </header>
                        <footer class="product-content">
                          <h6 class="product-title"><a href="product-page.html">{{$equi->nombre}}</a></h6>
                          <div class="product-price"><span class="heading-6 product-price-new">Representante: {{$equi->user->nombres .' '. $equi->user->apellidos}}</span>
                          </div>
                       
                        </footer>
                      </article>
                      @endforeach
                      @endif

                    </div>
                  </div>
                </div>

          @if($campAc>0 )
          @if($campeonatoActivo->count() >0 )
          @foreach($campeonatoActivo as $campeonato)
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
                <div class="owl-carousel owl-spacing-1" data-items="1" data-dots="false" data-nav="true" data-autoplay="true" data-autoplay-speed="4000" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false" data-animation-in="fadeIn" data-animation-out="fadeOut" data-nav-custom=".owl-carousel-outer-navigation-1">
          @foreach($campeonato->generoSerieVista as $genero)
          @foreach($genero->etapaSerie as $etaSerie)
    
          @foreach($etaSerie->buscarPartidoVista as $partidos) 

      
              <!-- Owl Carousel-->
            
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
                     
          @endforeach
            
          @endforeach
          @endforeach
            </div> 
          </div>
          </div>
          @endforeach
           @else
          <div class="heading-component-inner">
            <h5 class="heading-component-title">ver historial datos
            </h5>
          </div>
          @endif
          @else
          <div class="heading-component-inner">
            <h5 class="heading-component-title">No exiten datos
            </h5>
          </div>
          @endif
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
            <div class="group-sm group-flex">
                @if(isset($nosw->facebook))
                <a class="button-media button-media-facebook" href="{{ $nosw->facebook }}">
                  <p class="button-media-action">Facebook</p>
                    <span class="button-media-icon fa-facebook"></span>
                </a>
                @endif
                @if(isset($nosw->twitter))
                  <a class="button-media button-media-twitter" href="{{ $nosw->twitter }}">
                      <p class="button-media-action">Twitter
                        
                      </p>
                      <span class="button-media-icon fa-twitter"></span>
                  </a>
                @endif
  
                @if(isset($nosw->youtube))
                  <a class="button-media button-media-google" href="{{ $nosw->youtube }}">
                    <p class="button-media-action">Youtube</p>
                      <span class="button-media-icon fa-youtube"></span>
                  </a>
                  @endif
                  @if(isset($nosw->istagram))
                  <a class="button-media button-media-instagram" href="{{ $nosw->istagram }}">
                      
                      <p class="button-media-action">Instagram
                      </p>
                    <span class="button-media-icon fa-instagram"></span>
                  </a>
                  @endif
            </div>
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
                    <h4 class="awards-item-title"><span class="text-accent">Copa</span>1
                    </h4>
                    <div class="divider"></div>
                    <h5 class="awards-item-time">Deciembre 2014</h5>
                  </div>
                  <div class="awards-item-aside"> <img src="{{ asset('vendor/soccer/images/thumbnail-minimal-1-67x147.png') }}" alt="" width="67" height="147"/>
                  </div>
                </div>
                <!-- Awards Item-->
                <div class="awards-item"> 
                  <div class="awards-item-main">
                    <h4 class="awards-item-title"><span class="text-accent">Copa</span>2
                    </h4>
                    <div class="divider"></div>
                    <h5 class="awards-item-time">Junio 2015</h5>
                  </div>
                  <div class="awards-item-aside"> <img src="{{ asset('vendor/soccer/images/thumbnail-minimal-2-68x126.png') }}" alt="" width="68" height="126"/>
                  </div>
                </div>
                <!-- Awards Item-->
                <div class="awards-item"> 
                  <div class="awards-item-main">
                    <h4 class="awards-item-title"><span class="text-accent">Copa</span>3
                    </h4>
                    <div class="divider"></div>
                    <h5 class="awards-item-time">Noviembre 2016</h5>
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



@push('scriptsFooter')
    <script>
        $('#menuInicio').addClass('active');
    </script>
@endpush


@endsection