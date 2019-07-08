@extends('layouts.info',['titulo'=>'Campeonatos'])
@section('content')
@php($nos=ioliga\Models\Nosotro::first())
<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
<div class="parallax-content breadcrumbs-custom context-dark">
  <div class="container">
    <h3 class="breadcrumbs-custom-title">Campeonatos</h3>
    <ul class="breadcrumbs-custom-path">
       <li><a href="{{ url('/') }}">Inicio</a></li>      
     
      <li class="active">Campeonato</li>
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
      <h5 class="heading-component-title">Campeonatos
      </h5>
    </div>
  </article>
  <!-- Player Info Corporate-->
  <div class="player-info-corporate">
    <div class="player-info-figure">
      <div class="block-number"><span>1</span></div>
      <div class="player-img"> 
      	@if(isset($nos->logo))
        <img class="brand-logo " src="{{ Storage::url('public/nosotros/'.$nos->logo) }}" alt="" width="368" height="286"/>
      @else
        <img class="brand-logo " src="{{ asset('vendor/soccer/images/logo-soccer-default-95x126.png') }}" alt="" width="368" height="286"/>
      @endif
      </div>
      <div class="team-logo-img"><img src="images/logo-team-1-237x312.png" alt="" width="237" height="312"/>
      </div>
    </div>
    <div class="player-info-main">
      <h4 class="player-info-title">Sommos: {{$nos->nombre}}</h4>  
      <hr/>
      <div class="player-info-table">
        <div class="table-custom-wrap">
          <table class="table-custom">
            <tr>
              <th>Campeonatos</th>
              <th>{{$campeo->count()}}</th>
             
            </tr>
           
          </table>
        </div>
      </div>
      <hr/>
   
    </div>
  </div>
  <!--  Block Player Info-->
  <div class="block-player-info">
    <h4>Campeonatos</h4>
    <!-- Quote Modern-->
     <div class="block-player-info-timeline">
    @if($campeo->count()>0)
     @foreach($campeo as $cam)
   
      <div class="player-info-timeline-item">
        <div class="player-info-timeline-item-header">

        	<span class="timeline-counter">{{$cam->fechaInicio}}</span>
          <h5>{{$cam->nombre}}</h5>
        </div>
        <div class="player-info-timeline-item-text">
        	@if($cam->estado)
        	<span class="game-result-team-label">Activo</span>
        	@endif
        	<br>
          <p>{{$cam->descripcion}}.</p>
          <p>Fecha de Incio {{$cam->fechaInicio}} Fecha de Culminación {{$cam->fechaFin}}</p>
        
          	<div class="btn-group" role="group" aria-label="Basic example">
          	<a class="button button-xs button-gray-outline" href="{{route('calendario-vista',$cam->id)}}">Calendarios </a>
   			  <a class="button button-xs button-gray-outline" href="{{route('tabla-vista',$cam->id)}}">Tabla Posiciones </a>
         	
         
          </div>
       
        </div>
      </div>
       @endforeach
      @endif
    </div>
  </div>
</div>
<div class="col-lg-4"> 
  <div class="row row-30">
    <div class="col-md-6 col-lg-12">
      <!-- Heading Component-->
      <article class="heading-component">
        <div class="heading-component-inner">
          <h5 class="heading-component-title">Equipos con más partidos ganados
          </h5>
      
        </div>
      </article>
      <!-- List Statistics-->

      <ul class="list-statictics">
      	@if($mejorEquipo->count()>0)
      	@foreach($mejorEquipo as $mejor)
        <li>
    		<div class="team-figure">
	      		<img src="{{ Storage::url('public/equipos/'.$mejor->equipo($mejor->id)->foto) }}" alt="" width="50" height="55">
            </div>
        	<a href="{{route('equipo-vista',$mejor->id)}}">{{$mejor->equipo($mejor->id)->nombre}}</a>
        	<span class="list-statictics-counter">{{$mejor->equipo($mejor->id)->genero->nombre}}</span>
        	<span class="list-statictics-counter">{{$mejor->partidosGanados}}</span>
        </li>
        </li>
        @endforeach
        @endif

      </ul>
    </div>
  
    <div class="col-md-6 col-lg-12">
      <!-- Heading Component-->
      <article class="heading-component">
        <div class="heading-component-inner">
          <h5 class="heading-component-title">Mejores Jugadores
          </h5>
        </div>
      </article>
      <ul class="list-statictics">
      	@if($mejorJugador->count()>0)
      	@foreach($mejorJugador as $mejor)
        <li>
    		<div class="team-figure">
	      		<img src="{{ Storage::url('public/usuarios/'.$mejor->vistaNomina($mejor->id)->user->foto) }}" alt="" width="50" height="55">
            </div>
        	<span class="list-statictics-counter">{{$mejor->vistaNomina($mejor->id)->user->apellidos .' '. $mejor->vistaNomina($mejor->id)->user->nombres}}</span>
        	
        	<span class="list-statictics-counter">G.T {{$mejor->golesTotal}}</span>
        </li>
        </li>
        @endforeach
        @endif

      </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</section>


@push('scriptsFooter')
    <script>
        $('#menuCampeonato').addClass('active');
    </script>
@endpush
@endsection