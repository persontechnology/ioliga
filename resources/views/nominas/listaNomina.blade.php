@extends('layouts.app',['titulo'=>'Lista de juagadores'])
@section('breadcrumbs', Breadcrumbs::render('Nomina-equipos-jugador',$equipo))
@section('content')
<!-- Dashboard content -->
<div class="row">
	<div class="col-xl-12">

		<!-- Marketing campaigns -->
		<div class="card">
			<div class="card-header header-elements-sm-inline">
				<h6 class="card-title">Lista de jugadores convocados equipo <span class="badge bg-primary badge-pill"> {{$equipo->nombre}} </span>
					<a href="{{route('reporte-nomina',$equipo->id)}}"><i class="icon-file-download icon-2x"></i>
				</h6>
				<div class="header-elements">
					@can('Crear jugador equipo', 'ioliga\Models\Nomina\Nomina::class')
					<a href="{{route('crear-jugador-equipo',$equipo->id)}}" class="btn bg-indigo-300"><i class="icon-plus-circle2 mr-2"></i>Crear Jugador</a>
					@endcan		
            	</div>
			</div>
			<div class="table-responsive">
				<br>
				@if($nomina->count()>0)
				<table class="table text-nowrap">
					<thead class="bg-primary-800">
						<tr>
							<th>Edad</th>
							<th>Datos</th>
							<th>Editar Imagen</th>				
							<th>Email</th>
							<th>Estado</th>									
							<th></th>
						</tr>
					</thead>
					<tbody>									
						
	
					@foreach($nomina as $nom)
							
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
								@if($nom->estado)	
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
								@else
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

								@endif	
							</div>
						</td>
						<td>
							@can('Actualizar foto jugador', 'ioliga\Models\Nomina\Nomina::class')
							<a data-popup="tooltip" title=""  data-trigger="hover" data-target="#call" data-original-title="Editar Imagen de {{$nom->user->apellidos .' '. $nom->user->nombres}}" href="{{route('actualizar-foto-jugador',$nom->user->id)}}" class="btn btn-outline bg-dark btn-icon text-dark border-dark border-2 rounded-round legitRipple">
							<i class="icon-vcard"></i>
							</a>
							@endcan
						</td>
				
						<td>
							<span class="text-muted">{{$nom->user->email}}</span>
						</td>
						<td>	
						@if($nom->estado)									
						S/N
						@else						
						<span class="text-muted">{{$nom->detalle}}</span>
						@endif
						</td>
					
						<td class="text-center">
							@if($nom->estado)	
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="{{route('vista-jugador',$nom->id)}}" class="dropdown-item"><i class="icon-user-plus"></i> Vista previa</a>
										
										
										<div class="dropdown-divider"></div>
										<button data-id="{{Crypt::encryptString($nom->id)}}"
										onclick="inactivo(this)" class="dropdown-item"><i class="icon-cross2 text-danger"></i> Inactivo</button>
									</div>
								</div>
							</div>
							@else

							<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="{{route('vista-jugador',$nom->id)}}" class="dropdown-item"><i class="icon-user-plus"></i> Vista previa</a>
									<a href="#" class="dropdown-item"><i class="icon-pencil6"></i> Editar Usuario</a>
									<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
									<div class="dropdown-divider"></div>
									<button data-id="{{Crypt::encryptString($nom->id)}}"
									onclick="activo(this)" class="dropdown-item"><i class="icon-checkmark3 text-success"></i>Activar</button>
								</div>
							</div>
						</div>
						@endif
						</td>
					</tr>
							
				   	@endforeach			
					</tbody>
				</table>
				@else
				 <div class="alert alert-info alert-styled-left alert-dismissible">
	                No existen jugadores en este Equipo                
	            </div>
				@endif
			</div>

		</div>

	</div>
</div>


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
	        window.location.replace("{{route('listado-jugadores-nomina',$equipo->id)}}");     
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
	       			 window.location.replace("{{route('listado-jugadores-nomina',$equipo->id)}}");     
	    		})
		  } else {
		    swal("Cancelado", "El jugador no fue activado :)", "error");
		  }
	});
}

</script>

@endpush
@endsection

