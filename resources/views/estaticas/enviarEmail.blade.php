<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <title>Nuevo Contacto</title>
    
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
            
        table, th, td {
        border: 1px solid black;
        }
        .linea{
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

        <table>
            <tr class="linea">
                <th colspan="2">{{ config('app.name','LIGA') }}</th>
            </tr>
            <tr>
                <th colspan="2">NUEVO CONTACTO DE:</th>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td>{{ $data['nombre'] }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th>Asunto:</th>
                <td>{{ $data['asunto'] }}</td>
            </tr>
            <tr>
                <th colspan="2">Mensaje</th>
            </tr>
            <tr>
                <td colspan="2">
                    {{ $data['mensaje'] }}
                </td>
            </tr>
        </table>

</body>
</html>