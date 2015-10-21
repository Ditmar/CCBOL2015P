<form id="registro-participante" class="form-horizontal" role="form" method="POST" action="{{URL::to('registroparticipante')}}" enctype='multipart/form-data'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                  <label class="col-md-4 control-label">Nombres</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="nombres" value="{{ old('nombres') }}" required placeholder='Ej. Juan Pedro' >
                    <div class="bg-danger" id="nombres">{{$errors->first('nombres')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Apellidos</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" required  placeholder="Ej. Perez Gutierrez">
                    <div class="bg-danger" id="apellidos">{{$errors->first('apellidos')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nick</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="nick" value="{{ old('nick') }}" required  placeholder="Tu apodo">
                    <div class="bg-danger" id="nick">{{$errors->first('nick')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Password</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control" name="password" value="" required  placeholder="password">
                    <div class="bg-danger" id="password">{{$errors->first('password')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Re. Password</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation" value="" required  placeholder="confirmar">
                    <div class="bg-danger" id="password_confirmation">{{$errors->first('password_confirmation')}}</div>
                  </div>
                </div>


                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-md-4 control-label">Cedula de Identidad</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="ci" value="{{ old('ci') }}" required >
                        <div class="bg-danger" id="ci">{{$errors->first('ci')}}</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Usted es:</label>
                      <div class="col-md-6">
                        <select name="semestre" required class="form-control">
                            <option value="profesional">Profesional</option>
                            <option value="estudiante">Estudiante</option>
                        </select>
                        <div class="bg-danger" id="semestre">{{$errors->first('semestre')}}</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">sexo</label>
                      <div class="col-md-6">
                        <select name="sexo" required class="form-control">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                          <div class="bg-danger" id="sexo">{{$errors->first('sexo')}}</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">E-Mail Address</label>
                      <div class="col-md-6">
                        <input type="email" class="form-control" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"  name="emails" value="{{ old('emails') }}" required>
                        <div class="bg-danger" id="emails">{{$errors->first('emails')}}</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <label class="col-md-4 control-label">Pais</label>
                  <div class="col-md-6">
                    <select class="form-control" id="pais" name="pais" style="width:350px"></select>
                    <div class="bg-danger" id="pais">{{$errors->first('pais')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Ciudad</label>
                  <div class="col-md-6">
                    <select class="form-control static" id="ciudad" name="ciudad" style="width:350px">
                      <option class="" value="">Es necesario seleccionar un pais</option>
                    </select>
                    <div class="bg-danger" id="ciudad">{{$errors->first('ciudad')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Universidad</label>
                  <div class="col-md-6">
                    <select class="form-control" id="universidad" name="universidad" style="width:350px"></select>
                    <div class="bg-danger" id="universidad">{{$errors->first('universidad')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Carrera</label>
                  <div class="col-md-6">
                    <select class="form-control" id="carrera" name="carrera" style="width:350px">
                      <option value="">Es necesario seleccionar una universidad</option>
                    </select>
                    <div class="bg-danger" id="carrera">{{$errors->first('carrera')}}</div>
                  </div>
                </div>
                  </div>
                  <!---

                   -->


                <script >
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
                </script>
                </div>
                <br><br>
                <br><br>
                <div class="form-group" id="capp">
                  
                    @include("portada.captcha")

                </div>
                <br>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-success" id="btnregister">
                      Registrar Participante
                    </button>
                  </div>
                </div>
              </form>