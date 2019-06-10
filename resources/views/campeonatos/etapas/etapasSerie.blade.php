@extends('layouts.app',['titulo'=>'Etapas series '])
@section('breadcrumbs', Breadcrumbs::render('etapas-serie-genero',$generoSerie))
@section('content')

<div class="card">
	<div class="card-header bg-dark text-white header-elements-inline">
		<h6 class="card-title">Agregar nueva etapa a esta serie "{{$generoSerie->serie->nombre}}" {{$generoSerie->genero->generoEquipo->nombre}}</h6>
	
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"></a>
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
	<div class="col-xl-4 col-md-6">
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
								<a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
								<a href="{{route('fechas-etapa',$etapaSerie->id)}}" class="dropdown-item"><i class="icon-calendar"></i> Fechas</a>
								<div class="dropdown-divider"></div>
								@if($etapaSerie->fechas->count()>0)
								@php($i=0)
								@foreach($etapaSerie->fechas as $fe)
								@php($i++)
								<a href="{{route('fecha',$fe->id)}}" class="dropdown-item"><i class="icon-calendar"></i>{{$fe->nombre}} {{$i}}</a>
								@endforeach
								@endif
							</div>
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
</script>
@endsection