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

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- Se necesita piexif.min.js para la orientación automática de archivos de imagen O cuando se restauran datos exif en imágenes redimensionadas y cuando desea cambiar el tamaño de las imágenes antes de subir. Esto debe ser cargado antes fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/fileinput.min.js"></script>
<!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/themes/fa/theme.js"></script>
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/locales/(lang).js"></script>

@endprepend

@push('scriptsFooter')
    <script>
        $('#menuEstadio').addClass('active');
    </script>
@endpush


@endsection
