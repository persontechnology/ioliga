@extends('layouts.app',['titulo'=>'Crear estadio'])

@section('breadcrumbs', Breadcrumbs::render('crearEstadio'))

@section('acciones')	
	<a href="{{ route('estadios') }}" class="breadcrumb-elements-item">
	    <i class="fas fa-arrow-left"></i>
	    {{ __('Cancel') }}
	</a>
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <form action="{{ route('guardarEstadio') }}" method="post" enctype="multipart/form-data">
    	@csrf
	
			<legend class="text-uppercase font-size-sm font-weight-bold">Completar información</legend>
	     <div class="row">
           <div class="col-sm-6">  

			<div class="form-group row">
				<label for="direccion" class="col-form-label col-lg-2">Nombre<span class="text-danger">*</span></label>
				<div class="col-lg-10">
					<input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ingrese.." required="">
					@error('nombre')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="direccion" class="col-form-label col-lg-2">Dirección<span class="text-danger">*</span></label>
				<div class="col-lg-10">
					<textarea name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" placeholder="Ingrese.." required="">{{ old('direccion')}}</textarea>
					@error('direccion')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="telefono" class="col-form-label col-lg-2">Teléfono</label>
				<div class="col-lg-10">
					<input type="number" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control @error('telefono') is-invalid @enderror" placeholder="Ingrese..">
					@error('telefono')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
				</div>
			</div>
			</div>
            <div class="col-sm-6">  
			<div class="file-loading">
			    <input  type="file"  name="foto" id="fotoEstadio" class="@error('foto') is-invalid @enderror"  accept="image/*">
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
        $('#menuEstadio').addClass('active');
        subirFoto("#fotoEstadio");

    </script>
@endpush


@endsection
