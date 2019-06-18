@extends('layouts.app',['titulo'=>'Alineacion'])

@section('breadcrumbs', Breadcrumbs::render('alineacion',$partido))
@section('content')
<div class="card">
	<div class="card-header bg-dark header-elements-inline">
		<h6 class="card-title">Mi Equipo "<b>{{$asignacion->equipos->nombre}}</b>" Partido Entre <b>"{{$partido->asignacioUno->equipos->nombre}}"</b> V.S <b>"{{$partido->asignacioDos->equipos->nombre}}"</b>
		Hora <b>"{{$partido->hora}} "</b>
		</h6>		
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"></a>
        		<a class="list-icons-item" data-action="reload"></a>
        		
        	</div>
    	</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
			@can('Administrar partidos', 'ioliga\Models\Campeonato\Partido::class')
			@if($partido->tipo=="Proceso")
			@if($asistenciaNomina->count()>0)	
			<form action="{{route('crear-alineacion')}}" method="post" enctype="multipart/form-data" id="formIngresoUsuario">
		      @csrf
		      <input type="hidden" name="partido" id="partido" value="{{$partido->id}}">
		      <input type="hidden" name="asignacion" id="asignacion" value="{{$asignacion->id}}">
        	<div class="form-form-group row">
				<label for="nomina" class="col-form-label col-lg-12">Selecione Jugador equipo<span class="text-danger">*</span></label>
				<div class="col-lg-12">
					<select class="form-control select-search @error('nomina') is-invalid @enderror" id="nomina" name="nomina" data-fouc required="" >
					@foreach($asistenciaNomina as $equi)						
						<option value="{{$equi->id}}" {{old('nomina')==$equi->id?'selected':''}}>	
						# {{$equi->numero}} -{{$equi->unoNomina->user->apellidos .' '.$equi->unoNomina->user->nombres}}											
						</option>

					@endforeach	
					</select>
					@if ($errors->has('primerequipo'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('primerequipo') }}</strong>
                      </span>
                  	@endif
				</div>
			</div>
			 <div class="text-center mt-2">
		          <button type="submit" class="btn btn-primary">{{__('Guardar')}} <i class="icon-paperplane ml-2"></i></button>
		      </div>
		  </form>
		  @else
		   <div class="alert alert-warning alert-styled-left alert-dismissible">
		   	<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                No existen jugadores             
            </div>
		  @endif
		  @endif
		  @endcan
			</div>

			<div class="col-sm-12">
				
		@if($alineacion->count()>0)
		
		<!-- Support tickets -->
		<div class="card">
			<div class="card-header header-elements-sm-inline">
				<h6 class="card-title">Lista de jugadores</h6>
			</div>

			<div class="card-body d-md-flex align-items-md-center justify-content-md-between flex-md-wrap">
				<div class="d-flex align-items-center mb-3 mb-md-0">
					<div id="tickets-status"></div>
					<div class="ml-3">
						<h5 class="font-weight-semibold mb-0">8 <span class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i> {{$alineacion->count()}}</span></h5>
						<span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">Jugadores</span>
					</div>
				</div>

				<div class="d-flex align-items-center mb-3 mb-md-0">
					<a href="#" class="btn bg-transparent border-success text-indigo-400 rounded-round border-2 btn-icon">
						<i class="far fa-futbol"></i>
					</a>
					<div class="ml-3">
						<h5 class="font-weight-semibold mb-0">{{$alineacion->sum('goles')}}</h5>
						<span class="text-muted">total goles</span>
					</div>
				</div>
				<div class="d-flex align-items-center mb-3 mb-md-0">
					<a href="#" class="btn bg-transparent border-warning text-warning rounded-round border-2 btn-icon">
						<i class="far fa-file "></i>
					</a>
					<div class="ml-3">
						<h5 class="font-weight-semibold mb-0">{{$alineacion->sum('amarillas')}}</h5>
						<span class="text-muted">total Amarillas</span>
					</div>
				</div>
				<div class="d-flex align-items-center mb-3 mb-md-0">
					<a href="#" class="btn bg-transparent border-danger text-danger rounded-round border-2 btn-icon">
						<i class="far fa-file "></i>
					</a>
					<div class="ml-3">
						<h5 class="font-weight-semibold mb-0">{{$alineacion->sum('rojas')}}</h5>
						<span class="text-muted">total Rojas</span>
					</div>
				</div>

				<div class="d-flex align-items-center mb-3 mb-md-0">
					<a href="#" class="btn bg-transparent border-warning text-indigo-400 rounded-round border-2 btn-icon">
						<i class="icon-collaboration"></i>
					</a>
					<div class="ml-3">
						<h5 class="font-weight-semibold mb-0">0</h5>
						<span class="text-muted">Cambios</span>
					</div>
				</div>
			</div>

			<div class="table-responsive">
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th >#</th>
							<th >Edad</th>
							<th>Nombres</th>
							<th>T. Amarillas</th>
							<th>T. Rojas</th>
							<th>Goles</th>
							<th class="text-center"><i class="icon-arrow-down12"></i></th>
						</tr>
					</thead>
					<tbody>
						<tr class="table-active table-border-double">
							<td colspan="8">Nómina</td>
							
						</tr>
						@foreach($alineacion as $ali)

						<tr>
							<td class="text-center">
								<span class="badge bg-blue-600 badge-pill">{{$ali->asignacionNomina->numero}}</span>
								<div class="font-size-sm text-muted line-height-1">Camiseta</div>
							</td>
							<td class="text-center">
								<h6 class="mb-0">{{Carbon\Carbon::parse($ali->asignacionNomina->unoNomina->user->fechaNacimiento)->age}}</h6>
								<div class="font-size-sm text-muted line-height-1">años</div>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<div class="mr-3">
										<img  src="{{ Storage::url('public/usuarios/'.$ali->asignacionNomina->unoNomina->user->foto) }}" class="rounded-circle" width="50" height="50" alt="">	
									</div>
									<div>
										<a href="#" class="text-default font-weight-semibold letter-icon-title">{{$ali->asignacionNomina->unoNomina->user->apellidos.' '.$ali->asignacionNomina->unoNomina->user->nombres}}</a>
										<div class="text-muted font-size-sm"><span class="badge badge-mark border-{{$ali->rojas>0?'warning':'success'}} mr-1"></span> {{$ali->rojas>0?'Explusado':'Activo'}}</div>
									</div>
								</div>
							</td>
							@if($partido->tipo=="Proceso")
							<form action="{{route('actualizar-alineacion')}}" method="post">
								@csrf
							@endif
							<td>
								<input type="hidden" name="partido" id="partido" value="{{$partido->id}}">
								<input class=" form-control" type="number" min="0" max="2" name="amarillas" value="{{$ali->amarillas}}" >	
							</td>
							<td >
								<input type="hidden" name="alineacion" id="alineacion" value="{{$ali->id}}">
								<input class=" form-control" type="number" min="0" max="1" name="rojas" value="{{$ali->rojas}}" >
							</td>
							<td>
								<input type="hidden" name="asignacion" id="asignacion" value="{{$asignacion->id}}">
								<input class=" form-control" type="number" name="goles" value="{{$ali->goles}}" >
							</td>
							<td>
								@can('Administrar partidos', 'ioliga\Models\Campeonato\Partido::class')
								@if($partido->tipo=="Proceso")
								<div class="btn-group" role="group" aria-label="Basic example">
									<button type="submit" class="btn btn-dark"><i class="icon-database-refresh"></i></button>
									<a data-url="{{ route('alineacion-eliminar',[$ali->id,$asignacion->id]) }}" data-msj="Eliminar Jugador" onclick="eliminar(this);" class="dropdown-item"><i class="fas fa-trash-alt text-danger"></i> </a>
								</div>
								@endif
								@endcan
							</td>
							@if($partido->tipo=="Proceso")
							</form>
							@endif
						</tr>
						@endforeach	

						<tr class="table-active table-border-double">
							<td colspan="7">Cambios</td>
							<td class="text-right">
								<span class="badge bg-danger badge-pill">37</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		@else
		   <div class="alert alert-warning alert-styled-left alert-dismissible">
                No existen alineación             
            </div>
		@endif
			</div>

		</div>

	</div>
</div>
<!-- /content area -->
@prepend('scriptsHeader')

    <script type="text/javascript" src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('global_assets/js/demo_pages/form_select2.js') }}"></script>

@endprepend
<script type="text/javascript">
$( document ).ready(function() {

	$('.select-search').select2({    
	  language: {

	    noResults: function() {

	      return "No existe es equipo";        
	    },
	    searching: function() {

	      return "Buscando..";
	    }
	  }
	})
});	
</script>
@endsection