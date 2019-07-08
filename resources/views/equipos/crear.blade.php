@extends('layouts.app',['titulo'=>'Crear Equipo'])

@section('breadcrumbs', Breadcrumbs::render('crear-equipos',$generos))

@section('acciones')	
	<a href="{{ route('equipos',$generos->id) }}" class="breadcrumb-elements-item">
	    <i class="fas fa-arrow-left"></i>
	    {{ __('Cancel') }}
	</a>
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <form action="{{route('guardarEquipo')}}" method="post" enctype="multipart/form-data">
    	@csrf
	
			<legend class="text-uppercase font-size-sm font-weight-bold">Completar información</legend>
			<input type="hidden" name="generoEquipo_id" id="generoEquipo_id" class="form-control " value="{{$generos->id}}">
	     <div class="row">
           <div class="col-sm-6">  
           	<div class="form-group row">
				<label for="direccion" class="col-form-label col-lg-3">Representante<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					@if($representante->count()>0)
					 <select class="selectpicker show-tick form-control @error('usuario') is-invalid @enderror" id="usuario" name="usuario" title="Selecione representante..." data-live-search="true" data-header="Selecione maestrías.." required="">
                          @foreach($representante as $representante)
                          <option  {{ old('usuario')==$representante->id ? 'selected':'' }} value="{{$representante->id}}" data-tokens="{{$representante->id ?? ''}}" data-subtext="{{$representante->id ?? ''}}">{{$representante->nombres.' '. $representante->apellidos  ?? ''}} </option>
                          @endforeach
                        </select>
                        @error('usuario')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				 	@else
                        <div class="alert alert-info alert-styled-left alert-dismissible">
                            No existen Representantes porfavor cree uno
                            <a href="{{route('crearUsuario')}}" class="alert-link">	aquí</a>
                        </div>
                    @endif
					
				</div>
			</div>

			<div class="form-group row">
				<label for="direccion" class="col-form-label col-lg-3">Nombre<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ingrese.." required="">
					@error('nombre')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="localidad" class="col-form-label col-lg-3">Localidad<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<textarea name="localidad" id="localidad" class="form-control @error('localidad') is-invalid @enderror" placeholder="Ingrese.." required="">{{ old('localidad')}}</textarea>
					@error('localidad')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="telefono" class="col-form-label col-lg-3">Teléfono<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<input type="number" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control @error('telefono') is-invalid @enderror" placeholder="Ingrese..">
					@error('telefono')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="anioCreacion" class="col-form-label col-lg-3">Año de creación (opcional)<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<input type="number" name="anioCreacion" id="anioCreacion" value="{{ old('anioCreacion') }}" class="form-control @error('anioCreacion') is-invalid @enderror" placeholder="Ingrese..">
					@error('anioCreacion')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="fraseIdentificacion" class="col-form-label col-lg-3">Frase de Identificación (opcional)<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<input type="text" name="fraseIdentificacion" id="fraseIdentificacion" value="{{ old('fraseIdentificacion') }}" class="form-control @error('fraseIdentificacion') is-invalid @enderror" placeholder="Ingrese..">
					@error('fraseIdentificacion')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="color" class="col-form-label col-lg-3">Color (opcional)<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<input type="text" name="color" id="color" value="{{ old('color') }}" class="form-control @error('color') is-invalid @enderror" placeholder="Ingrese..">
					@error('color')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="color1" class="col-form-label col-lg-3">Color #2 (opcional)<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<input type="text" name="color1" id="color1" value="{{ old('color1') }}" class="form-control @error('color1') is-invalid @enderror" placeholder="Ingrese..">
					@error('color1')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="color2" class="col-form-label col-lg-3">Color #3 (opcional)<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<input type="text" name="color2" id="color2" value="{{ old('color2') }}" class="form-control @error('color2') is-invalid @enderror" placeholder="Ingrese..">
					@error('color2')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			 
			</div>
            <div class="col-sm-6">
	              <div class="form-group row">
					<label for="resenaHistorico" class="col-form-label col-lg-3">Reseña Histórica (opcional)<span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<textarea cols="5" rows="7" name="resenaHistorico" id="resenaHistorico" class="form-control @error('resenaHistorico') is-invalid @enderror" placeholder="Ingrese.." >{{ old('resenaHistorico')}}</textarea>
						@error('resenaHistorico')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                    </span>
		                @enderror
					</div>
				</div> 
				<div class="file-loading">
				    <input  type="file"  name="foto" id="foto" class="@error('foto') is-invalid @enderror"  accept="image/*">
				</div>
				@error('foto')
	                <span class="text-danger" role="alert">
	                    <strong>{{ $message }}</strong>
	                </span>
	            @enderror
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

@prepend('scriptsHeader')

{{-- file input --}}
<link href="{{ asset('plus/bootstrap-fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
<script src="{{ asset('plus/bootstrap-fileinput/js/plugins/piexif.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plus/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
<script src="{{asset('plus/bootstrap-fileinput/js/plugins/purify.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('plus/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('plus/bootstrap-fileinput/themes/fas/theme.min.js') }}"></script>
<script src="{{ asset('plus/bootstrap-fileinput/js/locales/es.js') }}"></script>
{{-- fin file input --}}

@endprepend

@push('scriptsFooter')
    <script>
        $('#menuEquipo').addClass('active');
        subirFoto("#foto");
       

    </script>
@endpush


@endsection
