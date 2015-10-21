@extends('portada.layout portada')
@include('portada.partials.navcontacto')
@section('content')
<div class="container marginbot-50">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
			<div class="section-heading text-center">
			<h2 class="h-bold" style=" padding-top:60px;">Contactos</h2>
			<div class="divider-header"></div>
			<p>Contactese con nosotros CCbol 2015</p>
			</div>
			</div>
		</div>
	</div>

</div>
<div class="container">

			<div class="row marginbot-80">
				<div class="col-md-8 col-md-offset-2">
						<!--<form id="contact-form" class="wow bounceInUp" data-wow-offset="10" data-wow-delay="0.2s">-->
							{!! Form::open (array('action'=>'ContactoController@contactoenvio','method'=>'POST','role'=>'form',/*'files'=> true*/
																		'id'=>'contact-form','class'=>'wow bounceInUP','data-wow-offset'=>'10','data-wow-delay'=>'0.2s'
							))!!}
						<div class="row marginbot-20">
							<div class="col-md-6 xs-marginbot-20">
								<!--<input type="text" class="form-control input-lg" id="name" placeholder="Enter name" required="required" />-->
								{!!form::input('text','name',Input::old('name'), array('class'=>'form-control input-lg','id'=>'name','placeholder'=>'Ingrese su nombre',))!!}
								<div class="bg-danger">{{$errors->first('name')}}</div>
							</div>
							<div class="col-md-6">
								<!--<input type="email" class="form-control input-lg" id="email" placeholder="Enter email" required="required" />-->
								{!!form::input('email','emailcontacto',Input::old('email'), array('class'=>'form-control input-lg','id'=>'email','placeholder'=>'Ingrese su email',))!!}
								<div class="bg-danger">{{$errors->first('emailcontacto')}}</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
										<!--<input type="text" class="form-control input-lg" id="subject" placeholder="Subject" required="required" />-->
										{!!form::input('text','subject',Input::old('subject'), array('class'=>'form-control input-lg','id'=>'subject','placeholder'=>'Asunto',))!!}
										<div class="bg-danger">{{$errors->first('subject')}}</div>
								</div>
								<div class="form-group">
									<!--<textarea name="message" id="message" class="form-control" rows="4" cols="25" required="required"
										placeholder="Message"></textarea>-->
										{!!form::textarea('msg',Input::old('msg'), array('class'=>'form-control input-lg','id'=>'message','rows'=>'4','cols'=>'25','placeholder'=>'mensaje',))!!}
										<div class="bg-danger">{{$errors->first('msg')}}</div>
								</div>
								<!--<button type="submit" class="btn btn-skin btn-lg btn-block" id="btnContactUs">
									Send Message</button>-->
									{!!form::input('submit',null, 'Enviar' ,array('class'=>'btn btn-primary'))!!}
							</div>
						</div>
					<!--</form>-->
					{!!Form::close()!!}
				</div>
			</div>


		</div>
@stop
