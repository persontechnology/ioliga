
<div class="btn-group btn-group-sm" role="group" aria-label="...">
	@can('update', 'ioliga\User::class')
		<a class="btn btn-outline-dark" href="{{ route('editarUsuario',$user->id) }}">Editar</a>
	@endcan
	@can('delete', 'ioliga\User::class')	
		<button type="button" class="btn btn-outline-dark" data-msj="{{ $user->email }}" data-url="{{ route('eliminarUsuario',$user->id) }}" onclick="eliminar(this);">Eliminar</button>
	@endcan
</div>

