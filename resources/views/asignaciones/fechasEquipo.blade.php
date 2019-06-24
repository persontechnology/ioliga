@extends('layouts.app',['titulo'=>'Etapas equipo '])

@section('acciones')
    <a href="{{route('mi-menu-equipo',Crypt::encryptString($asignacion->id))}}" class="breadcrumb-elements-item">
        <i class="fas fa-arrow-left"></i>
        Regresar
    </a>
 @endsection
@section('content')

<div class="card ">
<div class="card-header bg-dark text-white header-elements-inline">
	<h6 class="card-title"> Etapas del campeonato <b>"{{$generoSerie->genero->campeonato->nombre}}"</b> Serie "{{$generoSerie->serie->nombre}}" Genero "{{$generoSerie->genero->generoEquipo->nombre}}"</h6>

	<div class="header-elements">
		<div class="list-icons">
    		<a class="list-icons-item" data-action="collapse"> <i  class="icon-touch b"></i><i  class="icon-stack-plus"></i></a>
    		<a class="list-icons-item" data-action="reload"></a>
    		
    	</div>
	</div>
</div>
<div class="card-body">
	<div class="row">
		@if($generoSerie->etapaSerie->count()>0)
		@foreach($generoSerie->etapaSerie as $etapaSerie)

		<div class="col-xl-12 col-md-6">
			<div class="card card-body bg-{{$etapaSerie->estado==false ? 'blue-600':'indigo-400'}} border-{{$etapaSerie==true  ? 'success':'danger'}}">
				<div class="media">
					<div class="media-body">
						<div class="font-weight-semibold">Nombre de la etapa: {{$etapaSerie->etapa->nombre}}</div>
						<span class=" text-justify">{{$etapaSerie->etapa->detalle}}</span><br>

						<span class="">Etapa: {{$etapaSerie->estado==false  ? 'Activa':'Finalizada'}}</span>
					</div>
					<hr>

					<div class="ml-3 align-self-center">
					<ul class="media-list">
						<li class="media">
							<div class="mr-3">
	                          <img src="{{ Storage::url('public/equipos/'.$asignacion->equipos->foto) }}" class="rounded-circle" width="40" height="40" alt="">                        
	                        </div>
	                         <div class="media-body">
	                            <div class="media-title font-weight-semibold">{{$asignacion->equipos->nombre}}</div>				                               
	                        </div>
							
						</li>
					</ul>	
					</div>

				</div>
				<div class="card bg-light">
				<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
					@php($i=0)
					@foreach($etapaSerie->fechas as $eta)
						@php($i++)
					<div class="card">
						<!-- Card header -->
				    <div class="card-header" role="tab" id="headingTwo{{$eta->id}}">
				      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo{{$eta->id}}"
				        aria-expanded="false" aria-controls="collapseTwo2">
				        <h5 class="mb-0">
				          Fecha# {{$i}} {{$eta->fechaInicio}}
				        <span class="badge badge-mark border-{{$eta->estado==0?'warning':'success'}} mr-1"></span> {{$eta->estado==0?'Proceso':'Finalizado'}}
				           <i class="fas fa-angle-down rotate-icon"></i>
				        </h5>
				      </a>
				    </div>
				    <div id="collapseTwo{{$eta->id}}" class="collapse" role="tabpanel" aria-labelledby="headingTwo{{$eta->id}}" data-parent="#accordionEx">
				      <div class="card-body text-dark">
				       
				        <div class="table-responsive">
						<table class="table  table-lg">
							@foreach($eta->partidos as $par)
							<tbody>
								<tr class="table-active">
									<th colspan="9"><i class="fas fa-clock mr-3 fa-2x"></i> {{$par->hora}} </th>
								
								</tr>
								<tr >
								<td class="bg-{{$par->asignacioUno->id==$asignacion->id?'info':'light'}}">
								<ul class="media-list">
									@if($par->asignacioUno->equipos->foto)
									
										<li class="media " >
				                        <div class="mr-3">
				                            <img src="{{ Storage::url('public/equipos/'.$par->asignacioUno->equipos->foto) }}" class="rounded-circle" width="40" height="40" alt="">
				                          
				                        </div>
				                         <div class="media-body">
				                            <div class="media-title font-weight-semibold">{{$par->asignacioUno->equipos->nombre}}</div>
				                           
				                        </div>
				                        @else
				                         <div class="mr-3">
				                            <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
				                            
				                        </div>
				                      <div class="media-body">
				                            <div class="media-title font-weight-semibold">{{$par->asignacioUno->equipos->nombre}}</div>
				                        
				                        </div>
				                    </li>                    
				                        @endif
				                     </ul>
									</td>
									<td >
										<h6>
											{{$par->asignacioUno->calculoDeGOles($par->id)}}

										</h6>					
									</td>
									<td >
										<h6>Vs.</h6>
										
									</td>
									<td >
										<h6>
											{{$par->asignacioDos->calculoDeGOles($par->id)}}
										</h6>
										
									</td>
									<td class="bg-{{$par->asignacioDos->id==$asignacion->id?'info':'light'}}">
									<ul class="media-list">
										<li class="media " >
										@if($par->asignacioDos->equipos->foto)
				                        <div class="mr-3">
				                            <img src="{{ Storage::url('public/equipos/'.$par->asignacioDos->equipos->foto) }}" class="rounded-circle" width="40" height="40" alt="">                          
				                        </div>
				                      <div class="media-body">
				                        <div class="media-title font-weight-semibold">{{$par->asignacioDos->equipos->nombre}}</div>
				                    
				                    </div>
				                        @else
				                         <div class="mr-3 ">
				                            <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
				                            
				                        </div>
				                      <div class="media-body">
				                        <div class="media-title font-weight-semibold">{{$par->asignacioDos->equipos->nombre}}</div>
					                 
				                    </div>
				               		 </li>
				                        @endif
				                    </ul>
										
									</td>
									<td>
										@if($par->tipo=="Finalizado")
										<span class="badge bg-success badge-pill">{{$par->tipo}}</span>
										@endif
										@if($par->tipo=="Proceso")
										<span class="badge bg-warning badge-pill">{{$par->tipo}}</span>
										@endif
										@if($par->tipo=="Diferido")
										<span class="badge bg-info badge-pill">{{$par->tipo}}</span>
										@endif
									</td>
									<td>
										Árbitro
									</td>
									<td>
										<ul class="media-list">
									@if($par->estadio->foto)
									
										<li class="media " >
				                        <div class="mr-3">
				                            <img src="{{ Storage::url('public/estadios/'.$par->estadio->foto) }}" class="rounded-circle" width="40" height="40" alt="">
				                          
				                        </div>
				                         <div class="media-body">
				                            <div class="media-title font-weight-semibold">{{$par->estadio->nombre}}</div>
				                            <span class=" media-title"><i class="fas fa-map-marker-alt "></i>{{$par->estadio->direccion }}</span>
				                            
				                        </div>
				                        @else
				                         <div class="mr-3">
				                            <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
				                            
				                        </div>
				                      	<div class="media-body">
				                            <div class="media-title font-weight-semibold">{{$par->estadio->nombre}}</div>
				                            <span class=" media-title"><i class="fas fa-map-marker-alt "></i>{{$par->estadio->direccion }}</span>
				                           
				                        </div>
				                    </li>                    
				                        @endif
				                     </ul>

									</td>
								</tr>			

							</tbody>
							@endforeach
						</table>
						</div>
				      </div>
				    </div>

				  </div>						
					@endforeach
				</div>				
				</div>
		@endforeach
		@else
		<div class="alert alert-warning alert-styled-left alert-dismissible">
	           No existen etapas en esta serie              
	     </div>
		@endif
	</div>	
</div>
</div>
</div>
</div>




<script>
$('#menuCampeo').addClass('active');

</script>

@endsection