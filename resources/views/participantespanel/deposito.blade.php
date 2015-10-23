<form id="registro_deposito" class="form-horizontal" role="form" method="POST" action="{{URL::to('participante/senddeposito')}}" enctype='multipart/form-data'>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-md-15">
                    
                    <hr>
                <div>Deposito</div>
                <hr>
                <div class="form-group">
                  <label class="col-md-4 control-label">Nro. :</label>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="codigo" value="{{ old('codigo') }}" required>
                    <div class="bg-danger">{{$errors->first('codigo')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Monto Depositado</label>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="monto" value="{{ old('monto') }}" required >
                    <div class="bg-danger">{{$errors->first('monto')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Fecha del Deposito "SN SC"</label>
                  <div class="col-md-7">
                    <input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required>
                    <div class="bg-danger">{{$errors->first('fecha')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Hora del Deposito</label>
                  <div class="col-md-7">
                    <input type="time" class="form-control" name="hora" value="{{ old('hora') }}" required>
                      <div class="bg-danger">{{$errors->first('hora')}}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Nombre Completo del depositante</label>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="depositante" value="{{ old('depositante') }}" required placeholder="Juan Perez Gutierrez">
                    <div class="bg-danger">{{$errors->first('depositante')}}</div>
                  </div>
                </div>

                

                <div align="center">
                    <span class="btn btn-primary btn-file">
                    Boleta de Deposito<input type="file" name="boleta" class="form-control" accept="image/*"  onchange="showMyImage(this)">
                    </span>
                    <img id="thumbnil" style="width:40%; margin-top:10px;"  src=""/>
                    <div class="bg-danger">{{$errors->first('boleta')}}</div>
                   </div>                   
                </div>
                <div class="form-group" id="capp">
                  
                    @include("portada.captcha")

                </div>

</div>
<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-piggy-bank"></span>Registrar</button>
</form>