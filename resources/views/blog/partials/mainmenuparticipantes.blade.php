<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand croidsant text-info" href="{{URL::to('/')}}">CCbol 2015</a>

	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-piggy-bank"></span> Registrar  Deposito</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-print"></span>Imprimir </a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-user"></span>{{$user}} <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{URL::to('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>
