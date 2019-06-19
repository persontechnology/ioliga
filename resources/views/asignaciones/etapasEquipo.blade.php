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

		<div class="col-xl-6 col-md-6">
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
						<table id="myTable">
							<thead>
								<tr>
									<th class="bg-warning p-1">#</th>
									<th >Equipo</th>
									<th class="bg-warning p-1">Ptn.</th>
									<th class="p-1">Pbs.</th>
									<th class="p-1">PJ</th>
									<th class="p-1">PG</th>
									<th class="p-1">PE</th>
									<th class="p-1">GF</th>
									<th class="p-1">GC</th>
									<th class="p-1">GT</th>
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
						<div class="table-responsive">
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
<style type="text/css">
	      table, th, td {
            border: 1px solid black;
        }
        th {
            cursor: pointer;
        }
</style>
@endsection