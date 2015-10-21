@extends('blog.mainblog')
@section('title'){{$title.' | Blog CCBOL 2015'}}@endsection
@section('content')
	@include('blog.partials.mainmenuarticulos')
	<div class="row-fluid">
		<div class="container">
			<div class="col-md-2"></div>
			<div class="col-md-8" align="center">
			@foreach($post as $post)
				<img src="../imgpub/{{$post->photo}}" title="{{$post->title}}" width="725px" height="500px">
				<br>
				<h2>{{$post->title}}</h2>
				<h5> publicado por: {{$post->username}}</h5>
				<hr>
				<div align="justify">
					{!!$post->content!!}
				</div>
				<hr>
				<div class="fb-comments" data-href="http://localhost:8000/articulos/{{$post->slug}}" data-width="100%" data-numposts="10"></div>
				<a href="{{URL::to('BLOG?page=1')}}" class="btn btn-success"><i class="fa fa-chevron-left"> </i>&nbsp&nbspInicio</a>
				<br>
			@endforeach
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<br>
	<div id="fb-root"></div>
<script>
		(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  	js = d.createElement(s); js.id = id;
			 	 js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.4";
			  	fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
</script>
	@include('blog.partials.footer')
@stop
