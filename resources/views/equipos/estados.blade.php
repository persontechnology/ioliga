<select onchange="cambiarEstadoEquipo(this);" class="form-control">
	<option value="{{$equipo->id}}" {{$equipo->estado=='1' ? 'selected' :''}}>Activo</option>
	<option value="{{$equipo->id}}" {{$equipo->estado=='0' ? 'selected' :''}}>Inactivo</option>
</select>