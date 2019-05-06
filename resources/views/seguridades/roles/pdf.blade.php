<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Permisos</title>
	<style>
		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		table, th, td {
		  border: 1px solid black;
		}
	</style>
</head>
<body>
	<h2>Permisos en rol: <strong>{{ $rol->name }}</strong></h2>
	
	@if(count($rol->getAllPermissions())>0)
	<table>
	  <tr>
	    <th>#</th>
	    <th>Permisos</th>
	  </tr>
	  @php($i=0)
	  @foreach($rol->getAllPermissions() as $per)
	  @php($i++)
	  <tr>
	    <td>{{ $i }}</td>
	    <td>{{ $per->name }}</td>
	  </tr>
	  @endforeach
	  
	  </tr>
	</table>
	@else
	<p>Rol no tiene permisos</p>
	@endif


</body>
</html>