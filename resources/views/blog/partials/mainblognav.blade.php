<nav class="navbar navbar-default hide" role="navigation" id="navi">
  <div class="container">
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
      <p class="navbar-text">
        Potosi - Bolivia
      </p>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="" target="_blank"><i class="fa fa-twitter fa-2x twitter"></i></a></li>
      <li><a href="" target="_blank"><i class="fa fa-facebook-official fa-2x facebook"></i></a></li>
      <li><a href="" target="_blank"><i class="fa fa-youtube-play fa-2x youtube"></i></a></li>
      <!--<li><a href="" target="_blank"><i class="fa fa-vine fa-2x vine"></i></a></li>-->
      <!--<li><a href="" target="_blank"><i class="fa fa-linkedin fa-2x linkedin"></i></a></li>-->
      @if(Auth::check())
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->username}} <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL::to('Bienvenido')}}"><i class="fa fa-cog"></i> &nbsp Cuenta</a></li>
            <li><a href="{{URL::to('logout')}}"><i class="fa fa-sign-out"></i>&nbsp Logout</a></li>
          </ul>
        </li>
      @else
      <li><a href="{{route('login')}}" class="text-muted"><i class="fa fa-sign-in fa-2x"></i>&nbsp Login</a></li>
      @endif
    </ul>
  </div><!-- /.navbar-collapse -->
  </div>
</nav>
