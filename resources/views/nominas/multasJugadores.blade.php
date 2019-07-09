@extends('layouts.app',['titulo'=>'Multas '])

@section('content')

	<!-- Support tickets -->
	<div class="card">
		<div class="card-header header-elements-sm-inline">
			<h6 class="card-title">Juagadores con multas

			<a href="{{route('reporte-multa',$campeonato->id)}}"><i class="icon-file-download icon-2x"></i></a>
			</h6>
			<h6 class="card-title">Costos: Amarillas $0.50 Rojas $1.00</h6>
		</div>

		<div class="table-responsive">
			<table class="table text-nowrap">
				<thead>
					<tr>
						<th style="width: 300px">Fecha</th>
						<th style="width: 300px">Hora</th>
						<th style="width: 300px;">Usuario</th>
						<th style="width: 300px;">Equipo</th>
						<th style="width: 300px;">Amarillas</th>
						<th style="width: 300px;">Rojas</th>
						
						<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
					</tr>
				</thead>
				<tbody>
					@foreach($campeonato->generos as $ger)
					<tr class="table-active table-border-double">
						<td colspan="7">Género: {{$ger->GeneroEquipo->nombre}}</td>
						
					</tr>
					@foreach($ger->GenerosSeries as $gese)
					@foreach($gese->asignaciones as $asi)
					@foreach($asi->asignacionNominas as $asino)
					@foreach($asino->alineaciones as $gers)
					@if($gers->amarillas > 0 || $gers->rojas > 0 )
					<tr>
						<td class="text-center">
							<h6 class="mb-0">{{$gers->partido->fecha->fechaInicio}}</h6>
							<div class="font-size-sm text-muted line-height-1">Fecha</div>
						</td>
						<td class="text-center">
							<h6 class="mb-0">{{$gers->partido->hora}}</h6>
							<div class="font-size-sm text-muted line-height-1">Hora</div>
						</td>
						<td>
							<div class="d-flex align-items-center">
								<div class="mr-3">
									<div class="card-img-actions">
										<a href="{{ Storage::url('public/usuarios/'.$gers->asignacionNomina->unoNomina->user->foto) }}" data-popup="lightbox">
											<img class="rounded-circle" width="52" height="52" src="{{ Storage::url('public/usuarios/'.$gers->asignacionNomina->unoNomina->user->foto) }}" alt="">
											<span class="card-img-actions-overlay card-img">
												<i class="icon-plus3"></i>
											</span>
										</a>
									</div>										
								</div>
								<div>
									<a href="#" class="text-default font-weight-semibold">{{$gers->asignacionNomina->unoNomina->user->apellidos. ' ' . $gers->asignacionNomina->unoNomina->user->nombres}}</a>
									@if($gers->amarillas > 0  )
									<div class="text-muted font-size-sm"><span class="badge badge-mark border-orange-300 mr-1"></span> Amarilla</div>
									@endif
									@if($gers->rojas > 0  )
									<div class="text-muted font-size-sm"><span class="badge badge-mark border-danger mr-1"></span> Roja</div>
									@endif
									
								</div>
							</div>
						</td>
						<td>							
							<div class="font-weight-semibold">{{$gers->asignacionNomina->unoNomina->equipo->nombre}}</div>
								
						</td>
						<td>
						@if($gers->amarillas > 0  )
							<div class="font-weight-semibold">{{$gers->amarillas}}</div>
						@else
							<div class="font-weight-semibold">0</div>
						@endif	
							
						</td>
						<td>
						@if($gers->rojas > 0  )
							<div class="font-weight-semibold">{{$gers->rojas}}</div>
						@else
							<div class="font-weight-semibold">0</div>
						@endif	
							
						</td>
						<td class="text-center">
							@can('Cobrar multa', ioliga\Models\Nomina\Nomina::class)
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										
										<button data-url="{{route('cobrar-multa',[$gers->id,$campeonato->id])}}" onclick="finalizaProceso(this)" class="dropdown-item"><i class="icon-checkmark3 text-success"></i> Cobrar</button>
										
									</div>
								</div>
							</div>
							@endcan
						</td>

					</tr>
					@endif
					@endforeach
					@endforeach
					@endforeach
					@endforeach
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript">
		function finalizaProceso(argument){
	var url=$(argument).data('url');	
    swal({
    html:true,
      title: "¿Estás seguro?",
      text: "De cobrar la multa: <br>",
      type: "info",
      showCancelButton: true,
      confirmButtonClass: "btn-primary",
      confirmButtonText: "¡Sí, Cobrar!",
      closeOnConfirm: false,
      cancelButtonText:"Cancelar",
      cancelButtonClass:"btn-dark"
    },
    function(){
      window.location.replace(url);
    });
}
	</script>

@endsection