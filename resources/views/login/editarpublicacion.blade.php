@extends('blog.mainblog')
@section('title'){{'Edicion de publicacion | '.$post->title}}@endsection
@section('content')
	@include('blog.partials.mainmenuusers')
	<style>
	.btn-file {
	    position: relative;
	    overflow: hidden;
	}
	.btn-file input[type=file] {
	    position: absolute;
	    top: 0;
	    right: 0;
	    min-width: 100%;
	    min-height: 100%;
	    font-size: 100px;
	    text-align: right;
	    filter: alpha(opacity=0);
	    opacity: 0;
	    outline: none;
	    background: white;
	    cursor: inherit;
	    display: block;
	}
	</style>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center">
				Edita tu publicacion
			</h1>
		</div>
		<div class="container">
			<div class="panel-body">
				@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Hubo algunos problemas con su entrada.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-8">
				{!! Form::open(['url' => 'admin/posts/refresh','autocomplete'=>'on','enctype'=>'multipart/form-data','files' => true])!!}
					<fieldset>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div align="center">
							<img src="../../../imgpub/{{$post->photo}}" width="400px" height="200px" >
						</div>
						<input type="text" name="title" value="{{$post->title}}" class="form-control" >
						<br>
						<textarea name="content" class="form-control" id="editor" cols="10" rows="15">
							{{$post->content}}
						</textarea>
						<br>
						<input type="text" name="tags" value="{{$post->tags}}" class="form-control">
						<br>
						<input type="button" id="revelar" class="btn btn-info" value="¿Actualizar imagen?">
						<script >



						</script>
						<br><br>
						<div id="contenedor" class="hide">
						<span class="btn btn-success btn-file">
						Editar Imagen para Post<input type="file" name="photo" class="form-control" accept="image/*"  onchange="showMyImage(this)">
						</span>
						<img id="thumbnil" style="width:40%; margin-top:10px;"  src=""/>
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
						<br><br>
						</div>
						<input type="submit" value="Actualizar" class="btn btn-block btn-success">
						<input type="hidden"  value="{{$post->id}}" name="rca">
					</fieldset>
				{!! Form::close()!!}
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<br> <br>
	@include('blog.partials.footer')
@endsection
@section('js')
	<script>
		$('#editor').trumbowyg();
	</script>
	<script>
		$(function(){
			var i=0;
			$( "#revelar" ).click(function() {
				i++;
			  	$("#contenedor").removeClass('hide');
			  	if(i==2){
			  		$("#contenedor").addClass('hide');
			  		i=0;
			  	}
			});
		});
	</script>
@stop
