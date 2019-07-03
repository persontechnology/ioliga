@extends('layouts.app',['titulo'=>'Etapas series '])
@section('breadcrumbs', Breadcrumbs::render('etapas-serie-genero',$generoSerie))
@section('content')

<div class="card card-collapsed">
	<div class="card-header bg-dark text-white header-elements-inline">
		<h6 class="card-title">Agregar nueva etapa a esta serie "{{$generoSerie->serie->nombre}}" {{$generoSerie->genero->generoEquipo->nombre}}</h6>
	
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"> <i  class="icon-touch b"></i><i  class="icon-stack-plus"></i></a>
        		<a class="list-icons-item" data-action="reload"></a>
        		
        	</div>
    	</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<h6 class="card-title text-center ">Asignar etapas a la serie</h6>
			@can('Crear etapa', 'ioliga\Models\Campeonato\Etapa::class')
				@if($etapas->count()>0)
					<form action="{{route('guardar-etapa-serie')}}" method="post" enctype="multipart/form-data">
    				@csrf
						<input type="hidden" name="generoSerie" id="generoSerie" value="{{$generoSerie->id}}">
						<div class="form-group">
							<label>Seleccione Etapa:</label>
							<select class="form-control select-search " id="etapa" name="etapa" data-fouc required="">
							@foreach($etapas as $no)						
							<option value="{{$no->id}}">				
							{{$no->nombre }}					
							</option>					  						
							@endforeach		
							  @if ($errors->has('etapa'))
	                              <span class="invalid-feedback" role="alert">
	                                  <strong>{{ $errors->first('etapa') }}</strong>
	                              </span>
	                          @endif		
							</select>
						</div>
					
						<div class="text-center">
							<button type="submit" class="btn btn-primary">Asignar <i class="icon-paperplane ml-2"></i></button>
						</div>
				</form>
					
				@else
				 <div class="alert alert-warning alert-styled-left alert-dismissible">
                No existen etapas asignadas              
            	</div>

				@endif
			@endcan
			</div>
			<div class="col-md-6">
				<h6 class="card-title text-center  ">Nueva Etapa</h6>
				   @can('Crear etapa', 'ioliga\Models\Campeonato\Etapa::class')
				   <form action="{{ route('crear-etapa') }}" method="post" enctype="multipart/form-data" id="formIngresoUsuario">
				   @csrf
				   	<input type="hidden" name="generoSerie" id="generoSerie" value="{{$generoSerie->id}}">			   
	                <div class="form-group row">
	                      <label class="col-lg-3 col-form-label" for="nombre">Nombre de la etapa<span class="text-danger">*</span></label>
	                      <div class="col-lg-9">
	                          <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="nombre" placeholder="Ingrese.." required="" value="{{ old('nombre') }}" autofocus="">
	                          @if ($errors->has('nombre'))
	                              <span class="invalid-feedback" role="alert">
	                                  <strong>{{ $errors->first('nombre') }}</strong>
	                              </span>
	                          @endif
	                      </div>
	                  </div>

	                <div class="form-group row">
	                    <label class="col-lg-3 col-form-label" for="detalle">Detalle:</label>
	                    <div class="col-lg-9">
	                        <textarea placeholder="Ingrese.." class="form-control{{ $errors->has('detalle') ? ' is-invalid' : '' }}" name="detalle" id="detalle">{{ old('detalle') }}</textarea>
	                        @if ($errors->has('detalle'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('detalle') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                 </div>  			      

				      <div class="text-center">
				          <button type="submit" class="btn btn-primary">{{__('Guardar')}} <i class="icon-paperplane ml-2"></i></button>
				      </div>
				  </form>
				  @endcan
			</div>
			
		</div>
	</div>
</div>
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
					<span class="badge badge-mark bg-{{$etapaSerie->estado==false ? 'success':'danger'}} border-{{$etapaSerie->estado==false  ? 'success':'danger'}}"></span>
					<div class="list-icons">
                    	<div class="list-icons-item dropdown">
	                    	<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
	                    	<div class="dropdown-menu dropdown-menu-right">
	                    		@if($etapaSerie->fechas->count()==0)
								<a href="#" data-url="{{ route('eliminar-etapa-serie',$etapaSerie->id) }}" data-msj="{{ $etapaSerie->etapa->nombre}}" onclick="eliminar(this);" class="dropdown-item"><i class="icon-cross2 text-danger-400"></i>  Eliminar</a>
								@endif
								
								@can('Ver fechas', 'ioliga\Models\Campeonato\Fecha::class')
								<a href="{{route('fechas-etapa',$etapaSerie->id)}}" class="dropdown-item"><i class="icon-calendar"></i> Fechas</a>
								<div class="dropdown-divider"></div>
								@if($etapaSerie->fechas->count()>0)
								@php($i=0)
								@foreach($etapaSerie->fechas as $fe)
								@php($i++)
								<a href="{{route('fecha',$fe->id)}}" class="dropdown-item"><i class="icon-calendar"></i>{{$fe->nombre}} {{$i}}</a>
								@endforeach
								@endif
								@endcan
							</div>
                    	</div>
                	</div>
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
								<th class="bg-warning ">#</th>
								<th >Equipo</th>
								<th class="bg-warning ">Pts.</th>
								<th >Pb.</th>
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
							<tr class="text-center">
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
									@can('Actualizar bonificación', 'ioliga\Models\Campeonato\Tabla::class')
									<button onclick="actualizaBonificacion(this)" data-tabla="{{$res->tabla($res->tabla_id)->id}}" data-equipo="{{$res->tabla($res->tabla_id)->asignacion->equipos->nombre}}" data-goles="{{$res->tabla($res->tabla_id)->bonificacion}}" data-etapaid="{{$generoSerie->id}}" class="btn bg-info border-teal text-teal rounded-round border-2 btn-icon  legitRipple">	<i class="icon-plus3"></i>	</button>
									@endcan
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
		</div>
	</div>
	@endforeach
	@else
	<div class="alert alert-warning alert-styled-left alert-dismissible">
           No existen etapas en esta serie              
     </div>
	@endif
</div>
<!-- Primary modal -->
<div id="modal_theme_primary" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h6 class="modal-title">Ingresar puntos de bonificación para "<b id="equipo"> </b>"  <b></b></h6>				
			</div>
			<div class="modal-body">				 	
				<form action="{{route('actualizar-bonificacion')}}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="tabla" id="tabla" value="">
				<input type="hidden" name="etapaid" id="etapaid" value="">					
					<div class="form-group row">
						<label class="col-form-label col-sm-3">Seleccione el número de puntos</label>
						<div class="col-sm-9">
							<input type="number" name="bonificacion" id="bonificacion"   required=""  class="form-control">
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn bg-primary">Bonificar</button>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
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

	      return "No existen etapas";        
	    },
	    searching: function() {

	      return "Buscando..";
	    }
	  }
	})
});	
</script>

<script>
$('#menuCampeo').addClass('active');

function actualizaBonificacion(argument) {
	$('.modal').modal('show');
	$('#equipo').html($(argument).data('equipo'));
	$('#bonificacion').val($(argument).data('goles'));
	$('#tabla').val($(argument).data('tabla'));
	$('#etapaid').val($(argument).data('etapaid'));

	
}
</script>

@endsection