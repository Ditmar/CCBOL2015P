<form id="updateparticipante" class="form-horizontal" role="form" method="POST" action="{{URL::to('/participante/updateparticipante')}}" enctype='multipart/form-data'>
    						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="form-group">
                  <label class="col-md-4 control-label">Nombres</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="nombres" value=" {{$perfil->nombres}}" required placeholder='Ej. Juan Pedro' >
                    <div class="bg-danger">{{$errors->first('nombres')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Apellidos</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="apellidos" value="{{ $perfil->apellidos}}" required  placeholder="Ej. Perez Gutierrez">
                    <div class="bg-danger">{{$errors->first('apellidos')}}</div>
                  </div>
                </div>

                    
                    <div class="form-group">
                      @if($perfil->semestre=="Profesional")
                      <label class="col-md-4 control-label">Titulo, Ing. Lic.</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="semestre" value="{{$perfil->semestre}}" required placeholder="Ing. Lic.">
                        <div class="bg-danger">{{$errors->first('semestre')}}</div>
                      </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">sexo</label>
                      <div class="col-md-6">
                        <select name="sexo" i="sexo" required class="form-control">
                            <option value="Masculino" >Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                          <div class="bg-danger">{{$errors->first('sexo')}}</div>
                      </div>
                    </div>
                    
                </div>
    						
                <div class="row">
        					<div class="col-md-6">
                  <div class="form-group">
                  <label class="col-md-4 control-label">Pais</label>
                  <div class="col-md-6">
                    <select class="form-control" id="pais" name="pais" style="width:300px" required>
                      @foreach($paises as $p)
                        <option value="{{$p->id}}">{{$p->nombre}}</option>
                      @endforeach
                    </select>
                    <div class="bg-danger">{{$errors->first('pais')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Ciudad</label>
                  <div class="col-md-5">
                    <select class="form-control static" id="ciudad" name="ciudad" style="width:300px" required>
                      <option class="" value="">Es necesario seleccionar un pais</option>
                      @foreach($ciudad as $p)
                        <option value="{{$p->id}}">{{$p->nombre}}</option>
                      @endforeach
                    </select>
                    <div class="bg-danger">{{$errors->first('ciudad')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Universidad</label>
                  <div class="col-md-6">
                    <select class="form-control" id="universidad" name="universidad" style="width:300px" required>
                      @foreach($universidad as $uni)
                        <option value="{{$uni->id}}">
                          {{$uni->nombre}}
                        </option>
                      @endforeach
                    </select>
                    <div class="bg-danger">{{$errors->first('universidad')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Carrera</label>
                  <div class="col-md-6">
                    <select class="form-control" id="carrera" name="carrera" style="width:300px" required>
                      <option value="">Es necesario seleccionar una universidad</option>
                      @foreach($carrera as $ca)
                        <option value="{{$ca->id}}">
                          {{$ca->nombre}}
                        </option>
                      @endforeach
                    </select>
                    <div class="bg-danger">{{$errors->first('carrera')}}</div>
                  </div>
                </div>
                  </div>
                  
    						</div>
    						<br><br>
                <br><br>
    						<div class="form-group">
    							<div class="col-md-6 col-md-offset-4">
    								{!! app('captcha')->display(); !!}
                    <div class="bg-danger">{{$errors->first('g-recaptcha-response')}}</div>
                  </div>
                </div>
    						<br>
    						<div class="form-group">
                <a class="btn btn-default" id="closeupdate" href="#" role="button">Cerrar</a>  
    							<div class="col-md-6 col-md-offset-4">
    								<button type="submit" class="btn btn-success">
    									Actualizar Participante
    								</button>

    							</div>
    						</div>
    					</form>
<input type="hidden" value="{{$perfil->idPais}}" id="paisname">
<input type="hidden" value="{{$perfil->idCi}}" id="ciudadname">
<input type="hidden" value="{{$perfil->idUni}}" id="uniname">
<input type="hidden" value="{{$perfil->idCa}}" id="carreraname">
<input type="hidden" value="{{$perfil->sexo}}" id="csex">
  <script>
  var setCursor=function(key,idHtml)
  {
    $("#"+idHtml+" option").each(function(index, el) {
      if($(this).val()==key)
      {
        //selected="selected"
        $(this).attr('selected', 'selected');
      } 
    });
  }
  var loadForm=function()
  {
    ajaxpeticion('/participante/reloadForm','get',{},function(html){
        
          $("#information").html(html);
          LoadBtnsEvents();  
      });
  }
  //$("#pais").select2();
  var sexo=$("#csex").val();
  var pais=$("#paisname").val();
  var ciudad=$("#ciudadname").val();
  var uni=$("#uniname").val();
  var carrera=$("#carreraname").val();
  setCursor(sexo,"sexo");
  setCursor(pais,"pais");
  $("#pais").select2();
  //alert(ciudad)
  setCursor(ciudad,"ciudad");
  $("#ciudad").select2();
  setCursor(uni,"universidad");
  $("#universidad").select2();
  setCursor(carrera,"carrera");
  $("#carrera").select2();
//Formulario
$("#updateparticipante").submit(function(event) {
  var data=$(this).serializeObject();
  //console.log(data);
  ajaxpeticion('/participante/updateparticipante','post',data,function(html){
        console.log(html);
        if(html=="true")
        {
            loadForm();
            //reload Web
            //location.reload(true);
        }else{
          $("#information").html(html);  
        }
        
      });
  return false;
});
$("#closeupdate").click(function(event) {
  event.preventDefault();
  loadForm();
});
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
      $('#carrera').append($('<option></option>').text('Seleccione una carrera').val(''));
      $.each(carrera, function(i) {
        $('#carrera').append("<option value="+carrera[i].id+">"+carrera[i].nombre+"</option>");
      });
      $('#carrera').select2();
    });
  });
</script>