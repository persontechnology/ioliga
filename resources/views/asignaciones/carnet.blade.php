<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<meta charset="utf-8">
<style type="text/css">

.container-fluid{
	width:100%;
	padding-right:.625rem;
	padding-left:.625rem;
	margin-right:auto;
	margin-left:auto
}
table {
  border-collapse: collapse;
  border: 1px solid black;
 
}
table .header{

	padding-left:02rem;

}
p {
	color:black;  
   font-family:Verdana;
  
  }

img {
	float: left;
	border-radius: 1px;

}

</style>
</head>
<body>
	@php($nos=ioliga\Models\Nosotro::first())
	<br>
	<br>
	<br>

		@php($cont=0)
		@foreach($asignacion->asignacionNominas as $asiNO)
		@php($cont++)
		@if($cont%2==1)
		<table style="width: 50%;" align="left" >
			<tbody>
				<tr>
					<th class="header" colspan="2" >
						<p style="text-align: center;font-size: 80%;">
					@if(isset($nos->logo))
				        <img class="card-img" src="{{public_path('/storage/nosotros/'.$nos->logo) }}" alt="" width="50px;" />
				        <b>	"{{$nos->nombre}}"	</b>		         
				      @else
				        <img class="card-img" src="{{asset('vendor/soccer/images/logo-soccer-default-95x126.png') }}" alt="" width="70px;;" />
				      @endif
				      <br>
				      <b>{{$asignacion->unoGeneroSerie->genero->campeonato->nombre}} {{$asignacion->unoGeneroSerie->genero->campeonato->fechaInicio}}
					<br>
						{{$asignacion->unoGeneroSerie->genero->generoEquipo->nombre}}
				        </b>
				      
				      </p>
				      <hr>
					</th>
				</tr>
				<tr>					
					<td class="">					
						
							@if(isset($asiNO->unoNomina->user->foto))
								<img class="card-img" src="{{public_path('/storage/usuarios/'.$asiNO->unoNomina->user->foto) }}" alt=""width="120px;;"  height="150px;" />
							@else
								 <img class="card-img" src="" alt=""width="120px;;"  height="150px;" />
							@endif	     	 
				      
						
					</td>
					<td>
					<b>Apellidos: </b>{{$asiNO->unoNomina->user->apellidos}}<br>
				         <b>Nombres: </b>{{$asiNO->unoNomina->user->nombres}}<br>
				         <b>DNI: </b>{{$asiNO->unoNomina->user->identificacion}}<br>
				         <b>Club: </b>{{$asiNO->unoNomina->equipo->nombre}}<br>
				      	 <b>N° Camiseta: </b>{{$asiNO->numero}}<br>
				      	 <br>
				      	 <b>Firma: </b>---------------------<br>
				     </td>										
				</tr>
			</tbody>					
		</table>
		@else
		<table style="width: 50%;" align="right" >
			<tbody>
				<tr>
					<td class="header" colspan="2" >
						<p style="text-align: center;font-size: 80%;">
						@if(isset($nos->logo))
				        	<img class="card-img" src="{{public_path('/storage/nosotros/'.$nos->logo) }}" alt="" width="50px;" />
				             <b>	"{{$nos->nombre}}"	</b>					         
				      	@else
				        	<img class="card-img" src="{{asset('vendor/soccer/images/logo-soccer-default-95x126.png') }}" alt="" width="45px;" />
				      	@endif
				      <br>
				      <b>{{$asignacion->unoGeneroSerie->genero->campeonato->nombre}} {{$asignacion->unoGeneroSerie->genero->campeonato->fechaInicio}} 
						<br>
						"{{$asignacion->unoGeneroSerie->genero->generoEquipo->nombre}}"
				       </b>
				     </p>
				 				      <hr>
					</td>
				</tr>
				<tr>
					
					<td class="">
				
						@if(isset($asiNO->unoNomina->user->foto))
							<img class="card-img" src="{{public_path('/storage/usuarios/'.$asiNO->unoNomina->user->foto) }}" alt=""width="120px;;"  height="150px;" />
						@else
						 	<img class="card-img" src="" alt=""width="120px;;"  height="150px;" />
						@endif			     

					</td>
					<td>
						 <b>Apellidos: </b>{{$asiNO->unoNomina->user->apellidos}}<br>
				         <b>Nombres: </b>{{$asiNO->unoNomina->user->nombres}}<br>
				         <b>DNI: </b>{{$asiNO->unoNomina->user->identificacion}}<br>
				         <b>Club: </b>{{$asiNO->unoNomina->equipo->nombre}}<br>
				 		 <b>N° Camiseta: </b>{{$asiNO->numero}}<br>
				 		 <br>
				      	 <b>Firma: </b>---------------------<br>
					</td>									
				</tr>
			</tbody>					
		</table>
		@endif					
		@endforeach
</body>
</html>