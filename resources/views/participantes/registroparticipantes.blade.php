@extends('blog.mainblog')
@section('id'){{'log'}}@endsection
@section('content')
	@include('blog.partials.mainmenuusers')
<meta name="csrf_token" content="{{ csrf_token() }}" />
	<style>
	.btn-file {
			position: relative;
			overflow: hidden;
	}
	.btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			outline: none;
			background: white;
			cursor: inherit;
			display: block;
}
#portapdf{
			    width: 500px;
			    height: 300px;
			    border: 1px solid #484848;
			    margin: 0 auto;
			}
	</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro de  Participantes</div>
							<form class="form-horizontal" role="form" method="POST" action="{{URL::to('registroparticipante')}}" enctype='multipart/form-data'>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombres</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombres" value="{{ old('name') }}" required placeholder='Ej. Juan Pedro' >
								<div class="bg-danger">{{$errors->first('nombres')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Apellidos</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="apellidos" value="{{ old('name') }}" required  placeholder="Ej. Perez Gutierrez">
								<div class="bg-danger">{{$errors->first('apellidos')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nick</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nick" value="{{ old('name') }}" required  placeholder="Tu apodo">
								<div class="bg-danger">{{$errors->first('nick')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Cedula de Identidad</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ci" value="{{ old('name') }}" required >
								<div class="bg-danger">{{$errors->first('ci')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Semestre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="semestre" value="{{ old('name') }}" required placeholder="Ej.Primer Semestre">
								<div class="bg-danger">{{$errors->first('semestre')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">sexo</label>
							<div class="col-md-6">
								<select name="sexo" required class="form-control">
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
								</select>
								<div class="bg-danger">{{$errors->first('sexo')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"  name="emails" value="{{ old('email') }}" required>
								<div class="bg-danger">{{$errors->first('emails')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Pais</label>
							<div class="col-md-6">
								<select class="form-control" id="pais" name="pais" style="width:350px" required></select>
								<div class="bg-danger">{{$errors->first('pais')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Ciudad</label>
							<div class="col-md-6">
								<select class="form-control static" id="ciudad" name="ciudad" style="width:350px" required>
									<option class="" value="">Es necesario seleccionar un pais</option>
								</select>
								<div class="bg-danger">{{$errors->first('ciudad')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Universidad</label>
							<div class="col-md-6">
								<select class="form-control" id="universidad" name="universidad" style="width:350px" required></select>
								<div class="bg-danger">{{$errors->first('universidad')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Carrera</label>
							<div class="col-md-6">
								<select class="form-control" id="carrera" name="carrera" style="width:350px" required>
									<option value="">Es necesario seleccionar una universidad</option>
								</select>
								<div class="bg-danger">{{$errors->first('carrera')}}</div>
							</div>
						</div>

						<hr>
						<div>Deposito</div>
						<hr>
						<div class="form-group">
							<label class="col-md-4 control-label">Codigo de Deposito</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="codigo" value="{{ old('name') }}" required>
								<div class="bg-danger">{{$errors->first('codigo')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Monto Depositado</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="monto" value="{{ old('name') }}" required >
								<div class="bg-danger">{{$errors->first('monto')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Fecha del Deposito</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="fecha" value="{{ old('name') }}" required>
								<div class="bg-danger">{{$errors->first('fecha')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Hora del Deposito</label>
							<div class="col-md-6">
								<input type="time" class="form-control" name="hora" value="{{ old('name') }}" required>
									<div class="bg-danger">{{$errors->first('hora')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre Completo del depositante</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="depositante" value="{{ old('name') }}" required placeholder="Juan Perez Gutierrez">
								<div class="bg-danger">{{$errors->first('depositante')}}</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">C.I. del depositante</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ci_depositante" value="{{ old('name') }}" required>
								<div class="bg-danger">{{$errors->first('ci_depositante')}}</div>
							</div>
						</div>

						<div align="center">
						<span class="btn btn-primary btn-file">
						Boleta de Deposito<input type="file" name="boleta" class="form-control" accept="image/*"  onchange="showMyImage(this)">
						</span>
						<img id="thumbnil" style="width:40%; margin-top:10px;"  src=""/>
						<div class="bg-danger">{{$errors->first('boleta')}}</div>
						<script >
							 function showMyImage(fileInput) {
											var files = fileInput.files;
											for (var i = 0; i < files.length; i++) {
													var file = files[i];
													var imageType = /image.*/;
													if (!file.type.match(imageType)) {
															continue;
													}
													var img=document.getElementById("thumbnil");
													console.log(img)
													img.file = file;
													var reader = new FileReader();
													reader.onload = (function(aImg) {
															return function(e) {
																	aImg.src = e.target.result;
															};
													})(img);
													reader.readAsDataURL(file);
											}
									}
						</script>
						</div>
						<br><br>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! app('captcha')->display(); !!}
								<div class="bg-danger">{{$errors->first('g-recaptcha-response')}}</div>
							</div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success">
									Registrar Participante
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script>
jQuery(document).ready(function() {

	//Al iniciar mandamos consultar todos los paises que se mantienen en nuestra base de datos atravez de la ruta paises
	//para paises

	$.getJSON('paises', function( paiss ){
		var pais=paiss.pais;
		//console.log(pais[1].nombre)
		$('#pais').html('');
		$('#pais').append($('<option></option>').text('Seleccione un pais').val(''));
		$.each(pais, function(i) {
			$('#pais').append("<option value="+pais[i].id+">"+pais[i].nombre+"</option>");
		});
		$('#pais').select2();

	});
//para universidades
	$.getJSON('universidades', function( universidadd ){
		//console.log(pais[1].nombre)
		var universidad=universidadd.uni;
		$('#universidad').html('');
		$('#universidad').append($('<option></option>').text('Seleccione una universidad').val(''));
		$.each(universidad, function(i) {
			$('#universidad').append("<option value="+universidad[i].id+">"+universidad[i].nombre+"</option>");
		});
		$('#universidad').select2();
	});

		//El metodo Change nos permite realizar una acción al momento que estamos interactuando con el elemento con ID pais
		//para sus ciudades del los paises
	$("#pais").change( function(event) {
		$.ajax({
			type: 'post',
			url: '/ciudades',
			beforeSend: function (xhr) {
						var token = $('meta[name="csrf_token"]').attr('content');
						if (token) {
									return xhr.setRequestHeader('X-CSRF-TOKEN', token);
						}
				},
			data: 'pais=' + $("#pais option:selected").val(),
		}).done(function ( ciudad ){
			$('#ciudad').html('');
			$('#ciudad').append($('<option></option>').text('Seleccione un ciudad').val(''));
			$.each(ciudad, function(i) {
				$('#ciudad').append("<option value="+ciudad[i].id+">"+ciudad[i].nombre+"</option>");
			});
			$('#ciudad').select2();
		});
	});
//para las carreras de los paises
	$("#universidad").change( function(event) {
		$.ajax({
			type: 'post',
			url: '/carreras',
			beforeSend: function (xhr) {
						var token = $('meta[name="csrf_token"]').attr('content');
						if (token) {
									return xhr.setRequestHeader('X-CSRF-TOKEN', token);
						}
				},
			data: 'universidad=' + $("#universidad option:selected").val(),
		}).done(function ( carrera ){
			//console.log(carrera)
			$('#carrera').html('');
			$('#carrera').append($('<option></option>').text('Seleccione un ciudad').val(''));
			$.each(carrera, function(i) {
				$('#carrera').append("<option value="+carrera[i].id+">"+carrera[i].nombre+"</option>");
			});
			$('#carrera').select2();
		});
	});
	
	

});
</script>
@stop
