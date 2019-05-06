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
		<div class="card border-y-1 border-top-dark border-bottom-dark rounded-0">
			<div class="card-header bg-white header-elements-inline">
				<h6 class="card-title">{{ $rol->name }}</h6>
				<div class="header-elements">
					<button type="button" class="btn btn-outline-dark">Button</button>
				</div>
			</div>
			
			<div class="card-body">
				Basic border size of the element, defined in core variables. Any card border can be highlighted with proper class name
			</div>
		</div>
	</div>
	@endforeach
</div>


@push('scriptsFooter')
    <script>
        $('#menuRoles').addClass('active');
    </script>
@endpush


@endsection
