@extends('layouts.app',['titulo'=>'Fechas campornato'])
@section('breadcrumbs', Breadcrumbs::render('fechas-etapa',$etapasSerie))

@section('content')
<div class="card">
	<div class="card-header bg-white header-elements-inline">
		<h6 class="card-title">Fechas de la etapa "<b>{{$etapasSerie->etapa->nombre}}</b>" En la serie <b>"{{$etapasSerie->generoSerie->serie->nombre }}"</b> </h6>
	
		@if($etapasSerie->estado==0 && $etapasSerie->generoSerie->asignacionDes->count()>1)
		<div class="header-elements">
			<button type="button" class="btn bg-indigo-300" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-plus-circle2 mr-2"></i> Crear fecha </button>
			
		</div>
		<!-- crear-fecha -->
		@else
		<div class="alert alert-info alert-styled-left alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
           No puede crear fechas verifique <br>
           * Si tiene mas de un equipo asignado a este campeonato Habilitado <br>
           * Etapa Finalizada             
     	</div>
		@endif
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"></a>
        		<a class="list-icons-item" data-action="reload"></a>
        		
        	</div>
    	</div>
	</div>
	<div class="card-body">
	<div class="row">
	@if($etapasSerie->fechas->count()>0)
	@php($i=0)
	@foreach($etapasSerie->fechasOrdenas as $fechas)
		@php ($i++)
		<div class="col-sm-6 col-xl-4">
			<div class="card card-body bg-blue-400 has-bg-image">
				<div class="media">
					<div class="media-body">
							<a href="{{route('fecha',$fechas->id)}}" class="text-white"><h3 class="mb-0">{{$fechas->nombre}} {{$i}}</h3></a>
						<span class="text-uppercase font-size-xs">{{$fechas->fechaInicio}} <br>{{ Carbon\Carbon::parse($fechas->fechaInicio)->format('Y-m- d D')}}</span>
					</div>

					<div class="ml-3 align-self-center">
						<i class="icon-calendar icon-3x opacity-75"></i>
					</div>
					<div class="list-icons-item dropdown mt-5">
	                 	<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-checkmark text-success"></i> Finalizar</a>
						<a data-url="{{ route('eliminar-fecha',$fechas->id) }}" data-msj="{{ $fechas->nombre.' . $i'}}" onclick="eliminar(this);" class="dropdown-item"><i class="fas fa-trash-alt text-danger"></i> Eliminar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	@endforeach
	@endif
	</div>
	<!-- /simple statistics -->
		
	</div>
</div>
<!-- Primary modal -->
<div id="modal_theme_primary" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h6 class="modal-title">Crear Nueva Fecha de la etapa "<b>{{$etapasSerie->etapa->nombre}}</b>" En la serie <b>"{{$etapasSerie->generoSerie->serie->nombre }}"</b></h6>
				
			</div>

			<div class="modal-body">
			 <h5>Fecha Inicio Del campeonato: <span class="badge bg-blue">{{$etapasSerie->generoSerie->genero->campeonato->fechaInicio }}</span> </h5>
				<h6 class="font-weight-semibold">Fechas ya creadas</h6>	
				@if($etapasSerie->fechas->count()>0)
				@php($j=0)
				@foreach($etapasSerie->fechas as $fec)
				@php($j++)
				<span class="badge bg-indigo-300">{{$fec->nombre .' # '. $j .' ' .$fec->fechaInicio }}</span>
				@endforeach
				@endif			
				<hr>
				<h6 class="font-weight-semibold">Nueva Fecha</h6>
				<form action="{{route('crear-fecha-etapa')}}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="etapa" id="etapa" value="{{$etapasSerie->id}}">				
					<div class="form-group row">
						<label class="col-form-label col-sm-3">Seleccione la fecha</label>
						<div class="col-sm-9">
							<input type="date" name="fecha" id="fecha" required="" min="{{$etapasSerie->generoSerie->genero->campeonato->fechaInicio }}" class="form-control">
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn bg-primary">Crear</button>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
<!-- /primary modal -->
<script type="text/javascript">
	$('#modal').modal({backdrop: 'static', keyboard: false})
/*	function crear(argument) {
    
    var url=$(argument).data('url');
    swal({
    html:true,
      title: "¿Estás seguro?",
      text: "De crear otra fecha: <br>",
      type: "info",
      showCancelButton: true,
      confirmButtonClass: "btn-primary",
      confirmButtonText: "¡Sí, crear!",
      closeOnConfirm: false,
      cancelButtonText:"Cancelar",
      cancelButtonClass:"btn-dark"
    },
    function(){
      window.location.replace(url);
    });
}*/
function crear(arg){

	swal({
	  title: "Comfirmar!",
	  text: "Estas seguro de cambiar de estado al Jugador:",
	  type: "input",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  inputPlaceholder: "Escribe una razón"
	}, function (inputValue) {
	  if (inputValue === false) return false;
	  if (inputValue === "") {
	    swal.showInputError("You need to write something!");
	    return false
	  }
	  
	
	});
}
</script>

@endsection