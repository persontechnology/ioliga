@extends('layouts.info',['titulo'=>'Tabla'])
@section('content')
@php($nos=ioliga\Models\Nosotro::first())

<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
<div class="parallax-content breadcrumbs-custom context-dark">
  <div class="container">
    <h3 class="breadcrumbs-custom-title">Tabla</h3>
    <ul class="breadcrumbs-custom-path">
       <li><a href="{{ url('/') }}">Inicio</a></li>      
    	<li><a href="{{ url('campeonato-vista') }}">Campeonatos</a></li> 
      <li class="active">Tabla de posiciones</li>
    </ul>
  </div>
</div>
</section>

<section class="section section-sm bg-gray-100">
<div class="container">
	@foreach($campeo->generosVista as $genero)
	<div class="row row-30">
	    <div class="col-lg-7 col-xl-12">
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
		            <div class="col-xl-8">		              
		              <div class="row row-30">
		              @foreach($etapaSerie->fechasOrdenas as $fechas)
		              @foreach($fechas->partidos as $par)
		                <div class="col-md-6">
		                  <!-- Game Result Classic-->
		                  <article class="game-result game-result-classic">
		                    <div class="game-result-main">
		                      <div class="game-result-team game-result-team-first">
		                        <figure class="game-result-team-figure game-result-team-figure-big"><img src="{{ Storage::url('public/equipos/'.$par->asignacioUno->equipos->foto) }}" alt="" width="41" height="55"/>
		                        </figure>
		                        <div class="game-result-team-name">{{$par->asignacioUno->equipos->nombre}}</div>
		                        <div class="game-result-team-country">{{$par->asignacioUno->equipos->localidad}}</div>
		                      </div>
		                      <div class="game-result-middle">
		                        <div class="game-result-score-wrap">
		                          <div class="game-result-score game-result-team-win">{{$par->asignacioUno->calculoDeGOles($par->id)}}
		                          	@if($par->asignacioUno->calculoDeGOles($par->id)>$par->asignacioDos->calculoDeGOles($par->id))
		                          	<span class="game-result-team-label game-result-team-label-top">Ganador</span>
		                          	@endif
		                          </div>
		                          <div class="game-result-score-divider">
		                       
		                          </div>
		                          <div class="game-result-score game-result-team-win">{{$par->asignacioDos->calculoDeGOles($par->id)}}
		                          	@if($par->asignacioDos->calculoDeGOles($par->id)>$par->asignacioUno->calculoDeGOles($par->id))
		                          	<span class="game-result-team-label game-result-team-label-top">Ganador</span>
		                          	@endif
		                          </div>
		                        </div>
		                        <div class="game-results-status">Resultado</div>
		                      </div>
		                      <div class="game-result-team game-result-team-second">
		                        <figure class="game-result-team-figure game-result-team-figure-big"><img src="{{ Storage::url('public/equipos/'.$par->asignacioDos->equipos->foto) }}" alt="" width="50" height="50"/>
		                        </figure>
		                        <div class="game-result-team-name">{{$par->asignacioDos->equipos->nombre}}</div>
		                        <div class="game-result-team-country">{{$par->asignacioDos->equipos->localidad}}</div>
		                      </div>
		                    </div>
		                    <div class="game-result-footer">
		                      <ul class="game-result-details">
		                        <li>{{$par->estadio->nombre}}</li>
		                        <li>
		                          <time datetime="2019-04-14">{{$fechas->fechaInicio}}, {{$par->hora}}</time>
		                        </li>
		                      </ul>
		                    </div>
		                  </article>
		                </div>
		              @endforeach
		              @endforeach
		              </div>
		            </div>
		            <div class="col-xl-4">
		              <!-- Heading Component-->
		              <article class="heading-component">
		                <div class="heading-component-inner">
		                  <h5 class="heading-component-title">Tabla
		                  </h5>
		                </div>
		              </article>
		              <!-- Table team-->
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

</section>

@push('scriptsFooter')
    <script>
        $('#menuCampeonato').addClass('active');
    </script>
@endpush


@endsection