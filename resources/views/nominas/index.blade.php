@extends('layouts.app',['titulo'=>'Lista de juagadores'])
@section('breadcrumbs', Breadcrumbs::render('nomina-jugadores-representante',$equipo))

@section('content')

<!-- Dashboard content -->
<div class="row">
	<div class="col-xl-12">

		<!-- Marketing campaigns -->
		<div class="card">
			<div class="card-header header-elements-sm-inline">
				<h6 class="card-title">Lista de jugadores convocados equipo <span class="badge bg-primary badge-pill"> {{$equipo->nombre}} </span></h6>
				<div class="header-elements">
					@can('crearJugadorNomina',$equipo)
					<a href="{{route('crear-jugador',Crypt::encryptString($equipo->id))}}" class="btn bg-indigo-300"><i class="icon-plus-circle2 mr-2"></i>Crear Jugador</a>
					@endcan		
            	</div>
			</div>

			<div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
				<div class="d-flex align-items-center mb-3 mb-sm-0">
					<div id="campaigns-donut"></div>
					<div class="ml-3">
						<h5 class="font-weight-semibold mb-0">{{$nomina->count()}} Jugadores</h5>
						<span class="badge badge-mark border-success mr-1"></span> <span class="text-muted"> Inscritos</span>
					</div>
				</div>

				<div class="d-flex align-items-center mb-3 mb-sm-0">
					<div id="campaign-status-pie"></div>
					<div class="ml-3">
						<h5 class="font-weight-semibold mb-0">{{$conteoInactivos}} Jugadores </h5>
						<span class="badge badge-mark border-danger mr-1"></span> <span class="text-muted">Inactivos</span>
					</div>
				</div>			
			</div>	
						
			<ul class="nav nav-tabs nav-tabs-highlight">
				<li class="nav-item"><a href="#pill-badges-tab1" class="nav-link active" data-toggle="tab"><span class="badge badge-success badge-pill mr-2">{{$conteoEstado}}</span> Lista de Jugadores Activos</a></li>
				<li class="nav-item"><a href="#pill-badges-tab2" class="nav-link" data-toggle="tab">Lista de Jugadores inactivos <span class="badge badge-danger badge-pill ml-2">{{$conteoInactivos}}</span></a></li>								
			</ul>

			<div class="tab-content">
				<div class="tab-pane  show active" id="pill-badges-tab1">


					<div class="table-responsive">
						<br>
						@if($nomina->count()>0)
						<table class="table text-nowrap">
							<thead class="bg-primary-800">
								<tr>
									<th>Edad</th>
									<th>Datos</th>
									<th>Editar Imagen</th>
									<th>Fecha Naciminto</th>
									<th>Email</th>									
									<th></th>
								</tr>
							</thead>
							<tbody>									
								
							@if($conteoEstado>0)
							@foreach($nomina as $nom)
							@if($nom->estado)						
							<tr>
								<td class="text-center">
									<h6 class="mb-0">{{Carbon\Carbon::parse($nom->user->fechaNacimiento)->age}} </h6>

									<div class="font-size-sm text-muted line-height-1">Años</div>
								</td>

								<td>
									<div class="d-flex align-items-center">
										@if($nom->user->foto)
										<div class="mr-3">
											<div class="card-img-actions">
												<a href="{{ Storage::url('public/usuarios/'.$nom->user->foto) }}" data-popup="lightbox">
													<img class="rounded-circle" width="52" height="52" src="{{ Storage::url('public/usuarios/'.$nom->user->foto) }}" alt="">
													<span class="card-img-actions-overlay card-img">
														<i class="icon-plus3"></i>
													</span>
												</a>
											</div>										
										</div>
										@else
										<div class="mr-3">
											<a href="#">
												<img src="{{ asset('global_assets/images/juavatar.png') }}" class="rounded-circle" width="52" height="52" alt="">
											</a>
										</div>
										@endif
										<div>
											<a href="#" class="text-default font-weight-semibold">{{$nom->user->apellidos .' '. $nom->user->nombres}}</a>
											<div class="text-muted font-size-sm">
											 <span class="badge badge-mark border-success mr-1"></span>
												Activo
											</div>
											<div class="text-muted font-size-sm">
											 <i class="icon-flag3  border-info mr-1"></i>
												{{$nom->nacionalidad}}
											</div>
											<div class="text-muted font-size-sm">
											 <i class="icon-phone2 border-info mr-1"></i>
												{{$nom->user->celular}}
											</div>
										</div>
									</div>
								</td>
								<td>
									<a data-popup="tooltip" title=""  data-trigger="hover" data-target="#call" data-original-title="Editar Imagen de {{$nom->user->apellidos .' '. $nom->user->nombres}}" href="{{route('editar-foto-jugador',Crypt::encryptString($nom->user->id))}}" class="btn btn-outline bg-dark btn-icon text-dark border-dark border-2 rounded-round legitRipple">
									<i class="icon-vcard"></i>
									</a>
								</td>
								<td>
									<span class="text-muted">{{$nom->user->fechaNacimiento}}</span>
								</td>
								<td>
									<span class="text-muted">{{$nom->user->email}}</span>
								</td>									
							
								<td class="text-center">
									<div class="list-icons">
										<div class="list-icons-item dropdown">
											<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="{{route('vista-previa-jugador',Crypt::encryptString($nom->id))}}" class="dropdown-item"><i class="icon-user-plus"></i> Vista previa</a>
												<a href="#" class="dropdown-item"><i class="icon-pencil6"></i> Editar Usuario</a>
											
												<div class="dropdown-divider"></div>
												<button data-id="{{Crypt::encryptString($nom->id)}}"
												onclick="inactivo(this)" class="dropdown-item"><i class="icon-cross2 text-danger"></i> Inactivo</button>
											</div>
										</div>
									</div>
								</td>
							</tr>
							@endif						
						   	@endforeach
						   	@else
						   	<tr>
						   		<td>
									<div class="alert alert-warning alert-styled-left alert-dismissible">
		                        		    No existen jugadores Activos 
		                       		</div>
	                    		</td>
	                    	</tr>
							@endif
							</tbody>
						</table>
						@else
						<h1>No existen datos</h1>
						@endif
					</div>
				</div>

				<div class="tab-pane fade" id="pill-badges-tab2">
					<div class="table-responsive">
						<br>
						@if($nomina->count()>0)
						<table class="table text-nowrap">
							<thead class="bg-orange-800">
								<tr>
									<th>Edad</th>
									<th>Datos</th>
									<th>Motivo por inactivo</th>
									<th>Fecha Naciminto</th>
									<th>Email</th>									
									<th></th>
								</tr>
							</thead>
							<tbody>											
							@if($conteoInactivos>0)
							@foreach($nomina as $nom)
							@if($nom->estado==false)	
							<tr>
								<td class="text-center">
									<h6 class="mb-0">{{$nom->calcularaEdad($nom->user->fechaNacimiento)}}</h6>
									<div class="font-size-sm text-muted line-height-1">Años</div>
								</td>
									<td>
									<div class="d-flex align-items-center">
										@if($nom->user->foto)
										<div class="mr-3">
											<div class="card-img-actions">
												<a href="{{ Storage::url('public/usuarios/'.$nom->user->foto) }}" data-popup="lightbox">
													<img class="rounded-circle" width="52" height="52" src="{{ Storage::url('public/usuarios/'.$nom->user->foto) }}" alt="">
													<span class="card-img-actions-overlay card-img">
														<i class="icon-plus3"></i>
													</span>
												</a>
											</div>										
										</div>
										@else
										<div class="mr-3">
											<a href="#">
												<img src="{{ asset('global_assets/images/juavatar.png') }}" class="rounded-circle" width="52" height="52" alt="">
											</a>
										</div>
										@endif
										<div>
											<a href="#" class="text-default font-weight-semibold">{{$nom->user->apellidos .' '. $nom->user->nombres}}</a>
											<div class="text-muted font-size-sm">
											 <span class="badge badge-mark border-danger mr-1"></span>
												Inactivo
											</div>
											<div class="text-muted font-size-sm">
											 <i class="icon-flag3  border-info mr-1"></i>
												{{$nom->nacionalidad}}
											</div>
											<div class="text-muted font-size-sm">
											 <i class="icon-phone2 border-info mr-1"></i>
												{{$nom->user->celular}}
											</div>
										</div>
									</div>
								</td>
								<td>
									<span class="text-muted">
										{{$nom->detalle}}
									</span>	
								</td>
								<td>
									<span class="text-muted">{{$nom->user->fechaNacimiento}}</span>
								</td>
								
								<td>
									<span class="text-muted">{{$nom->user->email}}</span>
								</td>
								
								<td class="text-center">
									<div class="list-icons">
										<div class="list-icons-item dropdown">
											<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="{{route('vista-previa-jugador',Crypt::encryptString($nom->id))}}" class="dropdown-item"><i class="icon-user-plus"></i> Vista previa</a>
												<a href="#" class="dropdown-item"><i class="icon-pencil6"></i> Editar Usuario</a>
												<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
												<div class="dropdown-divider"></div>
												<button data-id="{{Crypt::encryptString($nom->id)}}"
												onclick="activo(this)" class="dropdown-item"><i class="icon-checkmark3 text-success"></i>Activar</button>
											</div>
										</div>
									</div>
								</td>
							</tr>
							@endif
							@endforeach
						   	@else
						   	<tr>
						   		<td>
									<div class="alert alert-warning alert-styled-left alert-dismissible">
		                        		    No existen jugadores Inactivos 
		                       		</div>
	                    		</td>
	                    	</tr>
							@endif	
							</tbody>
						</table>
						@else
						<h1>No existen datos</h1>
						@endif
					</div>
				</div>
			</div>					
		</div>
		<!-- /marketing campaigns -->
	</div>
</div>
<!-- /dashboard content -->

@push('scriptsFooter')


<script type="text/javascript">
	     
function inactivo(arg){
	var id= $(arg).data('id');
	var estadoJugador="{{route('inactivo')}}"
	swal({
	  title: "Comfirmar!",
	  text: "Estas seguro de cambiar de estado al Jugador:",
	  type: "input",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  inputPlaceholder: "Escribe una razón"
	}, function (inputValue) {
	  if (inputValue === false) return false;
	  if (inputValue === "") {
	    swal.showInputError("You need to write something!");
	    return false
	  }
	  
	  $.post(estadoJugador,{id:id,detalle:inputValue})
	    .done(function( data ) {
	        window.location.replace("{{route('nomina',Crypt::encryptString($equipo->id))}}");     
	    })
	});
}
function activo(arg){
	var id= $(arg).data('id');
	var estadoJugador="{{route('activo')}}"
	swal({
		  title: "Estás seguro?",
		  text: "Activará al jugador !",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Si, Activar!",
		  cancelButtonText: "No, Cancelar!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm) {
		  if (isConfirm) {
		    $.post(estadoJugador,{id:id})
	    		.done(function( data ) {
	       			 window.location.replace("{{route('nomina',Crypt::encryptString($equipo->id))}}");     
	    		})
		  } else {
		    swal("Cancelado", "El jugador no fue activado :)", "error");
		  }
	});
}

</script>

@endpush
@endsection
