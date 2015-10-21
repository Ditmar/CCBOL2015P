@extends('blog.mainblog')
@section('title'){{'Nueva publicacion | '.\Auth::user()->username}}@endsection
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
				Crear una nueva publicacion
			</h1>
		</div>
		<div class="container">
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

			<div class="col-md-2"></div>
			<div class="col-md-8">
				{!! Form::open(['url' => 'admin/posts/nuevo', 'autocomplete'=>'off', 'enctype'=>'multipart/form-data'])!!}
					<fieldset>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="text" name="title" placeholder="Titulo del Post" class="form-control">
						<br>
						<textarea name="content" class="form-control" id="editor" cols="30" rows="15" placeholder="Contenido" >
						</textarea>
						<br>
						<input type="text" name="tags" placeholder="Etiquetas (Separadas por una coma)"  class="form-control">
						<br>
						<span class="btn btn-primary btn-file">
						Buscar Imagen para Post<input type="file" name="photo" class="form-control" accept="image/*"  onchange="showMyImage(this)">
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
					<!--	<input type="text" name="photo" placeholder="imagen del post"  class="form-control">-->
						<br><br>
						<input type="submit" value="Crear" class="btn btn-block btn-primary">
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
@stop
