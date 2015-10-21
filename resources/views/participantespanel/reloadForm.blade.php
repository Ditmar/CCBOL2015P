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
				<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Editar</button>
	  			<button type="button" class="btn btn-sm btn-default" id="vertodo"><span class="glyphicon glyphicon-menu-down"></span>Ver todo</button>
	  			</div>