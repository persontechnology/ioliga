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
	<p><h1>Nómina de jugadores del equipo {{$equipo->nombre}}</h1></p>
	
</center>
<br>
<br>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Foto</th>
			<th>Nombres</th>			
			<th>Email</th>
			<th>Fecha de Nacimiento</th>
			<th>Edad</th>
			<th>Estado</th>		
		</tr>
	</thead>
	@php($t=0)
		
		@if($nomina->count()>0 )
			@foreach($nomina as $nom)
		@php($t++)
		<tr>
			<td>{{$t}}</td>
			<td>
			@if($nom->user->foto)						
			<img class="rounded-circle" width="52" height="52" src="{{ public_path('/storage/usuarios/'.$nom->user->foto) }}" alt="">			
			@else			
			<img  class="rounded-circle" width="52" height="52" alt="">
			
			@endif
			</td>
			<td>				
				{{$nom->user->apellidos .' '. $nom->user->nombres}}</a>
			</td>
			<td>{{$nom->user->email}}</td>
			<td>{{$nom->user->fechaNacimiento}}</td>
			<td>{{Carbon\Carbon::parse($nom->user->fechaNacimiento)->age}} Años</td>
			<td  style="text-align: center;">
				@if($nom->estado   )
					<div class="font-weight-semibold">Activo</div>
				@else
					<div class="font-weight-semibold">Inactivo</div>
				@endif
			</td>
			

		</tr>
	
	@endforeach
	@endif
</table>
</body>
</html>