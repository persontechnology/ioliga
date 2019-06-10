@extends('layouts.app',['titulo'=>'Etapas series '])

@section('content')
<div class="card">
	<div class="card-header bg-white header-elements-inline">
		<h6 class="card-title">Fecha de la etapa "<b>{{$fecha->etapaSerie->etapa->nombre}}</b>" En la serie <b>"{{$fecha->etapaSerie->generoSerie->serie->nombre }}"</b> </h6>		
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"></a>
        		<a class="list-icons-item" data-action="reload"></a>
        		
        	</div>
    	</div>
	</div>
	<div class="card-body">
		<form action="{{ route('crear-partido') }}" method="post" enctype="multipart/form-data" id="formIngresoUsuario">
		      @csrf
		      <div class="row">

		          <div class="col-md-6">
		          	<input type="hidden" name="fecha" id="fecha" value="{{$fecha->id}}">
		          	<div class="form-form-group row">
						<label for="primerequipo" class="col-form-label col-lg-4">Selecione primer equipo<span class="text-danger">*</span></label>
						<div class="col-lg-8">
							<select class="form-control select-search " id="primerequipo" name="primerequipo" data-fouc required="">
							@foreach($fecha->etapaSerie->generoSerie->asignacion as $equi)						
							<option value="{{$equi->id}}">				
							{{$equi->equipos->nombre.'-'.$equi->equipos->genero->nombre }}					
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

					<div class="form-group row">
						<label for="arbitro" class="col-form-label col-lg-4">Selecione Árbitro<span class="text-danger">*</span></label>
							<div class="col-lg-8">
							<select class="form-control select-search " id="arbitro" name="arbitro" data-fouc required="">
							@foreach($arbitro as $ar)						
							<option value="{{$ar->id}}">				
							{{$ar->nombres.'-'.$ar->apellidos }}					
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
					<div class="form-group row">
						<label for="hora" class="col-form-label col-lg-4">Selecione la hora<span class="text-danger">*</span></label>
							<div class="col-lg-8">
								<input class="form-control" type="time"  name="hora" id="example-time-input">
							</div>
						</div>
					
		          </div>

		          <div class="col-md-6">
		          	<div class="form-group row">
		          		<label for="segundoequipo" class="col-form-label col-lg-4">Selecione Segundo equipo<span class="text-danger">*</span></label>
						<div class="col-lg-8">
						
							<select class="form-control select-search " id="segundoequipo" name="segundoequipo" data-fouc required="">
							@foreach($fecha->etapaSerie->generoSerie->asignacion as $equi)						
							<option value="{{$equi->id}}">				
							{{$equi->equipos->nombre.'-'.$equi->equipos->genero->nombre }}					
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

					<div class="form-group row">
						<label for="estadio" class="col-form-label col-lg-4">Selecione Estadio<span class="text-danger">*</span></label>
							<div class="col-lg-8">
							<select class="form-control select-search " id="estadio" name="estadio" data-fouc required="">
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


	</div>
</div>

<div class="card">
	<div class="card-header bg-dark header-elements-inline">
		<h6 class="card-title">Partidos Asignados </h6>		
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
					<th colspan="5"><i class="fas fa-clock mr-3 fa-2x"></i> {{$par->hora}}</th>
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
                            <span class=" media-title"><i class="fa fa-user"></i> {{$par->asignacioUno->equipos->user->nombres.' '.$par->asignacioUno->equipos->user->apellidos }}</span>
                        </div>
                        @else
                         <div class="mr-3">
                            <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                            
                        </div>
                      <div class="media-body">
                            <div class="media-title font-weight-semibold">{{$par->asignacioUno->equipos->nombre}}</div>
                            <span class=" media-title"><i class="fa fa-user"></i> {{$par->asignacioUno->equipos->user->nombres.' '.$par->asignacioUno->equipos->user->apellidos }}</span>
                        </div>
                    </li>                    
                        @endif
                     </ul>
					</td>
					<td >
						
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
                        <span class=" media-title"><i class="fa fa-user"></i>{{$par->asignacioDos->equipos->user->nombres.' '.$par->asignacioDos->equipos->user->apellidos }}</span>
                    </div>
                        @else
                         <div class="mr-3">
                            <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                            
                        </div>
                      <div class="media-body">
                        <div class="media-title font-weight-semibold">{{$par->asignacioDos->equipos->nombre}}</div>
                        <span class=" media-title"><i class="fa fa-user"></i>{{$par->asignacioDos->equipos->user->nombres.' '.$par->asignacioUno->equipos->user->apellidos }}</span>
                    </div>
               		 </li>
                        @endif
                    </ul>
						
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
						@if($par->arbitro->foto)
					
						<li class="media " >
                        <div class="mr-3">
                            <img src="{{ Storage::url('public/usuarios/'.$par->arbitro->foto) }}" class="rounded-circle" width="40" height="40" alt="">
                          
                        </div>
                         <div class="media-body">
                            <div class="media-title font-weight-semibold">{{$par->arbitro->nombres .' '. $par->arbitro->apellidos}}</div>
                            <span class=" media-title">{{$par->arbitro->direccion }}</span>
                            
                        </div>
                        @else
                         <div class="mr-3">
                            <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                            
                        </div>
                      	<div class="media-body">
                            <div class="media-title font-weight-semibold">{{$par->arbitro->nombres .' '. $par->arbitro->apellidos}}</div>
                            <span class=" media-title">{{$par->arbitro->direccion }}</span>
                           
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
</script>


@endsection