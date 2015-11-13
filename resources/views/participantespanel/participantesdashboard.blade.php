@extends('blog.mainblog')
@include('blog.partials.mainmenuparticipantes')
@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" />
<div class="row">
  <div class="col-md-4">
  	@if(isset($alert))
  		<div class="alert alert-success">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  			<strong>Usuario Actualizado</strong> $alert}}
  		</div>
  	@endif
	  <div class="panel panel-default">
	  	  <div class="panel-heading">
	  			<h3 class="panel-title">Perfil</h3>
	  	  </div>
	  	  <div class="panel-body" id="information">
	  			<table class="table table-condensed table-hover">
	  				<thead>
	  					<tr>
	  						<th>Atributo</th>
	  						<th>Valor</th>
	  					</tr>
	  				</thead>
	  				<tbody>
	  					<tr>
	  						<td>
	  						<p>
	  							Nombres:
	  						</p>
	  						
	  						</td>
	  						<td>{{$participante->nombres}}</td>
	  					</tr>
	  					<tr>
	  						<td>Apellidos:</td>
	  						<td>{{$participante->apellidos}}</td>
	  					</tr>
	  					<tr>
	  						<td>
	  							Email:
	  						</td>
	  						<td>
	  						<!--'ci','semestre','sexo','emails','IdUsAgr','participacion'] -->
	  						{{$participante->emails}}	
	  						</td>
	  					</tr>
	  					<tr>
	  						<td>
	  							Ci:
	  						</td>
	  						<td>
	  							{{$participante->ci}}
	  						</td>
	  					</tr>
	  					<tr>
	  						<td>
	  							Semestre
	  						</td>
	  						<td>
	  							{{$participante->semestre}}
	  						</td>
	  					</tr>
	  					<tr>
	  						<td>
	  							Sexo:
	  						</td>
	  						<td>
	  							{{$participante->sexo}}
	  						</td>
	  					</tr>
	  				</tbody>
	  			</table>
	  			<div class="panel-footer">
				<button type="button" class="btn btn-primary" id="editar"><span class="glyphicon glyphicon-edit"></span> Editar</button>
	  			</div>
	  	  </div>
	  </div>
  </div>
  <div class="col-md-4">
  	<div class="panel panel-default">
	  	  <div class="panel-heading">
	  			<h3 class="panel-title">Registro de Deposito</h3>
	  	  </div>
	  	  <div class="panel-body" id="registro">
	  	  		@if($exist)
		  	  <div class="alert alert-danger">
		  	  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  	  	<strong>Depósito no Registrado!</strong> Usted aún no ha registrado el deposito de su inscripción
		  	  </div>
		  	  @include('participantespanel.deposito')

		  	  @else
		  	  	@if($depo=="proceso")
			  	  <div class="alert alert-warning">
			  	      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  	      <strong>Pago enviado. </strong>La boleta fue enviada correctamente, en este momento se encuentra en proceso de verificación.
			  	  </div>
		  	  	@endif
		  	  	@if($depo=="correcto")
			  	  <div class="alert alert-success">
			  	  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  	  	<strong>Pago Validado </strong> Pago validado correctamente, usted se inscribio correctamente al evento CCBOL2015.
			  	  </div>
		  	  	@endif
		  	  	@if($depo=="observado")
			  	  <div class="alert alert-danger">
			  	  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  	  	<strong>Pago Observado </strong>El pago fue observado los detalles de la observación fuerón enviados  a su correo electronico {{$participante->emails}}, cualquier consulta contactenos escribanos a admccbol2015@gmail.com.
			  	  	<p>
			  	  		<b>Observación</b>	{{$obs}}.
			  	  	</p>
			  	  </div>
			  	  @include('participantespanel.deposito')
		  	  	@endif
		  	  	
		  	  @endif
	  	  </div>
	  </div>
  </div>
  <div class="col-md-4">
  	<div class="panel panel-default">
	  	  <div class="panel-heading">
	  			<h3 class="panel-title">Información</h3>
	  	  </div>
	  	  <div class="panel-body">
	  			Print
	  	  </div>
	  </div>
  </div>
</div>
<script>
var ajaxpeticion=function(url,type,params,callback)
		{
			$.ajax({
				url: url,
				type: type,
				data: params,
			})
			.done(function(htmlresult) {
				console.log("success");
				callback(htmlresult);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
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
function LoadBtnsEvents()
{
	$("#registrar").click(function(event) {
			ajaxpeticion('/participante/deposito','get',{},function(html){
				$("#registro").html(html);
			});
		});
		$("#editar").click(function(event) {
			ajaxpeticion('/participante/vertodo','get',{},function(html){
				//console.log(html);
				$("#information").html(html);
			});
		});
}
	$(document).ready(function($) {
		//information
		LoadBtnsEvents();		
	});
</script>
@endsection