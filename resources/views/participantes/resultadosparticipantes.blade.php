
<head>
</head>
<body>
  @if(sizeof($participantes) === 0)
     NO EXISTEN PARTICIPANTES EN LA SELECCION
  @else
  <table class="table table-striped table-hover " id="table">
      <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Nick</th>
          <th>C.I.</th>
          <th>Semestre</th>
          <th>Email</th>
          <th>Deposito</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>

          @foreach($participantes as $p)
            <tr>
              <td>{{$p->nombres}}</td>
              <td>{{$p->apellidos}}</td>
              <td>{{$p->nick}}</td>
              <td>{{$p->ci}}</td>
              <td>{{$p->semestre}}</td>
              <td>{{$p->emails}}</td>
                  <td>{{$p->destado}}</td>
              <td width="20%">
								<div class="btn-group-justified">
									@if($p->destado!='No registro la boleta')
                  <a href="{{URL::to('admin/participante/'.$p->id.'/Agreditacion')}}"target="_blank"class="btn btn-info"><i class="fa fa-edit"></i>&nbsp Verificar</a>
								  @endif
                </div>
							</td>
            <tr>
          @endforeach
      </tbody>
  </table>
@endif
</body>
