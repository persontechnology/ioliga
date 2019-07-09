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
text-align: center;
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
			<th>Fecha</th>
			<th>Hora</th>
			<th>Nombres</th>
			<th>Equipo</th>
			<th>T. Amarillas</th>
			<th>T. Rojas</th>
		</tr>
	</thead>
	@php($t=0)
	@foreach($campeonato->generos as $ger)
		<tr class="gene">
			<td colspan="7">Género: {{$ger->GeneroEquipo->nombre}}</td>
			
		</tr>
		@foreach($ger->GenerosSeries as $gese)
		@foreach($gese->asignaciones as $asi)
		@foreach($asi->asignacionNominas as $asino)
		
		@foreach($asino->alineaciones as $gers)	
		@if($gers->amarillas > 0 || $gers->rojas > 0 )
		@php($t++)
		<tr>
			<td>{{$t}}</td>
			<td>{{$gers->partido->fecha->fechaInicio}}</td>
			<td>{{$gers->partido->hora}}</td>
			<td>{{$gers->asignacionNomina->unoNomina->user->apellidos. ' ' . $gers->asignacionNomina->unoNomina->user->nombres}}</td>
			<td>{{$gers->asignacionNomina->unoNomina->equipo->nombre}}</td>
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