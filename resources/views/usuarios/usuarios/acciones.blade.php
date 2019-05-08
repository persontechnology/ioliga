
<div class="btn-group btn-group-sm" role="group" aria-label="...">
	@can('actualizar', $user)
		<a class="btn btn-outline-dark" href="{{ route('editarUsuario',$user->id) }}">Actualizar</a>
	@endcan

	@can('eliminar', $user)	
		<button type="button" class="btn btn-outline-dark" data-msj="{{ $user->email }}" data-url="{{ route('eliminarUsuario',$user->id) }}" onclick="eliminar(this);">Eliminar</button>
	@endcan
</div>

