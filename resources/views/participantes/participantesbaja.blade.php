@extends('blog.mainblog')
@include('blog.partials.mainmenuusers')
@section('content')
<div class="container">
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Acciones</th>
      </tr>
    </thead>
    @foreach($participantes as $p)
    <tbody>
      <tr>
        <td>{{$p->nombres}}</td>
        <td>{{$p->apellidos}}</td>
        <td>{{$p->ci}}</td>
        <td colspan="3"><a href="{{URL::to('admin/participante/'.$p->id.'/VolverSistema')}}" class="btn btn-info">Regresar al Sistema</a></td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
@stop
