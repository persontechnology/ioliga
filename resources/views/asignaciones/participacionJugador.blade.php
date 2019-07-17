@extends('layouts.app',['titulo'=>'Mis participaciones'])

@section('content')

<div class="content">

			<!-- Info alert -->
			<div class="alert alert-info bg-white alert-styled-left alert-arrow-left alert-dismissible">
				
				<h6 class="alert-heading font-weight-semibold mb-1">Datos de participación</h6>
				Nombres: <strong>{{$usuario->apellidos .' '. $usuario->nombres }}</strong><br>
				Equipo Actual: 
				<strong>
					@if($nomina->count()>0)					
					 @foreach($nomina as $nom)
						{{$nom->equipo->nombre}}
						
					 @endforeach
					 @else
					 No tiene participaciones
					 @endif
				</strong><br>
		    </div>
		   <!-- Navigation types -->
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Mis partipicaciones</h5>
					<div class="header-elements">
						<div class="list-icons">
	                		<a class="list-icons-item" data-action="collapse"></a>
	                		<a class="list-icons-item" data-action="reload"></a>
	               
	                	</div>
                	</div>
				</div>

				<div class="card-body">
	
					<div class="row">

						@if($nomina->count()>0)
						 @foreach($nomina as $nom)
						  @foreach($nom->asignacionNominaAs as $nomAs)
						<div class="col-md-12">
							<p class="font-weight-semibold"> Campeonato: {{$nomAs->unoAsignacion->unoGeneroSerie->genero->campeonato->nombre}} Fecha {{$nomAs->unoAsignacion->unoGeneroSerie->genero->campeonato->fechaInicio}}</p>
							<div class="sidebar sidebar-light sidebar-component position-static w-100 d-block mb-md-4">
								<div class="sidebar-content position-static">

									<!-- User menu -->
									<div class="card sidebar-user">
										<div class="card-body">
											<div class="media">
												<a href="#" class="mr-3">
													<img src="{{ Storage::url('public/equipos/'.$nomAs->unoAsignacion->equipos->foto) }}" width="58" height="58" class="rounded-circle" alt="">
												</a>

												<div class="media-body">
													<div class="media-title font-weight-semibold">{{$nomAs->unoAsignacion->equipos->nombre}}</div>
													<div class="font-size-xs opacity-50">
														@if($nom->equipo->id==$nomAs->unoAsignacion->equipos->id)
														<span class="badge badge-mark border-success"> </span> Activo
														activo
														@else
														<span class="badge badge-mark border-danger"> </span> Inactivo
												
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /user menu -->


									<!-- Navigation -->
									<div class="card">
										<ul class="nav nav-sidebar" data-nav-type="collapsible">
											<li class="nav-item-header">
												<div class="text-uppercase font-size-sm line-height-sm">Datos</div>
											</li>

											<li class="nav-item">
												<a  class="nav-link active">
													<i class="icon-menu6"></i>
													ampeonato: {{$nomAs->unoAsignacion->unoGeneroSerie->genero->campeonato->nombre}} Fecha {{$nomAs->unoAsignacion->unoGeneroSerie->genero->campeonato->fechaInicio}}
												</a>
											</li>
											<li class="nav-item nav-item-submenu">
												<a href="#" class="nav-link"><i class="icon-stack2"></i>Datos Totales</a>

												<ul class="nav nav-group-sub">
													<table class="table">
														<thead class="thead-dark">
															<th>T. Encuentros</th>
															<th>T. Goles</th>
															<th>T. Amarillas</th>
															<th>T. Rojas</th>
														</thead>
														<tbody>
															@foreach($nomAs->alineacionesTotalGoles as $total)
															<tr>
															<td>{{$total->totalJuegos}}</td>
															<td>{{$total->totalgoles}}</td>
															<td>{{$total->totalAmarillas}}</td>
															<td>{{$total->totalrojas}}</td>
															</tr>
															@endforeach
														</tbody>
													</table>
												</ul>
											</li>
										</ul>
									</div>
									<!-- /navigation -->

								</div>
							</div>
						</div>
						 @endforeach
						 @endforeach
 						@else
						 No tiene participaciones
					 	@endif

					</div>
				</div>
			</div>
			<!-- /navigation types -->
</div>
<script>
$('#menuparticipaciones').addClass('active');

</script>


@endsection