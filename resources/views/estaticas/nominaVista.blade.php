@extends('layouts.info',['titulo'=>'Nomina'])
@section('content')
@php($nos=ioliga\Models\Nosotro::first())
<!-- Section Breadcrumbs-->
<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
<div class="parallax-content breadcrumbs-custom context-dark">
  <div class="container">
    <h3 class="breadcrumbs-custom-title">Nómina de jugadores</h3>
    <ul class="breadcrumbs-custom-path">
       <li><a href="{{ url('/') }}">Inicio</a></li>      
      <li><a href="{{route('equipos-vista')}}">Equipos</a></li>
      <li class="active">Nómina del equipo {{$equipo->nombre}}</li>
    </ul>
  </div>
</div>
</section>
<section class="section section-sm bg-gray-100">      
<div class="container">
  <div class="row row-50">
    <div class="col-lg-12">
      <div class="row row-50">

        <div class="col-sm-12">
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Jugadores
              </h5>
            </div>
          </article>
          <div class="row row-30">
          	@if($equipo->nominasActivas)
            <div class="col-sm-6">
              <!-- Table Roster-->
              <div class="table-custom-responsive">
                <table class="table-custom table-roster">
                  <thead>
                    <tr>
                      <th colspan="6">Jugadores Activos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>NBR</td>
                      <td>Datos</td>
                      <td>P. Jugados</td>
                      <td>Goles</td>
                      <td>T. Amarillas</td>
                      <td>T. Rojas</td>
                    </tr>
                 
                    @foreach($equipo->nominasActivas as $nomi)
               
                    <tr>
                      <td>
                      	<div class="team-figure">
                      		<img src="{{ Storage::url('public/usuarios/'.$nomi->user->foto) }}" alt="" width="50" height="55">
                        </div>
                       </td>
                      <td>{{$nomi->user->apellidos . ' '. $nomi->user->nombres}}</td>
                      <td>{{$nomi->alineacionResultado->count()}}</td>
                      @php($toA=0 )
                      @php($toR=0 )
                      @php($toG=0 )
                      @foreach($nomi->alineacionResultado as $to)
                      	@php($toG=$toG+$to->goles)
                      	 	@php($toA=$toA+$to->amarillas)
                      	 	 	@php($toG=$toG+$to->rojas)
                      @endforeach
                      <td>
                      	{{$toG}}
                      </td>
                      <td>
                      	{{$toA}}
                      </td>
                      <td>
                      	{{$toR}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            <div class="col-sm-6">
 
            @if($equipo->nominasInactivas)
            <div class="col-sm-6">
              <!-- Table Roster-->
              <div class="table-custom-responsive">
                <table class="table-custom table-roster team2-blue">
                  <thead>
                    <tr>
                      <th colspan="6">Jugadores Inactivos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>NBR</td>
                      <td>Datos</td>
                      <td>P. Jugados</td>
                      <td>Goles</td>
                      <td>T. Amarillas</td>
                      <td>T. Rojas</td>
                    </tr>
                 
                    @foreach($equipo->nominasInactivas as $nomi)
               
                    <tr>
                      <td>
                      	<div class="team-figure">
                      		<img src="{{ Storage::url('public/usuarios/'.$nomi->user->foto) }}" alt="" width="50" height="55">
                        </div>
                       </td>
                      <td>{{$nomi->user->apellidos . ' '. $nomi->user->nombres}}</td>
                      <td>{{$nomi->alineacionResultado->count()}}</td>
                      @php($toA=0 )
                      @php($toR=0 )
                      @php($toG=0 )
                      @foreach($nomi->alineacionResultado as $to)
                      	@php($toG=$toG+$to->goles)
                      	 	@php($toA=$toA+$to->amarillas)
                      	 	 	@php($toG=$toG+$to->rojas)
                      @endforeach
                      <td>
                      	{{$toG}}
                      </td>
                      <td>
                      	{{$toA}}
                      </td>
                      <td>
                      	{{$toR}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @endif
            </div>

          </div>
        </div>
 
        <div class="col-sm-12">
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Mejores Jugadores
              </h5>
            </div>
          </article>
          @if($equipo->resultadoMejoreJugadores($equipo->id)->count()>0)
          <!-- Player Info Corporate-->
          @php($m=0)
          @foreach($equipo->resultadoMejoreJugadores($equipo->id) as $mejor)
          @php($m++)
       
          <div class="player-info-corporate {{$m==1?'player-info-other-team':''}}">
            <div class="player-info-figure">
              <div class="block-number"><span>{{$m}}</span></div>
              <div class="player-img"><img src="{{ Storage::url('public/usuarios/'.$mejor->vistaNomina($mejor->id)->user->foto) }}" alt="" width="268" height="200"/>
              </div>
              <div class="team-logo-img"><img src="{{ Storage::url('public/nosotros/'.$nos->logo) }}" alt="" width="233" height="233"/>
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
    </div>

  </div>
</div>
</section>
@push('scriptsFooter')
    <script>
        $('#menuEquipo').addClass('active');
    </script>
@endpush

@endsection