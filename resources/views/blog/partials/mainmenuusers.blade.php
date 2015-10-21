<nav class="navbar navbar-default" role="navigation">
  <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand croidsant text-info" href="{{URL::to('/')}}">CCBOL 2015</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <p class="navbar-text">
        <a class="croidsant text-primary" href="{{URL::to('Bienvenido')}}"><i class="fa fa-dashboard"></i> Admin Panel</a>
      </p>
    </ul>
    <ul class="nav navbar-nav navbar-right">




      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->username}} <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="{{route('nuevousuario')}}"><i class="fa fa-child"></i>&nbsp Crear Usuario</a></li>
          <li><a href="{{route('registrosparticipantes')}}"><i class="fa fa-smile-o"></i>&nbsp Registro Participante</a></li>
          <li><a href="{{route('participantesindex')}}"><i class="fa fa-search"></i>&nbsp Buscar participante</a></li>
          <li><a href="{{route('nuevapublicacion')}}"><i class="fa fa-pencil-square-o"></i>&nbsp Crear Pulicacion</a></li>
          <li><a href="{{URL::to('admin/partipantesbaja')}}"><i class="fa fa-times"></i>&nbsp participantes de baja</a></li>
          <li><a href="{{URL::to('BLOG')}}"><i class="fa fa-commenting"></i>&nbsp blog</a></li>
          <li><a href="{{URL::to('logout')}}"><i class="fa fa-sign-out"></i>&nbsp Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </div>
</nav>
