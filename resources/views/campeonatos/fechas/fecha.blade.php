@extends('layouts.app',['titulo'=>'Etapas series '])
@section('breadcrumbs', Breadcrumbs::render('fecha-etapa',$fecha))
@section('content')
<div class="card card-collapsed">
	<div class="card-header bg-white header-elements-inline">
		<h6 class="card-title">Fecha de la etapa "<b>{{$fecha->etapaSerie->etapa->nombre}}</b>" En la serie <b>"{{$fecha->etapaSerie->generoSerie->serie->nombre }}"</b> Fecha: <b> {{$fecha->fechaInicio}}</b> </h6>		
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"><i  class="icon-touch b"></i><i  class="icon-stack-plus"></i></a>
        		<a class="list-icons-item" data-action="reload"></a>
        		
        	</div>
    	</div>
	</div>
	<div class="card-body">
		@can('Administrar partidos', 'ioliga\Models\Campeonato\Partido::class')
		@if($fecha->estado==0)
		<form action="{{ route('crear-partido') }}" method="post" enctype="multipart/form-data" id="formIngresoUsuario">
		      @csrf
		      <div class="row">		      
		          <div class="col-md-6">
		          	<input type="hidden" name="fecha" id="fecha" value="{{$fecha->id}}">		   
		          	<div class="form-form-group row">
						<label for="primerequipo" class="col-form-label col-lg-4">Selecione primer equipo<span class="text-danger">*</span></label>
						<div class="col-lg-8">
							<select class="form-control select-search @error('primerequipo') is-invalid @enderror" id="primerequipo" name="primerequipo" data-fouc required="" >
							@foreach($asignacioncionAsc as $equi)						
								<option value="{{$equi->id}}" {{old('primerequipo')==$equi->id?'selected':''}}>				
								{{$equi->equipos->nombre.'-'.$equi->equipos->genero->nombre }}					
								</option>

							@endforeach	
							</select>
							@if ($errors->has('primerequipo'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('primerequipo') }}</strong>
                              </span>
                          	@endif
						</div>
					</div>					
					<div class="form-group row">
						<label for="hora" class="col-form-label col-lg-4 ">Selecione la hora<span class="text-danger">*</span></label>
							<div class="col-lg-8">
								<input class="form-control @error('hora') is-invalid @enderror"  value="{{old('hora')}}" required="" type="time"  name="hora" id="example-time-input">
								@if ($errors->has('hora'))
                              	<span class="invalid-feedback" role="alert">
                                  	<strong>{{ $errors->first('hora') }}</strong>
                              	</span>
                          	@endif
							</div>
						</div>					
		          </div>
		          <div class="col-md-6">
		          	<div class="form-group row">
		          		<label for="segundoequipo"  class="col-form-label col-lg-4">Selecione Segundo equipo<span class="text-danger">*</span></label>
						<div class="col-lg-8">						
							<select class="form-control select-search @error('segundoequipo') is-invalid @enderror" id="segundoequipo" name="segundoequipo" data-fouc required="">
							@foreach($asignacioncionDes as $equi)						
								<option value="{{$equi->id}}" {{old('segundoequipo')==$equi->id?'selected':''}}>				
								{{$equi->equipos->nombre.'-'.$equi->equipos->genero->nombre }}					
								</option>					  						
							@endforeach	
							</select>
							@if ($errors->has('segundoequipo'))
                              	<span class="invalid-feedback" role="alert">
                                  	<strong>{{ $errors->first('segundoequipo') }}</strong>
                              	</span>
                          	@endif	
						</div>
					</div>

					<div class="form-group row">
						<label for="estadio" class="col-form-label col-lg-4">Selecione Estadio<span class="text-danger">*</span></label>
							<div class="col-lg-8">
							<select class="form-control select-search @error('estadio') is-invalid @enderror " id="estadio" name="estadio" data-fouc required="">
							@foreach($estadio as $es)						
							<option value="{{$es->id}}">				
							{{$es->nombre}}					
							</option>					  						
							@endforeach	
							  @if ($errors->has('jugador'))
	                              <span class="invalid-feedback" role="alert">
	                                  <strong>{{ $errors->first('jugador') }}</strong>
	                              </span>
	                          @endif		
							</select>
						</div>
					</div>						
		          </div>
	      		</div>
	      		 <div class="form-group row mb-0">
			        <div class="col-md-6 offset-md-4">					
						<button type="submit" class="btn btn-dark btn-rounded">{{ __('Save') }} <i class="icon-paperplane ml-2"></i></button>
					</div>
				</div>
	  	</form>
	  	@endif
	  	@endcan
	</div>
</div>

<div class="card">
	<div class="card-header bg-dark header-elements-inline">
		<h6 class="card-title">Partidos Asignados de la Fecha: <b> {{$fecha->fechaInicio}}</b> </h6>		
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"></a>
        		<a class="list-icons-item" data-action="reload"></a>
        		
        	</div>
    	</div>
	</div>
	<div class="card-body">		
		@if($fecha->partidos->count()>0)
	<div class="table-responsive">
		<table class="table  table-lg">
			@foreach($fecha->partidos as $par)
			<tbody>
				<tr class="table-active">
					<th colspan="{{$fecha->estado==0?'7':'9'}}"><i class="fas fa-clock mr-3 fa-2x"></i> {{$par->hora}} </th>
					@can('Administrar partidos', 'ioliga\Models\Campeonato\Partido::class')
					@if($fecha->estado==0)
					<th>
						<select onchange="cambiarEstado1(this);" class="form-control">
						  <option class=" text-warning" value="{{$par->id}}" {{$par->tipo=='Proceso' ? 'selected' :''}}>Proceso</option>
						  <option class="text-success" value="{{$par->id}}" {{$par->tipo=='Finalizado' ? 'selected' :''}}>Finalizado</option>
						  <option class="text-info" value="{{$par->id}}" {{$par->tipo=='Diferido' ? 'selected' :''}}>Diferido</option>
						</select>
					</th>
					<th>
					<div class="btn-group" role="group" aria-label="Basic example">
						@if($par->arbitros->count()==0)
						<button data-url="" onclick="" class="btn bg-info border-teal text-teal rounded-round border-2 btn-icon  legitRipple"><i class="icon-plus2"></i>	<span class="">Arbitro</span>
						</button>
						@endif
						@if($par->alineaciones->count()==0 && $par->arbitros->count()==0)
						
						<button data-url="{{route('eliminar-partido',$par->id)}}" onclick="eliminar(this)" class="btn bg-danger  btn-icon btn-sm legitRipple">
							<span class="">Eliminar</span>
						</button>
						@endif
					</div>
					</th>
					@endif
					@endcan
				</tr>
				<tr>
					<td class="">
				<ul class="media-list">
					@if($par->asignacioUno->equipos->foto)
					
						<li class="media " >
                        <div class="mr-3">
                            <img src="{{ Storage::url('public/equipos/'.$par->asignacioUno->equipos->foto) }}" class="rounded-circle" width="40" height="40" alt="">
                          
                        </div>
                         <div class="media-body">
                            <div class="media-title font-weight-semibold">{{$par->asignacioUno->equipos->nombre}}</div>
                            <div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" s>
										<a href="{{route('alineacion',[$par->id,$par->asignacioUno->id])}}" class="dropdown-item"><i class="fa fa-list"></i> Jugadores</a>
										
									</div>
								</div>
							</div>
                        </div>
                        @else
                         <div class="mr-3">
                            <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                            
                        </div>
                      <div class="media-body">
                            <div class="media-title font-weight-semibold">{{$par->asignacioUno->equipos->nombre}}</div>
                            <div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" s>
										<a href="{{route('alineacion',[$par->id,$par->asignacioUno->id])}}" class="dropdown-item"><i class="fa fa-list"></i> Jugadores</a>
										
									</div>
								</div>
							</div>
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
					<td>
					<ul class="media-list">
						<li class="media " >
						@if($par->asignacioDos->equipos->foto)
                        <div class="mr-3">
                            <img src="{{ Storage::url('public/equipos/'.$par->asignacioDos->equipos->foto) }}" class="rounded-circle" width="40" height="40" alt="">                          
                        </div>
                      <div class="media-body">
                        <div class="media-title font-weight-semibold">{{$par->asignacioDos->equipos->nombre}}</div>
                     <div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" s>
									<a href="{{route('alineacion',[$par->id,$par->asignacioDos->id])}}" class="dropdown-item"><i class="fa fa-list"></i> Jugadores</a>
							
								</div>
							</div>
						</div>
                    </div>
                        @else
                         <div class="mr-3 ">
                            <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                            
                        </div>
                      <div class="media-body">
                        <div class="media-title font-weight-semibold">{{$par->asignacioDos->equipos->nombre}}</div>
	                    <div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" s>
										<a href="{{route('alineacion',[$par->id,$par->asignacioDos->id])}}" class="dropdown-item"><i class="fa fa-list"></i> Jugadores</a>
									
									</div>
								</div>
							</div>
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

					<td>
					<ul class="media-list">
					@foreach($par->arbitros as $art)
						@if($art->user->foto)
						
							<li class="media " >
	                        <div class="mr-3">
	                            <img src="{{ Storage::url('public/usuarios/'.$art->user->foto) }}" class="rounded-circle" width="40" height="40" alt="">
	                          
	                        </div>
	                         <div class="media-body">
	                            <div class="media-title font-weight-semibold">{{$art->user->nombres}}</div>
	                            <span class=" media-title">{{$art->user->apellidos }}</span>
	                            
	                        </div>
	                        @else
	                         <div class="mr-3">
	                            <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
	                            
	                        </div>
	                      	<div class="media-body">
	                            <div class="media-title font-weight-semibold">{{$art->user->nombres}}</div>
	                            <span class=" media-title">{{$art->user->apellidos }}</span>
	                           
	                        </div>
	                    </li>                    
	                        @endif
	                     @endforeach
                     </ul>

					</td>

					<td>
			
					</td>
				</tr>			

			</tbody>
			@endforeach
		</table>
	</div>

		@endif

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
var estadoEquipo="{{route('estado-partido')}}"
 function cambiarEstado1(argument){
    var op=argument.options[argument.selectedIndex].text;
    var id=argument.value;
    var estado=op;     
    $.post(estadoEquipo,{partido:id,estado:estado})
     .done(function( data ) {
        window.location.replace("{{route('fecha',$fecha->id)}}");      
	})
    
}
</script>


@endsection