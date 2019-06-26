@extends('layouts.app',['titulo'=>'Vista previa'])

@section('breadcrumbs', Breadcrumbs::render('vista-jugador',$nomina->equipo))
@section('content')

<!-- Content area -->
<div class="content">

	<!-- Inner container -->
	<div class="d-md-flex align-items-md-start">

		<!-- Left sidebar component -->
		<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- Navigation -->
				<div class="card">
					<div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
						<div class="card-img-actions d-inline-block mb-3">
								
							<a href="{{ Storage::url('public/usuarios/'.$nomina->user->foto) }}" data-popup="lightbox">
								<img class="rounded-circle" width="170" height="170" src="{{ Storage::url('public/usuarios/'.$nomina->user->foto) }}" alt="">
								<span class="card-img-actions-overlay card-img">
									<i class="icon-plus3"></i>
								</span>
							</a>
						</div>

			    		<h6 class="font-weight-semibold mb-0">{{$nomina->user->apellidos}}</h6>
			    		<span class="d-block opacity-75">{{$nomina->user->nombres	}}</span>

			    	</div>
			
				</div>
				<!-- /navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /left sidebar component -->
		<!-- Right content -->
		<div class="tab-content w-100">
			<div class="tab-pane fade active show" id="profile">
					<!-- Invoices -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card border-left-3 border-left-{{$nomina->estado? 'success':'danger'}} rounded-left-0">
							<div class="card-body">
								<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
									<div>
										<h6 class="font-weight-semibold">Datos Personales</h6>
										<ul class="list list-unstyled mb-0">
											<li>Nombre corto : {{$nomina->user->name}}</li>
											<li>Fecha de Inscripción: <span class="font-weight-semibold">{{$nomina->user->created_at}}</span></li>
											<li>Identificación: <span class="font-weight-semibold">{{$nomina->user->identificacion}}</span></li>
											<li>Teléfono: <span class="font-weight-semibold">{{$nomina->user->telefono}}</span></li>
											<li>Celular: <span class="font-weight-semibold">{{$nomina->user->celular}}</span></li>
											<li>Estado Civil: <span class="font-weight-semibold">{{$nomina->user->estadoCivil}}</span></li>
										</ul>
									</div>

									<div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
										<h6 class="font-weight-semibold">Edad 
										{{Carbon\Carbon::parse($nomina->user->fechaNacimiento)->age}} Años</h6>
										<ul class="list list-unstyled mb-0">
											<li>Estado: <span class="badge bg-{{$nomina->estado? 'success':'danger'}}-400 align-top dropdown-toggle">{{$nomina->estado?'Activo':'Inactivo'}}</span></li>
											
										</ul>
									</div>
								</div>
							</div>

							<div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
								<span>
									<span class="badge badge-mark border-{{$nomina->estado? 'success':'danger'}} mr-2"></span>
									Fecha de Nacimiento:
									<span class="font-weight-semibold">{{$nomina->user->fechaNacimiento}}</span>
								</span>

							</div>
						</div>
					</div>
				</div>
				<!-- /invoices -->
		    </div>

		</div>
		<!-- /right content -->
	</div>
	<!-- /inner container -->
<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-primary text-white header-elements-inline">
						<h6 class="card-title">Equipo Actual</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
					<ul class="media-list">
						 <li class="media {{$nomina->equipo->estado==false ? 'bg-dark' :''}}" >
				      @if($nomina->equipo->foto)
	                    <div class="mr-3">

	                        <img src="{{ Storage::url('public/equipos/'.$nomina->equipo->foto) }}"  width="40" height="40" alt="">
	                       
	                    </div>
                    @else
                     <div class="mr-3">
                
                        <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                    
                    </div>
                    @endif                
	                    
					  <div class="media-body">
                            <div class="media-title font-weight-semibold">{{$nomina->equipo->nombre}}</div>
                            <span class=" media-title"><b>Representeante: </b>{{$nomina->equipo->user->nombres.' '.$nomina->equipo->user->apellidos }}</span>
		                     <div class="text-muted font-size-sm">
			                 @if($nomina->equipo->estado)
						     <span class="badge badge-mark border-success mr-1"></span>
									Activo
							@else
							 <span class="badge badge-mark border-danger mr-1"></span>
									Inactivo
							@endif
						</div>
                      </div>
                	</li>
                	</ul>
                	<hr>
                	<h6 class="card-title text-center">Equipo Participados</h6>
                
                	@if($nomina->asignacionNomina->count()>0)
                	@foreach($nomina->asignacionNomina as $nominaAs)                	
                		@if($nominaAs->unoAsignacion->equipos->id != $nomina->equipo->id)
                		<ul class="media-list">
								 <li class="media {{$nominaAs->unoAsignacion->equipos->estado==false ? 'bg-dark' :''}}" >
						      @if($nomina->equipo->foto)
			                    <div class="mr-3">

			                        <img src="{{ Storage::url('public/equipos/'.$nominaAs->unoAsignacion->equipos->foto) }}"  width="40" height="40" alt="">
			                       
			                    </div>
		                    @else
		                     <div class="mr-3">
		                
		                        <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
		                    
		                    </div>
		                    @endif                
			                    
							  <div class="media-body">
		                            <div class="media-title font-weight-semibold">{{$nominaAs->unoAsignacion->equipos->nombre}}</div>
		                            <span class=" media-title"><b>Representeante: </b>{{$nominaAs->unoAsignacion->equipos->user->nombres.' '.$nominaAs->unoAsignacion->equipos->user->apellidos }}</span>
				                     <div class="text-muted font-size-sm">
					                 @if($nominaAs->unoAsignacion->equipos->estado)
								     <span class="badge badge-mark border-success mr-1"></span>
											Activo
									@else
									 <span class="badge badge-mark border-danger mr-1"></span>
											Inactivo
									@endif
								</div>
		                      </div>
		                	</li>
		                	</ul>
                		@endif
                	@endforeach
                	@else
                	<h1>no</h1>
                	@endif


					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-secondary text-white header-elements-inline">
						<h6 class="card-title">Equipo a donde es el pase</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		
		                	</div>
	                	</div>
					</div>
					<div class="card-body">
					@if($nominaExistente)
					<div class="text-center">
						<h6 class="font-weight-semibold">Ya posee una asignación</h6>
						<ul class="list list-unstyled ">
							<li>Equipo registrado :
								<span class="font-weight-semibold">
								 {{$nominaExistente->unoNomina->equipo->nombre}}
								</span>
							</li>
							<li>Fecha de registro:
								 <span class="font-weight-semibold">
								 	{{$nominaExistente->created_at}}
								 		
								 </span>
							</li>
							<li>Registrado por: 
								<span class="font-weight-semibold">
									{{$nominaExistente->unoNomina->equipo->user->apellidos.' '. $nominaExistente->unoNomina->equipo->user->nombres}}
								</span>
							</li>
							<li>Serie:
								 <span class="font-weight-semibold">
								 	{{$nominaExistente->unoAsignacion->unoGeneroSerie->serie->nombre}}
								 </span>
							</li>
							<li>Genero:
								 <span class="font-weight-semibold">
								 	{{$nominaExistente->unoAsignacion->unoGeneroSerie->genero->generoEquipo->nombre}}
								 </span>
							</li>
							<li>Nombre de campeonato:
							 <span class="font-weight-semibold">
							 	{{$nominaExistente->unoAsignacion->unoGeneroSerie->genero->campeonato->nombre}}
							 </span>
							</li>
							<li>Fecha de campeonato:
							 <span class="font-weight-semibold">
							 	{{$nominaExistente->unoAsignacion->unoGeneroSerie->genero->campeonato->fechaInicio}}
							 </span>
							</li>
							
						</ul>
					</div>
					<div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
						<span>
							<span class="badge badge-mark border-{{$nominaExistente->estado? 'success':'danger'}} mr-2"></span>						
							<span class="font-weight-semibold">Estado:	Inactivo</span>
						</span>

					</div>
					@else
					@if($equipo->count()>0)
					<form action="{{route('jugador-actualizar-nomina')}}" method="post" enctype="multipart/form-data">
	    				@csrf

						<input type="hidden" name="nomina" id="nomina" value="{{Crypt::encryptString($nomina->id)}}">
						<div class="form-group">
							<label>Seleccione Equipo:</label>
							<select class="form-control select-search " id="equipo" name="equipo" data-fouc required="">
							@foreach($equipo as $equi)						
							<option value="{{Crypt::encryptString($equi->id)}}">				
							{{$equi->nombre.'-'.$equi->genero->nombre }}					
							</option>					  						
							@endforeach	
							  @if ($errors->has('jugador'))
	                              <span class="invalid-feedback" role="alert">
	                                  <strong>{{ $errors->first('jugador') }}</strong>
	                              </span>
	                          @endif		
							</select>
						</div>
					
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Asignar <i class="icon-paperplane ml-2"></i></button>
						</div>
					</form>

					@else
					<div class="alert alert-info alert-styled-left alert-dismissible">
	                No existen otros Equipo                
	           		</div>
					@endif
					@endif				
					</div>
				</div>
			</div>
		</div>

</div>
<!-- /content area -->
@prepend('scriptsHeader')

    <script type="text/javascript" src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('global_assets/js/demo_pages/form_select2.js') }}"></script>

@endprepend
<script type="text/javascript">
$( document ).ready(function() {

	$('.select-search').select2({    
	  language: {

	    noResults: function() {

	      return "No existe es equipo";        
	    },
	    searching: function() {

	      return "Buscando..";
	    }
	  }
	})
});	
</script>
@endsection