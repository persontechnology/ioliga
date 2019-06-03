@extends('layouts.app',['titulo'=>'menú del campornato'])
@section('breadcrumbs', Breadcrumbs::render('ver-asignacion-campeonatos',$asignacion))
@section('content')
<!-- Task manager table -->
<div class="card ">
	<div class="card-header bg-transparent header-elements-inline">
	
		@if($asignacion->estado)
		<h6 class="card-title">Listado de campeonatos</h6>
		<div class="toast border-white" style="opacity: 1; max-width: none;">
			<div class="toast-header bg-success border-white">
				<span class="font-weight-semibold mr-auto">ATENSIÓN <i class="icon-alert"></i><br>CUMPLE CON TODOS LOS REQUERIMIENTOS PARA SER ACEPTADO EN ESTE CAMPEONATO </span>					
				<button type="button" class="ml-3 close text-white" data-dismiss="toast">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
		@else
		<div class="toast border-pink-800 animated bounceInLeft " style="opacity: 1; max-width: none;">
			<div class="toast-header bg-pink-800 border-pink-800">
				<span class="font-weight-semibold mr-auto">ATENSIÓN <i class="icon-alert"></i><br> NO CUMPLE CON TODOS LOS REQUERIMIENTOS <button data-popup="tooltip" title=""  data-trigger="hover"   data-original-title="Verifique la nómina de jugadores" type="button" class="ml-5 close text-white" ><i class="icon-help"></i></button> </span>           	
			</div>
		</div>
		@endif
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"></a>
        		<a class="list-icons-item" data-action="reload"></a> 
        	</div>
    	</div>
	</div>
	<!-- Content area -->
		<div class="content">
			<div class="row">
				<div class="col-sm-6 col-xl-4">
					<div class="card card-body bg-dark has-bg-image">
						<div class="media">
							<div class="media-body">
								<h3 class="mb-0">{{$asignacion->asignacionNomninas->count() }}</h3>
								<a href="{{route('asignacion-nomina',Crypt::encryptString($asignacion->id))}}">
									<span class="text-uppercase text-white font-size-xs">Listado de jugadores</span> <i class="icon-point-right text-white"></i>
								</a>
							</div>

							<div class="ml-3 align-self-center">
								<i class="icon-users2 icon-3x opacity-75"></i>
							</div>
							<div class="list-icons-item dropdown mt-5">
	                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									@if($asignacion->asignacionNomninas->count()>0)
									@foreach($asignacion->asignacionNomninas as $noas)
									<a href="#" class="dropdown-item"><i class="icon-vcard"> {{$noas->asignacionNomina->numero}}</i> {{$noas->usuarioUno->apellidos .' '. $noas->usuarioUno->nombres}}</a>
								
									@endforeach
									@endif
								</div>
	                		</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-xl-4">
					<div class="card card-body bg-blue-800 has-bg-image">
						<div class="media">
							<div class="media-body">
								<h3 class="mb-0">389,438</h3>
								<span class="text-uppercase font-size-xs">total orders</span>
							</div>

							<div class="ml-3 align-self-center">
								<i class="icon-bag icon-3x opacity-75"></i>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-xl-4">
					<div class="card card-body bg-success-400 has-bg-image">
						<div class="media">
							<div class="mr-3 align-self-center">
								<i class="icon-pointer icon-3x opacity-75"></i>
							</div>

							<div class="media-body text-right">
								<h3 class="mb-0">652,549</h3>
								<span class="text-uppercase font-size-xs">total clicks</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-xl-4">
					<div class="card card-body bg-indigo-400 has-bg-image">
						<div class="media">
							<div class="mr-3 align-self-center">
								<i class="icon-enter6 icon-3x opacity-75"></i>
							</div>

							<div class="media-body text-right">
								<h3 class="mb-0">245,382</h3>
								<span class="text-uppercase font-size-xs">total visits</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /content area -->
		
	</div>

@prepend('scriptsHeader')
	<link rel="stylesheet" href="{{ asset('global_assets/css/extras/animate.min.css') }}">
    <script type="text/javascript" src="{{ asset('/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('/global_assets/js/demo_pages/animations_css3.js') }}"></script>
@endprepend


@endsection