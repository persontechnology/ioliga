@extends('layouts.app',['titulo'=>'Campeonatos'])
@section('breadcrumbs', Breadcrumbs::render('mis-equipos'))
@section('content')

<div class="card">
    <div class="card-body">
      	<!-- Content area -->
			<div class="content">
				<!-- Square thumbs -->
				<div class="mb-3">
					<h6 class="mb-0 font-weight-semibold">
						Equipos Representados Por
						<span class="bg-primary py-1 px-2 rounded"><span class="text-white">{{$usuario->apellidos .' '. $usuario->nombres  }}</span></span> 
					</h6>
					<!-- <span class="text-muted d-block">Basic style using <code>card</code> component</span> -->
				</div>
				<hr>

				<div class="row">		

						<!-- Multiple footers -->
					@if($usuario->equipos)
						@foreach($usuario->equipos as $equipos)
						<div class="col-md-6">
						<div class="card">
							<div class="card-header d-flex justify-content-between {{$equipos->genero->nombre=='Femenino' ? 'bg-danger' :'bg-dark'}}">
								<span class="font-size-sm text-uppercase font-weight-semibold">Nombre: {{$equipos->nombre}}</span>
								<span class="font-size-sm text-uppercase font-weight-semibold">Categoria: {{$equipos->genero->nombre}}</span>
							</div>
						
							@if($equipos->foto)  
							<div class="card-img-actions text-center">
								<img class="" src="{{ Storage::url('public/equipos/'.$equipos->foto) }}"  height="200" alt="">
								<div class="card-img-actions-overlay">
									<a href="{{ Storage::url('public/equipos/'.$equipos->foto) }}" class="btn btn-outline bg-white text-white border-white border-2" data-popup="lightbox">
										Ver
									</a>
									@can('actualizarMiEquipo',$equipos)
									@if($equipos->estado)
									<a data-popup="tooltip" title=""  data-trigger="hover" data-target="#call" data-original-title="Actualizar Perfil de {{$equipos->nombre}}" href="{{route('editar-mi-equipo',Crypt::encryptString($equipos->id))}}" class="btn btn-outline bg-white text-white border-white border-2 ml-2">Detalle
									</a>
									@else
									<a href="#" class="btn btn-outline bg-white text-white border-white border-2 ml-2">Sin Acciones
									</a>
									@endif
									@endcan
								</div>
							</div>							                    
                            	
								<!-- 1_2019-05-13 15:28:00.png -->
                            @else 
                            <div class="card-img-actions text-center">
								<img class="" height="200" src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" alt="">
								<div class="card-img-actions-overlay">
									<a href="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="btn btn-outline bg-white text-white border-white border-2" data-popup="lightbox">
										Ver
									</a>
									@can('actualizarMiEquipo',$equipos)
									@if($equipos->estado)
									<a data-popup="tooltip" title=""  data-trigger="hover" data-target="#call" data-original-title="Actualizar Perfil de {{$equipos->nombre}}" href="{{route('editar-mi-equipo',Crypt::encryptString($equipos->id))}}" class="btn btn-outline bg-white text-white border-white border-2 ml-2">Detalle
									</a>
									@else
									<a href="#" class="btn btn-outline bg-white text-white border-white border-2 ml-2">Sin Acciones
									</a>
									@endif
									@endcan
								</div>
							</div>
                            
                            @endif
							
						
							<div class="card-footer bg-transparent d-flex justify-content-between border-top-0 ">
								<span class="text-muted">{{'Año de creación'.' '.$equipos->anioCreacion}}</span>
								@if($equipos->estado)
								<ul class="list-inline list-inline-condensed mb-0">
									@can('verNominaRepresentante',$equipos)
									<li class="list-inline-item"><a data-popup="tooltip" title=""  data-trigger="hover" data-target="#call" data-original-title="Listado de jugadores {{$equipos->nombre}}" href="{{route('nomina',Crypt::encryptString($equipos->id))}}" class="btn btn-outline bg-dark btn-icon text-dark border-dark border-2 rounded-round legitRipple">
										<i class="icon-user-check"></i></a>
									</li>
									@endcan
									<li class="list-inline-item"><a href="#" class="btn btn-outline bg-info btn-icon text-info border-info border-2 rounded-round legitRipple">
										<i class="icon-twitter"></i></a>
									</li>
									<li class="list-inline-item"><a href="#" class="btn btn-outline bg-grey-800 btn-icon text-grey-800 border-grey-800 border-2 rounded-round legitRipple">
										<i class="icon-github"></i></a>
									</li>
								</ul>
								@else
								<h6 class="mb-0 font-weight-semibold">
								Estado del Equipo
								<span class="bg-warning py-1 px-2 rounded"><span class="text-white">Inactivo</span></span> 
								</h6>
								@endif									
							</div>
							<div class="card-body">
								<h6 class="card-title font-weight-semibold">{{$equipos->nombre}}</h6>
									<p class="card-text">{{$equipos->fraseIdentificacion}}</p>
							</div>
							<div class="card-footer d-flex justify-content-between">
								<a href="#" class="text-default"><i class="icon-bubble2 mr-2"></i> Comment</a>
								<span class="text-muted"><i class="icon-eye mr-2"></i> 673</span>
							</div>
						</div>
						</div>								
						@endforeach

					@else
					  <div class="alert alert-warning alert-styled-left alert-dismissible">
                        No existen equipos que represente                            
                    </div>
					@endif
				</div>
			</div>
			<!-- /content area -->
    </div>
</div>
@endsection