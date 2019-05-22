@extends('layouts.app',['titulo'=>'Lista de juagadores'])
@section('breadcrumbs', Breadcrumbs::render('nomina-jugadores-representante',$equipo))

@section('content')

<!-- Dashboard content -->
<div class="row">
	<div class="col-xl-12">

		<!-- Marketing campaigns -->
		<div class="card">
			<div class="card-header header-elements-sm-inline">
				<h6 class="card-title">Lista de jugadores convocados equipo <span class="badge bg-primary badge-pill"> {{$equipo->nombre}} </span></h6>
				<div class="header-elements">
					<span class="badge bg-success badge-pill">28 (cambiar)</span>			
            	</div>
			</div>

			<div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
				<div class="d-flex align-items-center mb-3 mb-sm-0">
					<div id="campaigns-donut"></div>
					<div class="ml-3">
						<h5 class="font-weight-semibold mb-0">38,289 <span class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i> (+16.2%)</span></h5>
						<span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">May 12, 12:30 am</span>
					</div>
				</div>

				<div class="d-flex align-items-center mb-3 mb-sm-0">
					<div id="campaign-status-pie"></div>
					<div class="ml-3">
						<h5 class="font-weight-semibold mb-0">2,458 <span class="text-danger font-size-sm font-weight-normal"><i class="icon-arrow-down12"></i> (-4.9%)</span></h5>
						<span class="badge badge-mark border-danger mr-1"></span> <span class="text-muted">Jun 4, 4:00 am</span>
					</div>
				</div>
				
				<div>
					<a href="{{route('crear-jugador',Crypt::encryptString($equipo->id))}}" class="btn bg-indigo-300"><i class="icon-plus-circle2 mr-2"></i>Crear Jugador</a>
				</div>
				
			</div>

			<div class="table-responsive">
				@if($nomina->count()>0)
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th>Campaign</th>
							<th>Client</th>
							<th>Changes</th>
							<th>Budget</th>
							<th>Status</th>
							<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
						</tr>
					</thead>
					<tbody>
						<tr class="table-active table-border-double">
							<td colspan="5">Activos</td>
							<td class="text-right">
								<span class="progress-meter" id="today-progress" data-progress="30"></span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center">
									<div class="mr-3">
										<a href="#">
											<img src="../../../../global_assets/images/brands/facebook.png" class="rounded-circle" width="32" height="32" alt="">
										</a>
									</div>
									<div>
										<a href="#" class="text-default font-weight-semibold">Nombres</a>
										<div class="text-muted font-size-sm">
											<span class="badge badge-mark border-blue mr-1"></span>
											Edad
										</div>
									</div>
								</div>
							</td>
							<td><span class="text-muted">Email</span></td>
							<td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> localidad</span></td>
							<td><h6 class="font-weight-semibold mb-0">otro</h6></td>
							<td><span class="badge bg-blue">Active</span></td>
							<td class="text-center">
								<div class="list-icons">
									<div class="list-icons-item dropdown">
										<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> Vista previa</a>
											<a href="#" class="dropdown-item"><i class="icon-pencil6"></i> Editar Usuario</a>
											<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
											<div class="dropdown-divider"></div>
											<a href="#" class="dropdown-item"><i class="icon-checkmark3 text-success"></i> Activo</a>
											<a href="#" class="dropdown-item"><i class="icon-cross2 text-danger"></i> Inactivo</a>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<!-- inicio para los inactivos -->
						<tr class="table-active table-border-double">
							<td colspan="5">Inactivos</td>
							<td class="text-right">
								<span class="progress-meter" id="yesterday-progress" data-progress="65"></span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center">
									<div class="mr-3">
										<a href="#">
											<img src="../../../../global_assets/images/brands/bing.png" class="rounded-circle" width="32" height="32" alt="">
										</a>
									</div>
									<div>
										<a href="#" class="text-default font-weight-semibold">Bing campaign</a>
										<div class="text-muted font-size-sm">
											<span class="badge badge-mark border-success mr-1"></span>
											15:00 - 16:00
										</div>
									</div>
								</div>
							</td>
							<td><span class="text-muted">Metrics</span></td>
							<td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> - 5.78%</span></td>
							<td><h6 class="font-weight-semibold mb-0">$970</h6></td>
							<td><span class="badge bg-success-400">Pending</span></td>
							<td class="text-center">
								<div class="list-icons">
									<div class="list-icons-item dropdown">
										<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
											<a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
											<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
											<div class="dropdown-divider"></div>
											<a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
										</div>
									</div>
								</div>
							</td>
						</tr>	
					</tbody>
				</table>
				@else
				<h1>No existen datos</h1>
				@endif


			</div>
		</div>
		<!-- /marketing campaigns -->
	</div>
</div>
<!-- /dashboard content -->
@endsection