<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reportes</title>
</head>
<body>

	<br>
	<br>
	<table>
		<tr>
			<th>id</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>
				Codigo Dep.
			</th>
			<th>
				Monto D.
			</th>
			<th>
				FECHA DEP.
			</th>			
		</tr>
	@foreach($p as $item)
		<tr>
			<td>
				{{$item->index}}
			</td>
			<td>
				{{$item->nombres}}
			</td>
			<td>
				{{$item->apellidos}}
			</td>
			<td>
				{{$item->codigo}}
			</td>
			<td>
				{{$item->monto}}
			</td>
			<td>
				{{$item->fecha}}
			</td>
			
		</tr>
	@endforeach
</table>
	TOTAL RECAUDADO={{$Total}}
</body>
</html>