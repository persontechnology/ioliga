@extends('layouts.app',['titulo'=>'Vista previa'])


@section('content')

			<!-- Content area -->
			<div class="content">

				<!-- Inner container -->
				<div class="d-md-flex align-items-md-start">

					<!-- Left sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">

							<!-- Navigation -->
							<div class="card">
								<div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
									<div class="card-img-actions d-inline-block mb-3">
											
										<a href="{{ Storage::url('public/usuarios/'.$nomina->user->foto) }}" data-popup="lightbox">
											<img class="rounded-circle" width="170" height="170" src="{{ Storage::url('public/usuarios/'.$nomina->user->foto) }}" alt="">
											<span class="card-img-actions-overlay card-img">
												<i class="icon-plus3"></i>
											</span>
										</a>
									</div>

						    		<h6 class="font-weight-semibold mb-0">{{$nomina->user->apellidos}}</h6>
						    		<span class="d-block opacity-75">{{$nomina->user->nombres	}}</span>

						    	</div>
						
							</div>
							<!-- /navigation -->

						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /left sidebar component -->


					<!-- Right content -->
					<div class="tab-content w-100">
						<div class="tab-pane fade active show" id="profile">

								<!-- Invoices -->
							<div class="row">
								<div class="col-lg-12">
									<div class="card border-left-3 border-left-{{$nomina->estado? 'success':'danger'}} rounded-left-0">
										<div class="card-body">
											<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
												<div>
													<h6 class="font-weight-semibold">Datos Personales</h6>
													<ul class="list list-unstyled mb-0">
														<li>Nombre corto : {{$nomina->user->name}}</li>
														<li>Fecha de Inscripción: <span class="font-weight-semibold">{{$nomina->user->created_at}}</span></li>
														<li>Identificación: <span class="font-weight-semibold">{{$nomina->user->identificacion}}</span></li>
														<li>Teléfono: <span class="font-weight-semibold">{{$nomina->user->telefono}}</span></li>
														<li>Celular: <span class="font-weight-semibold">{{$nomina->user->celular}}</span></li>
														<li>Estado Civil: <span class="font-weight-semibold">{{$nomina->user->estadoCivil}}</span></li>
													</ul>
												</div>

												<div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
													<h6 class="font-weight-semibold">Edad {{Carbon\Carbon::parse($nomina->user->fechaNacimiento)->age}} Años</h6>
													<ul class="list list-unstyled mb-0">
														<li>Estado: <span class="badge bg-{{$nomina->estado? 'success':'danger'}}-400 align-top dropdown-toggle">{{$nomina->estado?'Activo':'Inactivo'}}</span></li>
														
													</ul>
												</div>
											</div>
										</div>

										<div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
											<span>
												<span class="badge badge-mark border-{{$nomina->estado? 'success':'danger'}} mr-2"></span>
												Fecha de Nacimiento:
												<span class="font-weight-semibold">{{$nomina->user->fechaNacimiento}}</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<!-- /invoices -->
					    </div>

					</div>
					<!-- /right content -->

				</div>
				<!-- /inner container -->

			</div>
			<!-- /content area -->

@endsection