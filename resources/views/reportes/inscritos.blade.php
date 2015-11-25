<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reportes</title>
	<style type="text/css">
		table tr td {
  margin:0; padding:2;
}
body{
  font:12px Georgia, serif;
}
#resumen
{
	padding:10px;
	font:20px Georgia, serif;
	background-color:#FAF500;	
}
#page-wrap{
  width:600px;
  margin: 10 auto;
}

table{
   border-collapse: collapse; width: 100%;
}

td{
   border:1px solid #ccc; padding:10px;

}
.normal
{
	background-color:#FAF500;
}
.color
{
	background-color:#fff;	
}
thead{
   width:100%;position:fixed;
   height:109px;
   border:1px solid #ccc;
}
	</style>
</head>
<body>
<div id="page-wrap">
		<table>
		<tr>
			<th>id</th>
			<th>CI</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>
				Codigo Dep.
			</th>
			<th>
				Monto D.
			</th>
			<th>
				Codigo Banco
			</th>
			<th>
				Monto B.
			</th>
			<th>
				FECHA DEP.
			</th>			
		</tr>
	@foreach($p as $item)
		<tr class="{{$item->color}}">
			<td>
				{{$item->index}}
			</td>
			<td>
				{{$item->ci}}
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
				{{$item->code}}
			</td>
			<td>
				{{$item->m}}
			</td>
			<td>
				{{$item->fecha}}
			</td>
			
		</tr>
	@endforeach
</table>
<div id="resumen">
	<ul>
		<li>
			Total Inscritos {{$j}}		
		</li>
		<li>
			Total Recaudado {{$Total}}		
		</li>

	</ul>
	 
	
</div>
	
</div>

</body>
</html>