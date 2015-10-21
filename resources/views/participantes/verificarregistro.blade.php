@extends('portada.layout portada')
@section('content')
@include('portada.partials.navverificar')
<meta name="csrf_token" content="{{ csrf_token() }}" />
	<br><br>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Verificar su Registro</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{URL::to('confirmacion')}}" enctype='multipart/form-data'>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Cedula de Identidad</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ci" value="{{ old('name') }}" required placeholder='' >
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success">
									Verificar
								</button>
							</div>
						</div>
					</form>
					<div align="center">
						@if($mensaje != 'null')
						@if($mensaje === 'SI')
						<div class="alert alert-dismissible alert-success">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Usted Se encuentra registrado en CCbol 2015</strong>
						</div>
						@else
						<div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>NO se encuentra registrado</strong>
						</div>
						@endif
						@endif
					<div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
