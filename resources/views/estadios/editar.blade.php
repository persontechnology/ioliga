@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('estadiosEditar',$estadio))

@section('acciones')	
	<a href="{{ route('estadios') }}" class="breadcrumb-elements-item">
	    <i class="fas fa-arrow-left"></i>
	    {{ __('Cancel') }}
	</a>
@endsection

@section('content')

<div class="content">
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Editar Estadio </h5>
			<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"></a>
        		<a class="list-icons-item" data-action="reload"></a>        		
        	</div>
    	</div>
		</div>		
		<div class="card-body">
            <hr>
       <form method="POST" action="{{ route('actualizar') }}" enctype="multipart/form-data">
           <div class="row">
               <div class="col-sm-6">           
                <input type="hidden" name="estadio" id="estadio" value="{{ $estadio->id }}" required="">
                @csrf
               
                <div class="form-group row">
                    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                    <div class="col-md-8">
                        <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre',$estadio->nombre) }}" required  placeholder="Ingrese el nombre..">

                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

               <div class="form-group row">
                    <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                    <div class="col-md-8">
                        
                        <textarea id="direccion"  class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" required="" placeholder="Ingrese dirección..">{{ old('direccion',$estadio->direccion) }}</textarea>

                        @if ($errors->has('direccion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('direccion') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono (opcional)') }}</label>

                    <div class="col-md-8">
                        <input id="telefono" type="number" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono',$estadio->telefono) }}"  >

                        @if ($errors->has('telefono'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telefono') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
             </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Forografía (opcional)</label>

                    <div class="col-md-8">
                    <div class="file-loading" >
                        <input id="foto"   type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" >

                        @if ($errors->has('foto'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                </div>
              </div>
            </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-dark btn-rounded">
                            {{ __('Actualizar Estadio') }} <i class="icon-paperplane ml-1"></i>
                        </button>
                    </div>
                </div>
            </form>
		</div>		
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
<script type="text/javascript">
@if($estadio->foto)
  var foto="<img class='kv-preview-data file-preview-image' src='{{ Storage::url('public/estadios/'.$estadio->foto) }}'>";
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
    $('#menuEstadio').addClass('active');

</script>

@endsection