@extends('layouts.app',['titulo'=>'Editar Equipo'])
@section('breadcrumbs', Breadcrumbs::render('editar-equipos',$equipo))


@section('acciones')	
	<a href="{{ route('equipos',$equipo->generoEquipo_id) }}" class="breadcrumb-elements-item">
	    <i class="fas fa-arrow-left"></i>
	    {{ __('Cancel') }}
	</a>
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <form action="{{route('actualizar-equipo')}}" method="post" enctype="multipart/form-data">
    	@csrf
	
			<legend class="text-uppercase font-size-sm font-weight-bold">Completar información</legend>
			<input type="hidden" name="equipo" id="equipo" class="form-control " value="{{$equipo->id}}">
			<input type="hidden" name="genero" id="genero" class="form-control " value="{{$equipo->generoEquipo_id}}">

	     <div class="row">
           <div class="col-sm-6">  
           	<div class="form-group row">
				<label for="direccion" class="col-form-label col-lg-3">Representante<span class="text-danger">*</span></label>
						<div class="col-lg-9">
					@if($representante->count()>0)
					 <select class="selectpicker show-tick form-control" id="usuario" name="usuario" title="Selecione representante..." data-live-search="true" data-header="Selecione maestrías.." required="">
                          @foreach($representante as $representante)
                          <option value="{{$representante->id}}" data-tokens="{{$representante->id ?? ''}}" data-subtext="{{$representante->id ?? ''}}">{{$representante->nombres.' '. $representante->apellidos  ?? ''}} </option>
                          @endforeach
                        </select>
				 	@else
                        <div class="alert alert-info alert-styled-left alert-dismissible">
                            No existen Representantes porfavor cree uno
                            <a href="{{route('crearUsuario')}}" class="alert-link">	aquí</a>
                        </div>
                    @endif
					@error('usuario_id')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="direccion" class="col-form-label col-lg-3">Nombre<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{$equipo->nombre,  old('nombre') }}" placeholder="Ingrese.." required="">
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
					<textarea name="localidad" id="localidad" class="form-control @error('localidad') is-invalid @enderror" placeholder="Ingrese.." required="">{{ $equipo->localidad, old('localidad')}}</textarea>
					@error('localidad')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="telefono" class="col-form-label col-lg-3">Teléfono</label>
				<div class="col-lg-9">
					<input type="number" name="telefono" id="telefono" value="{{$equipo->telefono,  old('telefono') }}" class="form-control @error('telefono') is-invalid @enderror" placeholder="Ingrese..">
					@error('telefono')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="anioCreacion" class="col-form-label col-lg-3">Año de creación (opcional)</label>
				<div class="col-lg-9">
					<input type="number" name="anioCreacion" id="anioCreacion" value="{{ $equipo->anioCreacion, old('anioCreacion') }}" class="form-control @error('anioCreacion') is-invalid @enderror" placeholder="Ingrese..">
					@error('anioCreacion')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="fraseIdentificacion" class="col-form-label col-lg-3">Frase de Identificación (opcional)</label>
				<div class="col-lg-9">
					<input type="number" name="fraseIdentificacion" id="fraseIdentificacion" value="{{$equipo->fraseIdentificacion, old('fraseIdentificacion') }}" class="form-control @error('fraseIdentificacion') is-invalid @enderror" placeholder="Ingrese..">
					@error('fraseIdentificacion')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="color" class="col-form-label col-lg-3">Color (opcional)</label>
				<div class="col-lg-9">
					<input type="number" name="color" id="color" value="{{$equipo->color,  old('color') }}" class="form-control @error('color') is-invalid @enderror" placeholder="Ingrese..">
					@error('color')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="color1" class="col-form-label col-lg-3">Color #2 (opcional)</label>
				<div class="col-lg-9">
					<input type="number" name="color1" id="color1" value="{{$equipo->color1,  old('color1') }}" class="form-control @error('color1') is-invalid @enderror" placeholder="Ingrese..">
					@error('color1')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="color2" class="col-form-label col-lg-3">Color #3 (opcional)</label>
				<div class="col-lg-9">
					<input type="number" name="color2" id="color2" value="{{ $equipo->color1, old('color2') }}" class="form-control @error('color2') is-invalid @enderror" placeholder="Ingrese..">
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
						<textarea cols="5" rows="7" name="resenaHistorico" id="resenaHistorico" class="form-control @error('resenaHistorico') is-invalid @enderror" placeholder="Ingrese.." >{{$equipo->resenaHistorico, old('resenaHistorico')}}</textarea>
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
     $('#usuario').val('{{$equipo->users_id}}')
       
	@if($equipo->foto)
	  var foto="<img class='kv-preview-data file-preview-image' src='{{ Storage::url('public/equipos/'.$equipo->foto) }}'>";
	@else
	var foto="<img class='kv-preview-data file-preview-image' src='{{ asset('global_assets/images/estadio.jpg') }}'>";
	@endif
    $("#foto").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: true,
        showUpload: false,
        language: "es",
        initialPreview: [foto],
        allowedFileExtensions: ["jpg", "png", "gif"],
    });

	    </script>
@endpush


@endsection
