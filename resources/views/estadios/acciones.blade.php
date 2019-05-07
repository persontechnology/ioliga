<div class="list-icons">
@can('update', $estadio)
	<a href="{{route('estadiosEditar',$estadio->id)}}" class="list-icons-item text-primary-600" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Editar Estadio."><i class="icon-pencil7"></i></a>
@endcan

@can('delete', $estadio)
	<button type="button" class="list-icons-item text-danger-600" data-url="{{ route('eliminarEstadio',$estadio->id) }}" data-msj="{{ $estadio->nombre }}" onclick="eliminar(this);" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Eliminar estadio">
		<i class="icon-trash"></i>
	</button>
@endcan
</div>
