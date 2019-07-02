@extends('layouts.info',['titulo'=>'Calendarios'])
@section('content')
@php($nos=ioliga\Models\Nosotro::first())
<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
<div class="parallax-content breadcrumbs-custom context-dark">
  <div class="container">
    <h3 class="breadcrumbs-custom-title">Calendarios del campeonato {{$campeo->nombre}}</h3>
    <ul class="breadcrumbs-custom-path">
       <li><a href="{{ url('/') }}">Inicio</a></li>      
      <li><a href="{{route('equipos-vista')}}">Campeonato</a></li>
      <li class="active"></li>
    </ul>
  </div>
</div>
</section>

<section class="section section-sm bg-gray-100">
<div class="container">
  <div class="row row-50">
    <div class="col-lg-7 col-xl-12">
      <div class="row row-50">
      	@foreach($campeo->generosVista as $genero)
        <div class="col-12">        	
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Tablas de Genero "{{$genero->generoEquipo->nombre}}"
              </h5>
            </div>
          </article>
          	<div class="row row-50">
          @foreach($genero->GenerosSeries as $geSe)
	         
			<div class="col-12"> 
			 <article class="heading-component">
	            <div class="heading-component-inner">
	              <h5 class="heading-component-title">Serie "{{$geSe->serie->nombre}}"
	              </h5>
	            </div>
	        </article>
	          <div class="row row-50">
				@foreach($geSe->etapaSerie as $etapa)
				<div class="col-6">
				 <article class="heading-component">
		            <div class="heading-component-inner">
		              <h5 class="heading-component-title">Etapa "{{$etapa->etapa->nombre}}"
		              </h5>
		            </div>
			      </article>
		      		<div class="card-standing card-group-custom card-standing-index" id="accordion1" role="tablist" aria-multiselectable="false">
			        <div class="card-standing-caption">
			              <div class="card-standing-position">#</div>
			                <div class="card-standing-caption-aside">
	                        <div class="card-standing-team">Fecha</div>
	                        <div class="card-standing-number">N.E</div>
	                        <div class="card-standing-number">G.T</div>
	                        <div class="card-standing-number">E</div>
	                       
	                      </div>
			        </div>
			        @php($f=0)
			      	@foreach($etapa->fechas as $fe)
			      	 @php($f++)				    
				            <!-- Bootstrap card-->
			        <article class="card card-custom">
		              <div class="card-standing-position card-standing-counter"></div>
		              <div class="card-header" id="accordion1Heading1" role="tab">
		                <div class="card-standing-team-item">
		                  <div class="card-standing-team">
		                    <div class="card-standing-team-title">
		                      <div class="card-standing-team-name">{{$fe->fechaInicio}}</div>                
		                    </div>
		                  </div>
		                  <div class="card-standing-number">{{$fe->partidos->count()}}</div>
		                  <div class="card-standing-number">30</div>
		                  <div class="card-standing-number">1</div>	               
		                  <div class="card-standing-diff">+12</div>
		                  <div class="card-standing-button"><a class="card-standing-toogle material-icons-remove collapsed" role="button" data-toggle="collapse" data-parent="#accordion{{$fe->id}}" href="#accordion1Collapse{{$fe->id}}" aria-controls="accordion1Collapse{{$fe->id}}"></a></div>
		                </div>
		              </div>
		              <div class="collapse" id="accordion1Collapse{{$fe->id}}" role="tabpanel" aria-labelledby="accordion{{$fe->id}}Heading{{$fe->id}}">
		              <div class="table-responsive">
		              	<table class="table">
		              	@foreach($fe->partidos as $par)
		              		<tr>
		              			<td>
		              			{{Carbon\Carbon::parse($par->hora)->format('H:i')}}
		              			</td>
		              			<td>
		              			<div class="team-figure">
		                      		<img src="{{ Storage::url('public/equipos/'.$par->asignacioUno->equipos->foto) }}" alt="" width="40" height="45">
		                        </div>
		                        {{$par->asignacioUno->equipos->nombre}}	
		              			</td>
		              			<td>
		              			{{$par->asignacioUno->calculoDeGOles($par->id)}}
		              			</td>
		              			<td>
		              				vs
		              			</td>
		              			<td>
		              				{{$par->asignacioDos->calculoDeGOles($par->id)}}
		              			</td>
		              			<td>
		              			<div class="team-figure">
		                      		<img src="{{ Storage::url('public/equipos/'.$par->asignacioDos->equipos->foto) }}" alt="" width="40" height="45">
		                        </div>	
		              				{{$par->asignacioDos->equipos->nombre}}	
		              			</td>
		              			<td>
		              				{{$par->estadio->nombre}}
		              			</td>
		              	@endforeach
		              		</tr>
		              	</table>	              
		              </div>
		              </div>
			        </article>

				     
				    @endforeach
				     </div>
				</div>
			      @endforeach

			  </div>

		     </div>
		
          @endforeach
           </div>
        </div>
        @endforeach
        <div class="col-12">
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Glossary Terms
              </h5>
            </div>
          </article>
          <div class="game-glossary">
            <div class="game-glossary-wrap row-10">
              <div class="game-glossary-column">
                <table class="game-glossary-terms">
                  <tr>
                    <td>W:</td>
                    <td>Wins</td>
                  </tr>
                  <tr>
                    <td>L:</td>
                    <td>Loses</td>
                  </tr>
                </table>
              </div>
              <div class="game-glossary-column">
                <table class="game-glossary-terms">
                  <tr>
                    <td>T:</td>
                    <td>Ties</td>
                  </tr>
                  <tr>
                    <td>PTS:</td>
                    <td>Winning Percentage</td>
                  </tr>
                </table>
              </div>
              <div class="game-glossary-column">
                <table class="game-glossary-terms">
                  <tr>
                    <td>DIFF:</td>
                    <td>Point Differential</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</section>

@endsection