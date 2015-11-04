
<head>
</head>
<body>
  @if(sizeof($participantes) === 0)
     NO EXISTEN PARTICIPANTES EN LA SELECCION
  @else
  <div class="row">
  @if(sizeof($data) != 0)
    @foreach($data as $s)
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Resumen </strong> Total = {{$s->cantidad}} Monto Acumulado={{$s->dinero}}
    </div>
    @endforeach
  @endif
  </div>
  <table class="table table-striped table-hover " id="table">
      <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Nick</th>
          <th>C.I.</th>
          <th>Tipo</th>
          <th>Email</th>
          <th>Universidad</th>
          <th>Carrera</th>
          <th>M. D.</th>
          <th>Fecha Dep. </th>
          <th>Estado</th>
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
              <td>{{$p->unombre}}</td>
              <td>{{$p->cnombre}}</td>
              <td>{{$p->monto}}</td>
              <td>{{$p->fechadep}}</td>
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
