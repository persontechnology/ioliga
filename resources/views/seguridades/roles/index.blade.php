@extends('layouts.app',['titulo'=>'Roles'])
@section('breadcrumbs', Breadcrumbs::render('roles'))

@section('acciones')
    <a href="#" class="breadcrumb-elements-item">
        <i class="icon-comment-discussion mr-2"></i>
        Support
    </a>

    <div class="breadcrumb-elements-item dropdown p-0">
        <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
            <i class="icon-gear mr-2"></i>
            Settings
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
            <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
            <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
        </div>
    </div>
@endsection

@section('content')


<div class="row">
	@foreach($roles as $rol)
	<div class="col-md-6">
		<form action="{{ route('actualizarPermisos') }}" method="post">
			 @csrf
			<input type="hidden" name="rol" value="{{ $rol->id }}" required="">
			<div class="card border-y-1 border-top-dark border-bottom-dark rounded-0">
				<div class="card-header bg-white header-elements-inline">
					<h6 class="card-title">{{ $rol->name }}</h6>
					
				</div>
				
				<div class="card-body">
					@foreach($permisos as $per)
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" name="permisos[]" id="permiso{{ $per->id.$rol->id }}" value="{{ $per->id }}" {{ $rol->hasPermissionTo($per) ? 'checked': '' }} >
					  <label class="form-check-label" for="permiso{{ $per->id.$rol->id }}">{{ $per->name }}</label>
					</div>
					@endforeach
				</div>
				<div class="card-footer bg-white d-flex justify-content-between align-items-center">
					<button type="submit" class="btn bg-blue">Actualizar</button>
					<div class="btn-group">
						<button type="button" class="btn btn-outline bg-slate text-slate-700 border-slate border-2 dropdown-toggle" data-toggle="dropdown">Más</button>
						<div class="dropdown-menu dropdown-menu-right">
							<button type="button" data-msj="{{ $rol->name }}" data-url="{{ route('eliminarRol',$rol->id) }}" onclick="eliminar(this);" class="dropdown-item">Eliminar</button>
							@if(count($rol->getAllPermissions())>0)
							<a href="{{ route('pdfRol',$rol->id) }}" class="dropdown-item">Descargar PDF</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	@endforeach
</div>


@push('scriptsFooter')
    <script>
        $('#menuRoles').addClass('active');
    </script>
@endpush


@endsection
