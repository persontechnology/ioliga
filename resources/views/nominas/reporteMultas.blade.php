<!DOCTYPE html>
<html>
<head>

	<title>Multas</title>
	  <meta charset="utf-8">
<style type="text/css">
table {
border-collapse: collapse;
width: 100%;
}

table, th, td {
border: 1px solid black;
text-align: left;
}

.gene {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<center>
	<p><h1>Jugadores con multas</h1></p>
	<p>Costo Amarillas $0.50 y Rojas $1.00</p>
</center>
<br>
<br>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Foto</th>
			<th>Nombres</th>
			<th>Equipo</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>T. Amarillas</th>
			<th>T. Rojas</th>
			<th>Cobrar</th>
		</tr>
	</thead>
	@php($t=0)
	@foreach($campeonato->generos as $ger)
		<tr class="gene">
			<td colspan="9">Género: {{$ger->GeneroEquipo->nombre}}</td>
			
		</tr>
		@foreach($ger->GenerosSeries as $gese)
		@foreach($gese->asignaciones as $asi)
		@foreach($asi->asignacionNominas as $asino)
		
		@foreach($asino->alineaciones as $gers)	
		@if($gers->amarillas > 0 || $gers->rojas > 0 )
		@php($t++)
		<tr>
			<td>{{$t}}</td>
			<td>
				<img class="card-img" src="{{public_path('/storage/usuarios/'.$gers->asignacionNomina->unoNomina->user->foto) }}
								         " alt="" width="45px" />
			</td>
			<td>				
				{{$gers->asignacionNomina->unoNomina->user->apellidos. ' ' . $gers->asignacionNomina->unoNomina->user->nombres}}
			</td>
			<td>{{$gers->asignacionNomina->unoNomina->equipo->nombre}}</td>
			<td>{{$gers->partido->fecha->fechaInicio}}</td>
			<td>{{$gers->partido->hora}}</td>
			<td  style="text-align: center;">
				@if($gers->amarillas > 0  )
					<div class="font-weight-semibold">{{$gers->amarillas}}</div>
				@else
					<div class="font-weight-semibold">0</div>
				@endif
			</td>
			<td style="text-align: center;">
			@if($gers->rojas > 0  )
				<div class="font-weight-semibold">{{$gers->rojas}}</div>
			@else
				<div class="font-weight-semibold">0</div>
			@endif	
			</td>
			<td></td>

		</tr>
	@endif
	@endforeach
	@endforeach
	@endforeach
	@endforeach
	@endforeach
</table>
</body>
</html>