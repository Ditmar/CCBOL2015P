<!DOCTYPE html>
<html ng-app="admin">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/admin.css">
<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/js/zoom.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body ng-controller="MainController">
	<div class="wrapper">
	  <header class="header header-fixed navbar container-fluid">
	      <div class="row">
	          <div class="brand col-sm-3">
	              <a href="#" class="navbar-brand">
	                  <i class="glyphicon glyphicon-heart-empty"></i>
	                  <span class="heading-font"><%title%></span>
	              </a>
	          </div>
	      </div>
	  </header>
		 <div class="box">
      <div class="row">
        
          <!-- sidebar -->
          <div class="column col-sm-3" id="sidebar">
              <p class="nav-title">
                Acciones 
                <a href="#" class="pull-right"><i class="glyphicon glyphicon-folder-open"></i></a>
              </p>
              <ul class="nav">
                  <li ng-repeat="m in menu" ng-class="{active: isCurrentCategory(category)}">
                      <a href="#" ng-click="setLista(m)"> <i class="glyphicon glyphicon-tags"></i> <%m.label%></a>
                  </li>
              </ul>
          </div>

		<div class="column col-sm-9" id="main">
			    <div class="padding">
			        <div class="full col-sm-9">
			          
			            <!-- content -->
			            <h2>
			              Data: <%currentCategory%>
			              <a href="/logout"  class="btn btn-primary btn-xs pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Cerrar Session</a>
			            </h2>
			            <div>
			              <div ng-repeat="item in lista" class="column col-sm-5" id="content">
			              	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			              	<small>Datos Personales</small>
			              	<table class="table table-hover">
			              		<thead>
			              			<tr>
			              				<th>Nombre</th>
			              				<th>Apellido</th>
			              				<th>Ci</th>
			              			</tr>
			              		</thead>
			              		<tbody>
			              			<tr>
			              				<td><%item.nombres%></td>
			              				<td><%item.apellidos%></td>
			              				<td><%item.ci%></td>
			              			</tr>
			              		</tbody>
			              	</table>
			              	<span class="glyphicon glyphicon-education" aria-hidden="true"></span>
			              	<small>Datos Académicos</small>
			              
			              	<table class="table table-hover">
			              		<thead>
			              			<tr>
			              				<th>Universidad</th>
			              				<th>Carrera</th>
			              				<th>Tipo</th>
			              			</tr>
			              		</thead>
			              		<tbody>
			              			<tr>
			              				<td><%item.unombre%></td>
			              				<td><%item.cnombre%></td>
			              				<td><%item.semestre%></td>
			              			</tr>
			              		</tbody>
			              	</table>
			              	<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
			              	<small>Deposito</small>
			              
			              	<table class="table table-hover">
			              		<thead>
			              			<tr>
			              				<th>Codigo</th>
			              				<th>Monto</th>
			              			</tr>
			              		</thead>
			              		<tbody>
			              			<tr ng-repeat="i in item.depo">
			              				<td><%i.codigo%></td>
			              				<td><%i.monto%></td>
			              			</tr>
			              		</tbody>
			              	</table>
			              	<div class="navbar">
			              		<ul class="nav navbar-nav">
			              			<li class="active">
			              				<a href="#" ng-click="editarUsuario(item)"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a>
			              			</li>
			              			<li>
			              				<button ng-if="item.dep" type="button" class="btn btn-primary" ng-mouseleave="leaveimg()" ng-click="validate(item)"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Validar</button>
			              			</li>
			              		</ul>
			              	</div>
			              </div>
			          	</div> 
			        </div><!-- /col-9 -->
			    </div><!-- /padding -->
		</div>
        
      </div>
  </div>
	</div>
	
	<div class="modal fade" id="modal-editar">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><% information.nombres %> <% information.apellidos %></h4>
				</div>
				<div class="modal-body">
					<form action="" method="POST" class="form-horizontal" role="form">
							<div class="form-group">
								<legend>Edicion</legend>
							</div>
							<input type="hidden" ng-model="edit.id">
							<input type="hidden" ng-model="edit.idUs">
							<span class="label">CI</span>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<input type="text" ng-model="edit.ci" name="" id="input" class="form-control" value="" placeholder="ci">
								</div>
							</div>
							<span class="label">EMAIL</span>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<input type="text" ng-model="edit.email" name="" id="input" class="form-control" value="" placeholder="email">
								</div>
							</div>
							<span class="label">PASSWORD</span>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<input type="text" ng-model="edit.password" name="" id="input" class="form-control" value="" placeholder="password">
								</div>
							</div>
					
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<button id="editbtn" type="button" ng-click="editconfirmed(edit)" class="btn btn-primary">Enviar</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3> <%information.nombres%> <%information.apellidos%></h3>
				</div>
				<div class="modal-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>
									id
								</th>
								<th>
									Nombre
								</th>
								<th>
									Apellidos
								</th>
								<th>
									Ci
								</th>
								<th>
									Universidad
								</th>
								<th>
									Carrera
								</th>
								<th>
									Fecha de Registro
								</th>
							</tr>
						</thead>
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <h4>Datos Personales</h4>
						<tbody>
							<tr>
								<td>
									<%information.id%>
								</td>
								<td><%information.nombres%></td>
								<td>
									<%information.apellidos%>
								</td>
								<td>
									<%information.ci%>
								</td>
								<td>
									<%information.unombre%>
								</td>
								<td>
									<%information.cnombre%>
								</td>
								<td>
									<%information.created_at%>
								</td>
							</tr>
						</tbody>
					</table>
					<h4>Depositos</h4>
					<table class="table table">
						<thead>
							<tr>
								<th>
									Id
								</th>
								<th>
									Depositante
								</th>
								<th>
									Fecha Dep.
								</th>
								<th>
									Hora
								</th>
								<th>
									codigo
								</th>
								<th>
									Monto
								</th>
								<th>
									Imagen
								</th>
								
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="de in information.depo">
								<td>
									<%de.id%>
								</td>
								<td>
									<%de.depositante%>
								</td>
								<td>
									<%de.fecha%>
								</td>
								<td>
									<%de.hora%>
								</td>
								<td>
									<%de.codigo%>
								</td>
								<td>
									<%de.monto%>
								</td>
								<td>
									 <img ng-click="imgload(de.id)"  id="zoom<%de.id%>" src="/imgpub/preinscripciones/<%de.imgboleta%>" data-zoom-image="/imgpub/preinscripciones/<%de.imgboleta%>" width="300" class="img-responsive" alt="Image">
								</td>
								
							</tr>
						</tbody>
					</table>
					<div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
							<button id="acreditarbtn"  ng-click="acreditar(information.id)" type="button" class="btn btn-primary">Validar</button>
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
							<button ng-click="observar(information)" type="button" class="btn btn-warning">Observar</button>
						</div>

						
					</div>
					<div class="modal fade" id="modal-ob">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Observación <%information.nombres%> <%information.apellidos%></h4>
								</div>
								<div class="modal-body">
									<% observacion.id %>
									<form  class="form-horizontal" >
											<div class="form-group">
												<legend>Email</legend>
											</div>
											<input type="hidden" ng-model="observacion.id">
											<div class="form-group">
												<div class="col-sm-10 col-sm-offset-2">
													<input type="text" ng-model="observacion.nombre"  id="nombre" class="form-control" >
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-10 col-sm-offset-2">
													<input type="text" ng-model="observacion.email"  id="email" class="form-control"  required="required" pattern="" title="">
												</div>
											</div>
											<textarea name="" id="input" ng-model="observacion.message" class="form-control" rows="3" required="required"></textarea>
									
											<div class="form-group">
												<div class="col-sm-10 col-sm-offset-2">
													<button type="button" ng-click="enviarObservacion(observacion)" class="btn btn-primary">Enviar</button>
												</div>
											</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular-resource.min.js"></script>
	<script src="/js/admin.js"></script>

</body>
</html>