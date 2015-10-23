@extends('blog.mainblog')
@section('id'){{'log'}}@endsection
@section('content')
@include('blog.partials.mainmenuusers')
<style>
option{
  width: 300px;
}

</style>
<meta name="csrf_token" content="{{ csrf_token() }}" />
 <div class="container">
   <h4>Participantes</h4>
   <div class="row">
     <div class="col-xs-10">
        <form class="form-inline">
           <div class="form-group">
           <label><h4>Buscar:</h4></label>
           <input type="text"  class="form-control "id="Busqueda" placeholder="busca en la lista de resultados"/>
        <button type="button" class="btn btn-info">Buscar En la Db</button>
           </div>
        </form>
     </div>
   </div>
   <div class="row">
   <div class="col-xs-3" id="formulario" align="center">
       <div align="center" >

         <input type="submit" id="btnproceso"class="btn btn-primary" value="Participantes en Proceso" >
       </div>
   </div>
   <div class="col-xs-3" id="formulario" align="center">
       <div align="center" >
         <input type="submit" id="btninscritos"class="btn btn-primary" value="Participantes inscritos" >
       </div>
   </div>
   <div class="col-xs-3" id="formulario" align="center">
       <div align="center" >
         <input type="submit" id="btnobservados"class="btn btn-primary" value="Participantes Observados" >
       </div>
   </div>
   <div class="col-xs-3" id="formulario" align="center">
       <div align="center" >
         <input type="submit" id="btntodos"class="btn btn-primary" value="Todos los registrados" >
       </div>
   </div>
 </div>
 <div align="right">
 
</div>
  <div id="resultados"></div>
 </div>
@endsection
@section('js')
<script>
$(document).ready(function(){

    $("#Busqueda").keyup(function(){
        if( $(this).val() != "")
        {

            $("#table tbody>tr").hide();
            $("#table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        }
        else
        {

            $("table tbody>tr").show();
        }
    });
});
$.extend($.expr[":"],
{
    "contains-ci": function(elem, i, match, array)
    {
        return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});
</script>
<script>

$.fn.serializeObject = function()
{
var o = {};
var a = this.serializeArray();
$.each(a, function() {
  if (o[this.name] !== undefined) {
      if (!o[this.name].push) {
          o[this.name] = [o[this.name]];
      }
      o[this.name].push(this.value || '');
  } else {
      o[this.name] = this.value || '';
  }
});
return o;
};
var peticiones=function(url,id,label,load)
{
    $("#"+id).val(load)
    $("#"+id).attr('disabled', true);
    $.ajax({
                url: url,
                type:'get',
                data: {},
                success:function(html)
                {
                  $("#"+id).attr('disabled', false);
                  $("#"+id).val(label)
                  $("#resultados").html(html);
                }
              });

}
$(function() {
    $('#btntodos').click(function(e) {
      e.preventDefault();
        peticiones("registrados/","btntodos","Todos los registrados","Cargando...")
    });
    $('#btnproceso').click(function(e) {
      e.preventDefault();
        peticiones("registradosproceso/","btnproceso","Participantes en Proceso","Cargado...")
    });
    $('#btninscritos').click(function(e) {
      e.preventDefault();
        peticiones("inscritos/","btninscritos","Participantes inscritos","Cargando...")
    });
    $('#btnobservados').click(function(e) {
      e.preventDefault();
        peticiones("observados/","btnobservados","Participantes Observados","Cargado...")
    });
});
</script>
@stop
