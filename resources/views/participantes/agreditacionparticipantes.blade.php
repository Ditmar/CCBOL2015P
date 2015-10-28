@extends('blog.mainblog')
@include('blog.partials.mainmenuusers')
@section('content')
<script type="text/javascript">
  $(document).ready(function($) {

    

    var form,dialog;
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 450,
      modal: true,
      buttons: {
        "Enviar Observación": function()
        {
          var datos=$("#formdata").serializeObject();
          $.ajax({
            url: '/admin/participante/Observar',
            type: 'post',
            dataType: 'json',
            data: datos,
          })
          .done(function(html) {
              if(html.succes)
              {
                alert("Participante Observado Correctamente");
                dialog.dialog( "close" );
              }else
              {
                alert("Se ha producido algún error");
              }
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
              });
            },
            Cancel: function() {
              dialog.dialog( "close" );
            }
      },
      close: function() {
        //form[ 0 ].reset();
        //allFields.removeClass( "ui-state-error" );
      }
    });
    $("#observarbtn").click(function(event) {
      dialog.dialog( "open" );
      return false;
    });

    
  });
</script>
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
          <button type="submit" id="observarbtn" class="btn btn-danger">Observar</button>
        </td>
      </tr>
    </tbody>
    <div id="dialog-form" title="Mensaje de Observación">
  <p class="validateTips">All form fields are required.</p>
 
  <form id="formdata"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{$p->id}}">
    <input type="hidden" name="nombre" value="{{$p->nombres}}">
    <span class="label label-info">Email</span>
    <input type="text" name="email" id="input"  class="form-control" value="{{$p->emails}}" required="required" pattern="" title="">
    <span class="label label-info">Mensaje</span>
    <textarea name="message" id="input" class="form-control" rows="3" required="required"></textarea>
  </form>
</div>
    @endforeach
  </table>
</div>
@stop



