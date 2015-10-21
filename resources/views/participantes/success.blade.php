@extends('portada.layout portada')
@section('content')
@include('portada.partials.navverificar')
<meta name="csrf_token" content="{{ csrf_token() }}" />
	<br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Su preinscripción se ha realizado con éxito</div>
				<div class="panel-body">
				En breve recibirá un correo confirmando sus datos personales.
				</div>
			</div>		
		</div>
	</div>
</div>
@stop