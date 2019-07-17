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
				<div class="card">
					<div class="card-header bg-dark header-elements-inline">
						<h6 class="card-title">Tabla de posiciones</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>	                
		                	</div>
		            	</div>
					</div>				
					<div class="card-body text-dark">
						<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th class="bg-warning p-1">#</th>
									<th >Equipo</th>
									<th class="bg-warning p-1">Pb.</th>
									<th >Pbs.</th>
									<th >PJ</th>
									<th >PG</th>
									<th >PE</th>
									<th >GF</th>
									<th >GC</th>
									<th >GT</th>
								</tr>
							</thead>
							<tbody>						
							@if($etapaSerie->tablas->count()>0)
							@php($i=0)
							@foreach($etapaSerie->resultado($etapaSerie->id) as $res)
							@php($i++)
							@php($h=$res->tabla($res->tabla_id)->puntosTotales($res->tabla($res->tabla_id)->partidosGanados->count(),$res->tabla($res->tabla_id)->partidosEmpatados->count(),$res->tabla($res->tabla_id)->bonificacion))
							<tr class="text-center bg-{{$res->tabla($res->tabla_id)->asignacion->id==$asignacion->id?'info':'light'}}" >
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
								<td class="bg-dark">
									{{$h}} 
									
								</td>

								<td>

									{{$res->tabla($res->tabla_id)->bonificacion}}
								
								</td>
								
								<td>
									{{$res->tabla($res->tabla_id)->resultados->count()}}
								</td>
								<td>
									{{$res->tabla($res->tabla_id)->partidosGanados->count()}}
								</td>
								<td>
									{{$res->tabla($res->tabla_id)->partidosEmpatados->count()}}
									
								</td>
								<td>
									{{$res->tabla($res->tabla_id)->golesFavor->sum('golesFavor')}}
									
								</td>
								<td>
									{{$res->tabla($res->tabla_id)->golesContra->sum('golesContra')}}
									
								</td>
								<td>
									{{$res->tabla($res->tabla_id)->golesTotal($res->tabla($res->tabla_id)->golesFavor->sum('golesFavor'),$res->tabla($res->tabla_id)->golesContra->sum('golesContra'))}}
									
								</td>
							
							</tr>
								@endforeach
								@endif
							</tbody>
						</table>					
				</div>
				<div class="row">
						<div class="col-md-4">	
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
												<span class="letter-icon">#</span>
											</a>
										</div>
										<div>
											<a href="#" class="text-default font-weight-semibold letter-icon-title">Número de Posición</a>
											
										</div>
									</div>
								</td>								
								
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
												<span class="letter-icon">Pts</span>
											</a>
										</div>
										<div>
											<a href="#" class="text-default font-weight-semibold letter-icon-title">Puntos Totales</a>
											
										</div>
									</div>
								</td>								
								
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
												<span class="letter-icon">Pb</span>
											</a>
										</div>
										<div>
											<a href="#" class="text-default font-weight-semibold letter-icon-title">Puntos Bonificación</a>
											
										</div>
									</div>
								</td>								
								
							</tr>
						</div>
						<div class="col-md-4">	
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
												<span class="letter-icon">PJ</span>
											</a>
										</div>
										<div>
											<a href="#" class="text-default font-weight-semibold letter-icon-title">Partidos Jugados</a>
											
										</div>
									</div>
								</td>								
								
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
												<span class="letter-icon">PG</span>
											</a>
										</div>
										<div>
											<a href="#" class="text-default font-weight-semibold letter-icon-title">Partidos Ganados</a>
											
										</div>
									</div>
								</td>								
								
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
												<span class="letter-icon">PE</span>
											</a>
										</div>
										<div>
											<a href="#" class="text-default font-weight-semibold letter-icon-title">Partidos Empatados</a>
											
										</div>
									</div>
								</td>								
								
							</tr>
						</div>
						<div class="col-md-4">	
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
												<span class="letter-icon">GF</span>
											</a>
										</div>
										<div>
											<a href="#" class="text-default font-weight-semibold letter-icon-title">Goles Favor</a>
											
										</div>
									</div>
								</td>								
								
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
												<span class="letter-icon">GC</span>
											</a>
										</div>
										<div>
											<a href="#" class="text-default font-weight-semibold letter-icon-title">Goles Contra</a>
											
										</div>
									</div>
								</td>								
								
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
												<span class="letter-icon">GT</span>
											</a>
										</div>
										<div>
											<a href="#" class="text-default font-weight-semibold letter-icon-title">Goles Totales</a>
											
										</div>
									</div>
								</td>								
								
							</tr>
						</div>											
				</div>
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



<script>
$('#menuCampeo').addClass('active');

</script>

@endsection