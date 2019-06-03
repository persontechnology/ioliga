@extends('layouts.app',['titulo'=>'Campeonatos'])
@section('breadcrumbs', Breadcrumbs::render('ver-mis-campeonatos'))

@section('content')
<!-- Task manager table -->
<div class="card">
	<div class="card-header bg-transparent header-elements-inline">
		<h6 class="card-title">Listado de campeonatos</h6>
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"></a>
        		<a class="list-icons-item" data-action="reload"></a> 
        	</div>
    	</div>
	</div>
	@if($campeonato)
	<div class="table-responsive">
	<table class="table ">
		<thead>
			<tr>
				<th></th>
				<th>Fecha Inicio</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Mis Equipos</th>
            
            </tr>
		</thead>
		<tbody>
			@foreach($campeonato as $ca)
			<tr>
				<td>
            		<a href="#"><img src="{{ asset('global_assets/images/copa.png')}}" class="rounded-circle" width="62" height="62" alt=""></a>                	
            	</td>
				<td>
					<div class="media-title font-weight-semibold">{{$ca->fechaFin}}</div>
				</td>
				<td>
					<div class="media-title font-weight-semibold">{{$ca->nombre}}</div>
				</td>
				<td>
						<span class="badge badge-{{$ca->estado ? 'success':'danger'}}">{{$ca->estado ? 'En Proceso':'Finalizado'}}</span>
				</td>
				<td>	

					@foreach($ca->generos as $categ)
						@foreach($categ->asignacionesGenero as $categse)
							@if($categse->equipos->users_id==Auth::user()->id)
								 <ul class="media-list">
								 	<li class="media" >
								 	@if($categse->equipos->foto)
			                            <div class="mr-3">
			                                <a href="{{route('mi-menu-equipo',Crypt::encryptString($categse->id))}}" data-popup="tooltip" title=""  data-trigger="hover"   data-original-title=" Equipo {{$categse->equipos->nombre}}">
			                                    <img src="{{ Storage::url('public/equipos/'.$categse->equipos->foto) }}" class="rounded-circle" width="40" height="40" alt="">
			                                </a>
			                            </div>
			                            @else
			                             <div class="mr-3">
			                                <a href="{{route('mi-menu-equipo',Crypt::encryptString($categse->id))}}" data-popup="tooltip" title=""  data-trigger="hover"   data-original-title=" Equipo {{$categse->equipos->nombre}}">
			                                    <img src="{{ asset('global_assets/images/demo/users/balon.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
			                                </a>
			                            </div>
			                            @endif
			                            <div class="media-body">
			                                <div class="media-title font-weight-semibold">{{$categse->equipos->nombre}}</div>				                               
			                            </div>
								 	</li>
								 </ul>
								@endif
						@endforeach		
					@endforeach

				</td>

            </tr>
            @endforeach
		</tbody>
	</table>
	</div>
	@else
	<h1>No existen Datos</h1>
	@endif

</div>
<!-- /task manager table -->



@prepend('scriptsHeader')

    <link rel="stylesheet" type="text/css" href="{{ asset('plus/DataTables/datatables.min.css') }}"/>
    <script type="text/javascript" src="{{ asset('plus/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    {{-- vendor datatbles --}}
    <script src="{{ asset('global_assets/js/demo_pages/datatables_extension_buttons_html5.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/task_manager_list.js') }}"></script>
@endprepend
		    

  

@endsection