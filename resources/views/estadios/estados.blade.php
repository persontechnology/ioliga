	<select onchange="cambiarEstado(this);" class="form-control">
  <option value="{{$estadio->id}}" {{$estadio->estado=='1' ? 'selected' :''}}>Activo</option>
  <option value="{{$estadio->id}}" {{$estadio->estado=='0' ? 'selected' :''}}>Inactivo</option>

</select>
