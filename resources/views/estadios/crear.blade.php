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
    <form action="#">
		<fieldset>
			<legend class="text-uppercase font-size-sm font-weight-bold">Completar información</legend>

			<div class="form-group row">
				<label class="col-form-label col-lg-2">Nombre<span class="text-danger">*</span></label>
				<div class="col-lg-10">
					<input type="text" class="form-control" placeholder="Ingrese..">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-form-label col-lg-2">Dirección<span class="text-danger">*</span></label>
				<div class="col-lg-10">
					<textarea rows="3" cols="3" class="form-control" placeholder="Ingrese.."></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-lg-2">Teléfono</label>
				<div class="col-lg-10">
					<input type="number" class="form-control" maxlength="4" placeholder="Ingrese..">
				</div>
			</div>
			<input id="input-id" type="file" class="file" data-preview-file-type="text" >

		</fieldset>

		<div class="text-right">
			<button type="submit" class="btn btn-primary">{{ __('Save') }} <i class="icon-paperplane ml-2"></i></button>
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
    </script>
@endpush


@endsection
