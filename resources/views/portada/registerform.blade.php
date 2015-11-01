<div class="newformcontent">
<form id="registro-participante" class="registration-form" role="form" method="POST" action="{{URL::to('registroparticipante')}}" enctype='multipart/form-data'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">     
      <ul class="slice_form" id="contentform">
        <li class="step">
          <div class="row">
              
              <h1 class="section-title">
                    <span data-animation="flipInY" data-animation-delay="1300" class="icon-inner"><span class="fa-stack"><i class="fa fa-user fa-stack-1x"></i></span></span>
                    <span data-animation="fadeInRight" data-animation-delay="1400" class="title-inner">Datos Personales</span>
                </h1>

              <div class="form-group">
                <div class="col-sm-6 col-md-3">
                <div class="form-group" data-animation="fadeInUp" data-animation-delay="900">
                  <input type="text" class="form-control" name="nombres" value="{{ old('nombres') }}"  placeholder='Nombres' >
                </div>

                  <div class="bg-danger" id="nombres">{{$errors->first('nombres')}}</div>
                </div>
              </div>  
              <div class="form-group">
                <div class="col-sm-6 col-md-3">
                <div class="form-group" data-animation="fadeInUp" data-animation-delay="800">
                  <input type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}"   placeholder="Apellidos">
                </div>
                  <div class="bg-danger" id="apellidos">{{$errors->first('apellidos')}}</div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                    <div class="form-group" data-animation="fadeInUp" data-animation-delay="500">
                      <select  name="sexo"  class="selectpicker input-price" data-live-search="true" data-width="100%"
                          data-toggle="tooltip" title="Selecione su sexo">
                          <option value="Masculino">Masculino</option>
                          <option value="Femenino">Femenino</option>
                      </select>
                    </div>
                    <div class="bg-danger" id="sexo">{{$errors->first('sexo')}}</div>
                </div>
              <div class="form-group">
              <div class="col-sm-6 col-md-3">
                      <div class="form-group" data-animation="fadeInUp" data-animation-delay="700">
                        <input id="last1" type="text" class="form-control" name="ci" value="{{ old('ci') }}"  placeholder="Cédula de Identidad" >
                        
                      </div>
                        <div class="bg-danger"s id="ci">{{$errors->first('ci')}}</div>
              </div>

            </div>
                
            </div>
        </li>
        <li class="step">
          <div class="row">
          <h1 class="section-title">
                    <span data-animation="flipInY" data-animation-delay="1300" class="icon-inner"><span class="fa-stack"><i class="fa fa-key fa-stack-1x"></i></span></span>
                    <span data-animation="fadeInRight" data-animation-delay="1400" class="title-inner">Cuenta</span>
          </h1>
              <div class="form-group">
                      <div class="col-sm-6 col-md-3">
                      <div class="form-group" data-animation="fadeInUp" data-animation-delay="1200">
                        <input type="text" class="form-control"   name="emails" value="{{ old('emails') }}"  placeholder="Email">
                        
                      </div>
                        <div class="bg-danger" id="emails">{{$errors->first('emails')}}</div>
                      </div>
              </div>
              <div class="form-group">
                <div class="form-group" data-animation="fadeInUp" data-animation-delay="1100">
                  <label class="col-md-2 control-label">Contraseña</label>
                </div>  
                <div class="col-sm-6 col-md-2">
                <div class="form-group" data-animation="fadeInUp" data-animation-delay="1000">
                  <input type="password" class="form-control" id="pass" name="password" value=""   placeholder="password">
                </div>    
                    <div class="bg-danger" id="password">{{$errors->first('password')}}</div>
                </div>
              </div>
                <div class="form-group">
                  <div class="form-group" data-animation="fadeInUp" data-animation-delay="900">
                    <label class="col-md-3 control-label">Repetir contraseña</label>
                  </div>
                  <div class="col-sm-6 col-md-2">
                    
                  <div class="form-group" data-animation="fadeInUp" data-animation-delay="800">
                    <input type="password" class="form-control" id="repass" name="password_confirmation" value=""   placeholder="confirmar">
                  </div>
                    
                    <div class="bg-danger" id="password_confirmation">{{$errors->first('password_confirmation')}}</div>
                  </div>
                </div>
            </div>
        </li>
        <li class="step">
          <div class="row">
              <h1 class="section-title">
                    <span data-animation="flipInY" data-animation-delay="1300" class="icon-inner"><span class="fa-stack"><i class="fa fa-graduation-cap fa-stack-1x"></i></span></span>
                    <span data-animation="fadeInRight" data-animation-delay="1400" class="title-inner">Datos Académicos</span>
          </h1>
              <div class="form-group">

                <div class="col-sm-6 col-md-3">
                    <div class="form-group" data-animation="fadeInUp" data-animation-delay="600">
                      <select name="semestre"  class="selectpicker input-price" data-live-search="true" data-width="100%">
                            <option value="profesional">Profesional</option>
                            <option value="estudiante">Estudiante</option>
                      </select>
                    </div>  
                    <div class="bg-danger" id="semestre">{{$errors->first('semestre')}}</div>
                </div>
              </div>
              <div class="form-group">
                
              </div>
                <div class="form-group">
                  <div class="col-md-3">
                    <div class="form-group" data-animation="fadeInUp" data-animation-delay="400">
                      <select class="selectpicker input-price" id="universidad1" name="universidad" data-width="100%" data-live-search="true" data-toggle="tooltip" title="Selecione su tipo de inscripcion">
                      <option value="">
                        Universidad 
                      </option>
                      </select>  
                    </div>
                    
                    <div class="bg-danger" id="universidad">{{$errors->first('universidad')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-3">
                  <div class="form-group" data-animation="fadeInUp" data-animation-delay="300">
                      <select class="selectpicker input-price" id="carrera1" name="carrera" data-width="100%" data-live-search="true" data-toggle="tooltip" title="Selecione su tipo de inscripcion">
                        <option value="">Carrera</option>
                      </select>
                  </div>  
                    
                    <div class="bg-danger" id="carrera">{{$errors->first('carrera')}}</div>
                  </div>
                </div>
                <div class="form-group" data-animation="fadeInUp" data-animation-delay="200">
                  <div class="col-md-3">
                    <div id="capp">
                      @include("portada.captcha")
                    </div>
                  </div>
                </div>
            </div>
        </li>
      </ul>
      <ul class="navform">
        <li id="d1">Datos Personales <i class="fa fa-arrow-circle-right"></i></li>
        <li id="d2">Cuenta <i class="fa fa-arrow-circle-right"></i></li>
        <li id="d3">Datos Académicos <i class="fa fa-arrow-circle-right"></i></li>
      </ul>
      <br/>
      <br/>
      <div class="col-md-12 overflowed">
                            <div class="text-center margin-top">
                                <button
                                        data-animation="flipInY" data-animation-delay="100"
                                        class="btn btn-theme btn-theme-xl submit-button" id="sendbutton" type="submit"
                                        > Inscr&iacute;bete <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
</form> 
</div>
