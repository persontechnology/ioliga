<div class="list-icons">
@can('actualizar', $equipo)
	<a href="{{route('equipo-editar',$equipo->id)}}" class="list-icons-item text-primary-600" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Editar Equipo."><i class="icon-pencil7"></i></a>
@endcan

@can('eliminar', $equipo)
	<button type="button" class="list-icons-item text-danger-600" data-url="{{ route('eliminarEquipo',$equipo->id) }}" data-msj="{{ $equipo->nombre }}" onclick="eliminar(this);" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Eliminar Equipo">
		<i class="icon-trash"></i>
	</button>
@endcan
</div>