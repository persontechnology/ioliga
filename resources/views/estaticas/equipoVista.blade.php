@extends('layouts.info',['titulo'=>'Equipos'])
@section('content')
@php($nos=ioliga\Models\Nosotro::first())
<!-- Privacy Policy-->
<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
<div class="parallax-content breadcrumbs-custom context-dark">
  <div class="container">
    <h3 class="breadcrumbs-custom-title">Nómina de jugadores</h3>
    <ul class="breadcrumbs-custom-path">
       <li><a href="{{ url('/') }}">Inicio</a></li>      
      <li><a href="{{route('equipos-vista')}}">Equipos</a></li>
      <li class="active">{{$equipo->nombre}}</li>
    </ul>
  </div>
</div>
</section>

<section class="section section-md bg-gray-100">
<div class="container"> 
  <div class="row row-30">
    <div class="col-lg-8">
      <!-- Heading Component-->
      <article class="heading-component">
        <div class="heading-component-inner">
          <h5 class="heading-component-title">Nombre: {{$equipo->nombre}}
          </h5>
          <a class="button button-xs button-gray-outline" href="{{route('nomina-vista',$equipo->id)}}">Mis jugadores</a>
        </div>
      </article>
      <!-- Player Info Corporate-->
      <div class="player-info-corporate">
        <div class="player-info-figure">
          <div class="block-number"><span>{{$equipo->anioCreacion}}</span></div>
          <div class="player-img">
            <img src="{{ Storage::url('public/equipos/'.$equipo->foto) }} " alt="" width="368" height="286"/>
          </div>
          <div class="team-logo-img">
            <img src="{{ Storage::url('public/nosotros/'.$nos->logo) }}" alt="" width="237" height="312"/>
          </div>
        </div>
        <div class="player-info-main">
          <h4 class="player-info-title">{{$equipo->user->apellidos . ' ' . $equipo->user->nombres}}</h4>
          <p class="player-info-subtitle">Representante</p>
          <hr/>
          <div class="player-info-table">
            <div class="table-custom-wrap">
              <table class="table-custom">
                <tr>
                  <th>Género</th>
                  <th>{{$equipo->genero->nombre}}</th>
                  <th>Localidad</th>
                  <th>{{$equipo->localidad}}</th>
             
                </tr>
                <tr>
                  <td>Año creación</td>
                  <td>{{$equipo->anioCreacion}}</td>
                  <th>Color</th>
                  <th>{{$equipo->color}}</th>
                </tr>
              </table>
            </div>
          </div>
          <hr/>
 
        </div>
      </div>
      <!--  Block Player Info-->
      <div class="block-player-info">
        <h4>Reseña histórica</h4>
        <!-- Quote Modern-->
        <article class="quote-modern"> 
          <div class="quote-modern-text">
            <p>{{$equipo->fraseIdentificacion}}</p>
          </div>
        </article>
        <div class="block-player-info-content">
          <p>{{$equipo->resenaHistorica}} </p>
        </div>

        <div class="block-player-info-timeline">
          @foreach($equipo->asignacionesVista as $asig)
          <div class="player-info-timeline-item">
            <div class="player-info-timeline-item-header"><span class="timeline-counter player-info-subtitle">{{$asig->unoGeneroSerie->genero->campeonato->fechaInicio}}</span>
              <h5 class="text-danger">Campeonato : {{$asig->unoGeneroSerie->genero->campeonato->nombre}} Serie: {{$asig->unoGeneroSerie->serie->nombre}}</h5>
            </div>
            <div class="player-info-timeline-item-text">
              @if($asig->unoGeneroSerie->genero->campeonato->estado)
              <span class="game-result-team-label">Activo</span> <br>
              @endif
              <div class="table-game-info-wrap"><span class="table-game-info-title">Estadísticas<span></span></span>
                    <div class="table-game-info-main table-custom-responsive">
                      <table class="table-custom table-game-info">
                        <tbody>
                          <tr>
                            <td class="table-game-info-number">{{$asig->asignacionNomninas->count()}}</td>
                            <td class="table-game-info-category">Nómina</td>
                            <td class="table-game-info-number">{{$asig->asignacionNomninas->count()}}</td>
                          </tr>
                           <tr>
                            <td class="table-game-info-number">{{$asig->tablas->count()}}</td>
                            <td class="table-game-info-category">Etapas participadas DE --</td>
                            <td class="table-game-info-number">{{$asig->unoGeneroSerie->etapaSerie->count()}}</td>
                          </tr>
                          <tr>
                            <td class="table-game-info-number">{{$asig->resultadosVista->count()}}</td>
                            <td class="table-game-info-category">PArtidos Jugados de --</td>
                            <td class="table-game-info-number">{{$asig->tablas->count()}}</td>
                          </tr>
                        
                         <tr>
                            <td class="table-game-info-number">{{$asig->resultadosVistaGanado->count()}}</td>
                            <td class="table-game-info-category">PArtidos ganados  de --</td>
                            <td class="table-game-info-number">{{$asig->tablas->count()}}</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-4"> 
      <div class="row row-30">
        <div class="col-md-6 col-lg-12">
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Estadisticas Totales
              </h5>
            
            </div>
          </article>
          <!-- List Statistics-->
          <ul class="list-statictics">
            <li><a href="#">Campeonatos Participados</a><span class="list-statictics-counter">{{$equipo->asignaciones->count()}}</span></li>
             </ul>
        </div>
        <div class="col-md-6 col-lg-12"> 
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Judadores activos
              </h5>
            </div>
          </article>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-carousel-dots-modern awards-carousel" data-items="1" data-autoplay="true" data-autoplay-speed="4000" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="true" data-margin="0" data-mouse-drag="true">
            <!-- Awards Item-->
            @foreach($equipo->nominasActivas as $nomina)
            <div class="awards-item"> 
              <div class="awards-item-main">
                <h4 class="awards-item-title"><span class="text-accent">{{$nomina->user->apellidos}}</span>{{$nomina->user->nombres}}
                </h4>
                <div class="divider"></div>
                <h5 class="awards-item-time">{{Carbon\Carbon::parse($nomina->user->fechaNacimiento)->age}} Años</h5>
              </div>
              <div class="awards-item-aside"> <img src="images/thumbnail-minimal-1-67x147.png" alt="" width="67" height="147"/>
              </div>
            </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</section>
<!-- Page Footer-->
@push('scriptsFooter')
    <script>
        $('#menuEquipo').addClass('active');
    </script>
@endpush
@endsection