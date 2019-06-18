@extends('layouts.app',['titulo'=>'menú del campornato'])
@section('breadcrumbs', Breadcrumbs::render('nomina-menu',$asignacion))
@section('content')

<div class="row">
		<div class="col-md-6">

		<!-- desde aki -->
				<!-- Basic layout-->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Asignar jugador al campeonato</h5>
				<div class="header-elements">
					<div class="list-icons">
                		<a class="list-icons-item" data-action="collapse"></a>
                		<a class="list-icons-item" data-action="reload"></a>              
                	</div>
            	</div>
			</div>

			<div class="card-body">
			@if($asignacion->estado==false )
			@if($nomina->count() >0 )

			<form action="{{route('crear-nomina-asignacion')}}" method="post" enctype="multipart/form-data">
    				@csrf

					<input type="hidden" name="asignacion" id="asignacion" value="{{Crypt::encryptString($asignacion->id)}}">
					<div class="form-group">
						<label>Seleccione al jugador:</label>
						<select class="form-control select-search " id="jugador" name="jugador" data-fouc required="">
						@foreach($nomina as $no)						
						<option value="{{Crypt::encryptString($no->id)}}">				
						{{$no->usuarioUno->nombres.' '.$no->usuarioUno->apellidos }}					
						</option>					  						
						@endforeach	
						  @if ($errors->has('jugador'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('jugador') }}</strong>
                              </span>
                          @endif		
						</select>
					</div>
					<div class="form-group">
						<label>Número de camiseta:</label>
						<input type="number" name="numero" id="numero" class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}" value="{{ old('numero') }}" required="">
						 @if ($errors->has('number'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @endif
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Asignar <i class="icon-paperplane ml-2"></i></button>
					</div>
			</form>
				@else
			 <div class="alert alert-warning alert-styled-left alert-dismissible">
                No existen jugadores asignados a este Equipo  crear
               	<a href="{{route('nomina',Crypt::encryptString($asignacion->equipo_id))}}" class="alert-link"> aquí</a> 
                
            </div>
			@endif
			@else
			 <div class="alert alert-info alert-styled-left alert-dismissible">
               Su equipo cumple con nómina requerida para participar            
            </div>
			@endif
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title">Nómina de {{$asignacion->equipos->nombre}} </h6>
				<div class="header-elements">
					<div class="list-icons">
                		<a class="list-icons-item" data-action="collapse"></a>
                		<a class="list-icons-item" data-action="reload"></a>
                		
                	</div>
            	</div>
			</div>
			<div class="card-body">
			@if($asignacion->asignacionNomninas->count() >0)
				<ul class="media-list">
					@foreach($asignacion->asignacionNomninas as $noas)
					<li class="media">
						<div class="mr-3">	
						@if($noas->usuarioUno->foto)					
							<div class="card-img-actions">
								<a href="{{ Storage::url('public/usuarios/'.$noas->usuarioUno->foto) }}" data-popup="lightbox">
									<img class="rounded-circle" width="52" height="52" src="{{ Storage::url('public/usuarios/'.$noas->usuarioUno->foto) }}" alt="">
									<span class="card-img-actions-overlay card-img">
										<i class="icon-plus3"></i>
									</span>
								</a>
							</div>	
						@else
							<img src="{{ asset('global_assets/images/juavatar.png') }}" class="rounded-circle" width="52" height="52" alt="">
						@endif					
						</div>

						<div class="media-body">
							<div class="media-title font-weight-semibold">{{$noas->usuarioUno->apellidos}}</div>
							<span class="text-muted">{{$noas->usuarioUno->nombres}}</span>
						</div>
						<div class="media-body ">
							<div class="media-title font-weight-semibold">{{Carbon\Carbon::parse($noas->usuarioUno->fechaNacimiento)->age}} Años</div>
							<span class="text-muted"># {{$noas->asignacionNomina->numero}}</span>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark border-{{$noas->asignacionNomina->estado==1?'info':'danger'}} mr-1"></span> {{$noas->asignacionNomina->estado==1?'Habilitado':'No habilitado'}}
							</div>
						</div>
						@if($asignacion->estado==false )
						<div class="media-body ">
							<select onchange="cambiarEstado1(this);" class="form-control">
							  <option value="{{$noas->asignacionNomina->id}}" {{$noas->asignacionNomina->estado=='1' ? 'selected' :''}}>Habilitado</option>
							  <option value="{{$noas->asignacionNomina->id}}" {{$noas->asignacionNomina->estado=='0' ? 'selected' :''}}>Inhabilitado</option>

							</select>
						</div>
						<div class="align-self-center ml-3">
						
							<div class="list-icons list-icons-extended">
		                    	<a  data-url="{{ route('eliminarNominaAsignar',$noas->asignacionNomina->id) }}" data-msj="{{ $noas->usuarioUno->apellidos }}" onclick="eliminar(this);"  class="list-icons-item" data-popup="tooltip" title="Borrar asignación de jugador" data-trigger="hover" data-target="#call">
		                    	<i class="icon-cancel-circle2"></i>
		                    	</a>
		                    	
	                    	</div>
	                    	
						</div>
						@endif
					</li>
					@endforeach	
				</ul>
			@else
			  <div class="alert alert-warning alert-styled-left alert-dismissible">
                No existen jugadores asignados a este campeonato 
                
            </div>
			@endif
				
			</div>	
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

	      return "No existen jugadores sin asignar";        
	    },
	    searching: function() {

	      return "Buscando..";
	    }
	  }
	})
});	

 var estadoEquipo="{{route('estado-nomina-asignacion')}}"
 function cambiarEstado1(argument){
    var op=argument.options[argument.selectedIndex].text;
    var id=argument.value;
    var estado=op;
    $.post(estadoEquipo,{id:id,estado:estado})
    .done(function( data ) {
        window.location.replace("{{route('nomina-asignacion',$asignacion->id)}}");     
	})
}
</script>
@endsection
