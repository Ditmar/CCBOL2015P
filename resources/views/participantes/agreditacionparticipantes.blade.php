@extends('blog.mainblog')
@include('blog.partials.mainmenuusers')
@section('content')
<div class="container">
  @if($participante[0]->destado =='proceso')
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Participante En proceso de acreditación</strong>
    </div>
  @endif
  @if($participante[0]->destado =='correcto')
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Participante Acreditado</strong>
    </div>
  @endif
  @if($participante[0]->destado =='observado')
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>El participante Fue observado</strong>
    </div>
  @endif
  <br><br>
  <table class="table table-condensed">
    @foreach($participante as $p)
    <thead>
      <tr>
        <th colspan="2">Participante: &nbsp {{$p->nombres}} &nbsp {{$p->apellidos}}</th>
        <th>cedula de identidad: {{$p->ci}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Nick: {{$p->nick}}</td>
        <td>Email: {{$p->emails}}</td>
        <td>Sexo: {{$p->sexo}}</td>
      </tr>
      <tr>
        <td>Pais: {{$p -> pais}}</td>
        <td colspan="2">Ciudad: {{$p -> ciudad}}</td>
      </tr>
      <tr>
        <td>Universidad: {{$p->universidad}}</td>
        <td>Carrera: {{$p->carrera}}</td>
        <td>Semestre: {{$p->semestre}}<td>
      </tr>
      <tr>
        <td>Codigo de deposito: {{$p->codigo}} ----- Monto: {{$p->monto}}</td>
        <td rowspan="3" colspan="2">
          <img src="../../../imgpub/preinscripciones/{{$p->imgboleta}}" width="400px" height="200px" >
        </td>
      </tr>
      <tr>
        <td>Depositante: {{$p->depositante}} C.I. : {{$p->ci_depositante}}</td>
      </tr>
      <tr>
        <td>Fecha: {{$p->fecha}} Hora: {{$p->hora}}</td>
      </tr>
      <tr>
        <td>
          <form action="/admin/participante/AgreditarParticipante" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{$p->id}}">
              <button type="submit" id="acreditar" class="btn btn-info">Acreditar</button>
          </form>
        </td>
        <td>
          <form action="/admin/participante/Observar" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{$p->id}}">
              <button type="submit" id="acreditar" class="btn btn-danger">Observar</button>
          </form>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
@stop
