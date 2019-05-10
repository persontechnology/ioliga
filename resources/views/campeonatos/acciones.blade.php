
<div class="btn-group btn-group-sm" role="group" aria-label="...">
	@can('actualizar', $campeonato)
		<a class="btn btn-outline-dark" href="{{ route('actualizarCampeonato',$campeonato->id) }}">Actualizar</a>
	@endcan

	@can('eliminar', $campeonato)	
		<button type="button" class="btn btn-outline-dark" data-msj="{{ $campeonato->nombre }}" data-url="{{ route('eliminarCampeonato',$campeonato->id) }}" onclick="eliminar(this);">Eliminar</button>
	@endcan
</div>

