@extends('blog.mainblog')
@section('title'){{'Contenido de etiqueta | blog CCBOL 2015'}}@endsection
@section('content')
	@include('blog.partials.mainmenuarticulos')
	<div class="container">
		<div class="row-fluid">
			<div class="jumbotron" >
				<h1  class="text-center">Articulos Relacionados<br>
				<small>Blog CCbol 2015</small></h1>
			</div>
		</div>
		<section id="posts">
			<div class="row-fluid">
				<div class="container">
						<div class="col-md-2"></div>
							<!--<form class="navbar-form navbar-left" role="search">
						        <div class="form-group">
						          <input type="text" class="form-control" placeholder="Search" id="Busqueda">
						        </div>
						        <button type="submit" class="btn btn-default">Submit</button>
						    </form>-->
						<div class="col-md-8">
							
							<table class="table table-striped table-hover " style="padding-top:65px;" id="table">
							<tbody>
							@foreach($posts as $p)
								
									<tr>
										<td width="100%">
											<h2 class="text-danger">{{$p->title}}</h2>
											@if($p->created_at === $p->updated_at)
											<h6 class="text-muted">Publicado por: {{$p->username}} el {{$p->created_at}}</h6>
											@else
											<h6 class="text-muted">Publicado por: {{$p->username}} editado el {{$p->created_at}}</h6>
											@endif
										</td>
										<td></td>
									</tr>
								
								
								
									<tr>
										<td width="40%">
											<img src="{{asset('imgpub/'.$p->photo)}}" title="{{$p->title}}" class="img-responsive img-thumbnail"width="350px" height="300px">	
										</td>
										<td width="20%">
											<h4 class="text-justify">
												<?php $contenido = substr($p->content,0,150).'...' ?>	
												{!!$contenido!!}				
											</h4>
											<br>
											<div align="center">
												<h5 class="text-info">Temas Relacionados</h5>
												<?php
												$tags=explode(',', $p->tags)
												?>
												
												@foreach($tags as $t)
													<a href="{{URL::to('tag/'.$t)}}" class="btn btn-info btn-xs">{{$t}}</a>
												@endforeach				
											</div>
											<br>
											<div align="center">
												<a href="{{URL::to('articulos/'.$p->slug)}}" class="btn btn-success btn-lg" style="width:300px;">Leer el Articulo</a>	
											</div>
										</td>
									</tr>
									<tr><td colspan="2"></td></tr>
								@endforeach
								</tbody>
							</table>
						</div>
						<div class="col-md-2"></div>
				</div>
			</div>
		</section>
	</div>
	@include('blog.partials.footer')	
@stop