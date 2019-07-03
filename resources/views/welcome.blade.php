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
              <div class="container">
                @foreach($campeo->generosVista as $genero)
                <div class="row row-30">
                    <div class="col-xl-12">
                    <article class="heading-component">
                      <div class="heading-component-inner">
                        <h5 class="heading-component-title">Tablas de Genero "{{$genero->generoEquipo->nombre}}"
                        </h5>
                      </div>
                    </article> 
                      @foreach($genero->GenerosSeries as $geSe)
                       <article class="heading-component">
                        <div class="heading-component-inner">
                          <h5 class="heading-component-title">Serie: "{{$geSe->serie->nombre}}"
                          </h5>
                        </div>
                      </article>
                      @foreach($geSe->etapaSerie as $etapaSerie)
                         <article class="heading-component">
                          <div class="heading-component-inner">
                            <h5 class="heading-component-title">Etapa: "{{$etapaSerie->etapa->nombre}}" Estado: "
                              {{$etapaSerie->etapa->estado==0?'Proceso':'Finalizada'}}"
                            </h5>
                          </div>
                        </article>
                            
                      <div class="container">
                        <div class="row row-50">                            
                          <div class="col-xl-12">                              
                            <div class="table-custom-responsive">
                              <table class="table-custom table-standings table-classic">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>N.</th>
                                    <th>P.J</th>
                                    <th>G.F</th>
                                    <th>PTS</th>
                                  </tr>
                                </thead>
                                <tbody>
                          @if($etapaSerie->tablas->count()>0)
                          @php($i=0)
                          @foreach($etapaSerie->resultado($etapaSerie->id) as $res)
                          @php($i++)
                          @php($h=$res->tabla($res->tabla_id)->puntosTotales($res->tabla($res->tabla_id)->partidosGanados->count(),$res->tabla($res->tabla_id)->partidosEmpatados->count(),$res->tabla($res->tabla_id)->bonificacion))
                            <tr >
                              <td class="bg-dark">{{$i}}</td>
                              <td>
                                <ul class="media-list">
                                  <li class="media">
                                    <div class="mr-3">
                                    <img src="{{ Storage::url('public/equipos/'.$res->tabla($res->tabla_id)->asignacion->equipos->foto) }}" class="rounded-circle" width="40" height="40" alt="">                        
                                  </div>
                                   <div class="media-body">
                                      <div class="media-title font-weight-semibold">{{$res->tabla($res->tabla_id)->asignacion->equipos->nombre}}</div>                                       
                                  </div>
                                    
                                  </li>
                                </ul>
                              </td>
                              
                              <td>
                                {{$res->tabla($res->tabla_id)->partidosGanados->count()}}
                              </td>
                              
                              <td>
                                {{$res->tabla($res->tabla_id)->golesTotal($res->tabla($res->tabla_id)->golesFavor->sum('golesFavor'),$res->tabla($res->tabla_id)->golesContra->sum('golesContra'))}}
                                
                              </td>
                              <td class="bg-dark">
                                {{$h}} 
                                
                              </td>             
                            </tr>
                            @endforeach
                            @endif                      
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                         @endforeach
                      @endforeach
                         
                    </div>
                </div>
                  @endforeach
                  
                </div>


            </div>
            <div class="game-info-countdown">
            
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

        <div class="aside-component">
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Mejores Jugadores
              </h5>
            </div>
          </article>
              <!-- Player Voting Item-->

              @if($mejorJugador->count()>0)
              @php($m=0)
              @foreach($mejorJugador as $mejor)
              @php($m++)
       
          <div class="player-info-corporate {{$m==1?'player-info-other-team':''}}">
            <div class="player-info-figure">
              <div class="block-number"><span>{{$m}}</span></div>
              <div class="player-img"><img src="{{ Storage::url('public/usuarios/'.$mejor->vistaNomina($mejor->id)->user->foto) }}" alt="" width="268" height="200"/>
              </div>
              <div class="team-logo-img"><img src="{{ Storage::url('public/nosotros/'.$nosw->logo) }}" alt="" width="233" height="233"/>
              </div>
            </div>
            <div class="player-info-main">
              <h4 class="player-info-title">{{$mejor->vistaNomina($mejor->id)->user->apellidos}}</h4>
              <p class="player-info-subtitle">{{$mejor->vistaNomina($mejor->id)->user->nombres}} </p>
              <hr/>
              <div class="player-info-table">
                <div class="table-custom-wrap">
                  <table class="table-custom">
                    <tr>
                      <th>Goles</th>
                      <th>{{$mejor->golesTotal}}</th>
                      <th>P. jugados</th>
                      <th>{{$mejor->vistaNomina($mejor->id)->alineacionResultado->count()}}</th>
                    </tr>
                  @php($toAJ=0 )
                  @php($toRJ=0 )
                  @php($toGJ=0 )
                  @foreach($mejor->vistaNomina($mejor->id)->alineacionResultado as $to)
                    @php($toGJ=$toGJ+$to->goles)
                    @php($toAJ=$toAJ+$to->amarillas)
                    @php($toGJ=$toGJ+$to->rojas)
                  @endforeach
                    <tr>
                      <td>Tarjetas Amarillas</td>
                      <td>{{$toAJ}}</td>
                      <td>Tarjetas Rojas</td>
                      <td>{{$toRJ}}</td>
                    </tr>
                    <tr>
                   
                  </table>
                </div>
              </div>
              <hr/>
 
            </div>
          </div>

              @endforeach
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
                          <h6 class="product-title"><a href="{{route('equipo-vista',$equi->id)}}">{{$equi->nombre}}</a></h6>
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
            
                  @foreach($etaSerie->fechasOrdenas as $fechas) 

                  @foreach($fechas->partidos as $par)
              <!-- Owl Carousel-->
            
                <!-- Game Result Creative-->
                <article class="game-result game-result-creative">
                  <div class="game-result-main-vertical">
                    <div class="game-result-team game-result-team-horizontal game-result-team-first">
                      <figure class="game-result-team-figure"><img src="{{ Storage::url('public/equipos/'.$par->asignacioUno->equipos->foto) }}" alt="" width="31" height="41"/>
                      </figure>
                      <div class="game-result-team-title">
                        <div class="game-result-team-name">{{$par->asignacioUno->equipos->nombre}}</div>
                        <div class="game-result-team-country">{{$par->asignacioUno->equipos->localidad}}</div>
                      </div>
                      <div class="game-result-score game-result-score-big game-result-team-win">
                     
                        {{$par->asignacioUno->calculoDeGOles($par->id)}}
                        @if($par->asignacioUno->calculoDeGOles($par->id)>$par->asignacioDos->calculoDeGOles($par->id))
                        <span class="game-result-team-label game-result-team-label-right">Ganador</span>
                        @endif
                      </div>
                    </div><span class="game-result-team-divider">VS</span>
                    <div class="game-result-team game-result-team-horizontal game-result-team-second">
                      <figure class="game-result-team-figure"><img src="{{ Storage::url('public/equipos/'.$par->asignacioDos->equipos->foto) }}" alt="" width="40" height="32"/>
                      </figure>
                      <div class="game-result-team-title">
                        <div class="game-result-team-name">{{$par->asignacioDos->equipos->nombre}}</div>
                        <div class="game-result-team-country">{{$par->asignacioDos->equipos->localidad}}</div>
                      </div>
                      <div class="game-result-score game-result-score-big game-result-team-win">
                        {{$par->asignacioDos->calculoDeGOles($par->id)}}
                        @if($par->asignacioDos->calculoDeGOles($par->id)>$par->asignacioUno->calculoDeGOles($par->id))
                        <span class="game-result-team-label game-result-team-label-right">Ganador</span>
                        @endif
                      </div>
                    </div>
                  </div>
              
                </article>
                <!-- Game Result Creative-->

                @endforeach
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
                    <h5 class="heading-component-title">Galeria
                    </h5>
                  </div>
                </article>
                @if($equipos->count()>0)
              
                <article class="gallery" data-lightgallery="group">
                  <div class="row row-10 row-narrow">
                    @foreach($equipos as $equi)
                    <div class="col-6 col-sm-4 col-md-6 col-lg-4"><a class="thumbnail-creative" data-lightgallery="item" href="{{ Storage::url('public/equipos/'.$equi->foto) }}"><img src="{{ Storage::url('public/equipos/'.$equi->foto) }}" alt=""/>
                        <div class="thumbnail-creative-overlay"></div></a>
                    </div>
                 
                    @endforeach
                  </div>
                </article>
           
                @endif
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