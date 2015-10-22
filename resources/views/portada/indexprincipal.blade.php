@extends('portada.layout portada')
@section('title')@endsection
@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" />
<section id="intro" class="home-slide text-light">

  <!-- Carousel -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
          <img src="img/banner3.png" alt="First slide"/>
                  <!-- Static Headers -->
                  <div class="header-text hidden-xs">
                      <div align="center">
                      <span>
                      @foreach ($errors->all() as $error)
                          {{ $error }}
                      @endforeach
                      </span>
                      </div>
                      <br>
                      <div class="col-md-12 text-center">
                          <h1>
                            <span>CCbol 2015</span>
                          </h1>
                          <!--<br><br><br><br>-->
                          <br>
                          <h3>
                            <span>
                              Solo a 250 Bs. Hasta el 31 de Octubre del 2015
                            </span>

                          </h3>
                          <br>
                          <div class="">
                               <a class="btn btn-theme btn-sm btn-min-block" href="#registro">Registrate Ya</a>
                          </div>
                          <h3>Falta</h3>
                      </div>
                  </div><!-- /header-text -->
        </div>

    </div>
    <!-- Controls -->
    
    <div id="Temporizador"></div>
    <div id="Mediciones">
      <table id="TT">
        <tr>
            <td align="center">Dias</td>
            <td align="center">Hrs</td>
            <td align="center">Min</td>
            <td align="center">Seg</td>
        </tr>
      </table>
    </div>

    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div><!-- /carousel -->

</section>
<!-- /Section: intro -->


  <!-- Navigation -->
  <div id="navigation">
      <nav class="navbar navbar-custom" role="navigation">
                            <div class="container">
                                  <div class="row">
                                        <div class="col-md-2">
                                                 <div class="site-logo-d">
                                                          <a href="{{URL::to('/')}}" class="brand"><img  width="250" src="img/logo.jpg" alt=""> </a>
                                                  </div>
                                        </div>


                                        <div class="col-md-10">

                                                    <!-- Brand and toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                              <i class="fa fa-bars"></i>
                                              </button>
                                        </div>
                                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                                    <div class="collapse navbar-collapse" id="menu">
                                                          <ul class="nav navbar-nav navbar-right">
                                                                <li class="active"><a href="#intro">Home</a></li>
                                                                <li><a href="#instrucciones">Instrucciones</a></li>
                                                                <li><a href="#registro">Registro</a></li>
                                                                <li class="dropdown"><a href="#agenda">Temáticas</a>
                                                                  <ul class="dropdown-menu">
                                                                    <li><a href="#agenda">Agenda</a></li>
                                                                    <li><a href="#service">Tutoriales</a></li>
                                                                    <li><a href="#conferencias">Conferencias</a></li>
                                                                  </ul>
                                                                </li>
                                                                <li><a href="#expositores">Expositores</a></li>
                                                                <li><a href="#contact">Contacto</a></li>
                                                                <li><a href="{{URL::to('BLOG')}}">Blog</a></li>
                                                                @if(Auth::check())
                                                        	       <li class="dropdown">
                                                        	        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->username}} <b class="caret"></b></a>
                                                        	        <ul class="dropdown-menu">
                                                                    <li><a href="{{URL::to('/admin/Bienvenido')}}"><i class="fa fa-cog"></i> &nbsp Cuenta</a></li>
                                                                    <li><a href="{{URL::to('logout')}}"><i class="fa fa-sign-out"></i>&nbsp Logout</a></li>
                                                        	        </ul>
                                                        	      </li>
                                                                @else
                                                                <li><a href="{{route('login')}}" class="text-muted"><i class="fa fa-sign-in"></i>&nbsp Login</a></li>
                                                        	       @endif
                                                          </ul>
                                                    </div>
                                                    <!-- /.Navbar-collapse -->

                                        </div>
                                  </div>
                            </div>
                            <!-- /.containers-->
                      </nav>
  </div>
  <!-- /Navigation -->

  <!-- Section: TEMAS -->
    <section id="instrucciones" class="home-section color-dark bg-gray">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
          <div class="section-heading text-center">
          <h2 class="h-bold">Instrucciones</h2>
          <div class="divider-header"></div>
          <p>Instrucciones de Registro</p>
          </div>
          </div>
        </div>
      </div>

    </div>

    <div class="text-center">
    <div class="container">

        <div class="row">
          <div><textarea id="code" style="width: 100%; visibility:hidden; position:absolute; z-index:-1000;" rows="11">
st=>start: Ingresar a la Página|inicio:>http://www.ccbol2015.com.bo
e=>end: Fin de registro:>http://www.ccbol2015.com.bo
op1=>operation: Paso  1:
Llenar el registro de preinscripción.|operacion
op2=>operation: Paso 2:
Hacer el deposito a la cuenta bancaria
1-6714592, BANCO UNION S.A.|operación
op3=>operation: Paso 3:
Registrar el deposito y enviarlo.|operacion

st->op1->op2->op3->e
        </textarea></div>
        <div id="canvas"></div>
        </div>
    </div>
    </div>
  </section>
<!-- Section: about -->
  <section id="registro" class="home-section color-dark bg-white">
  <div class="container marginbot-50">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
        <div class="section-heading text-center">
        <h2 class="h-bold">Registrate</h2>
        <div class="divider-header"></div>
        <p>Registrate hoy</p>
        </div>
        </div>
      </div>
    </div>

  </div>

  <div class="container">

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
    #portapdf{
    			    width: 500px;
    			    height: 300px;
    			    border: 1px solid #484848;
    			    margin: 0 auto;
    			}
    	</style>
    	<div class="row">
    		<div class="col-md-12">
    			<div class="panel panel-default">
    				<div class="panel-heading">Registro de  Participantes</div>
    				<div class="panel-body">
              @if (count($errors) > 0)
              @if($errors->first('nombres'))
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> Hubo algunos problemas con su entrada.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              @endif
              <!--  Register FORM -->
              <div class="formcontent">
              @if(!$auth)
                @include('portada.registerform')
              @endif
              @if($auth)
                <p>
                  Se ha detectado una session abierta.
                </p>
                <p>
                  Si usted desea registrar una cuenta nueva cierre sesion por este enlace 
                  <a class="btn btn-primary" href="/logout" role="button">Cerrar Sesion</a>
                </p>
              @endif
                <div class="posibleerror">
                  
                </div>
              </div>
    				</div>
    			</div>
    		</div>
    	</div>
  </div>

</section>
<!-- /Section: about -->

<!-- Section: TEMAS -->
  <section id="agenda" class="home-section color-dark bg-gray">
  <div class="container marginbot-50">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
        <div class="section-heading text-center">
        <h2 class="h-bold">Agenda</h2>
        <div class="divider-header"></div>
        <p>Hacia un mundo inteligente. TUTORIALES:</p>
        </div>
        </div>
      </div>
    </div>

  </div>

  <div class="text-center">
  <div class="container">

      <div class="row">

        <div class="list-group">
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">16 Nov. 8:00 - 10:00</h4>
            <p class="list-group-item-text">Acreditación</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">16 Nov. 10:30 - 12:00 Tutorial 1</h4>
            <p class="list-group-item-text">Seguridad en un SmartWorld aplicando mecanismos de defensa en una infraestructura </p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item ">
            <h4 class="list-group-item-heading">16 Nov. 14:30 - 16:00 Tutorial 2</h4>
            <p class="list-group-item-text"> Toma de decisiones autónomas abordo, utilizando visión y protoconciencia artificial.  </p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">16 Nov. 16:30 - 18:00 Tutorial 1</h4>
            <p class="list-group-item-text">Seguridad en un SmartWorld aplicando mecanismos de defensa en una infraestructura </p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">16 Nov. 18:00 - 18:45 Conferencia 1</h4>
            <p class="list-group-item-text">Incidencias de seguridad con casos reales en infraestructuras TI a nivel mundial </p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">17 Nov. 8:30 - 10:00 Tutorial 3</h4>
            <p class="list-group-item-text">Configuración y verificación de IPv6 en Routers virtualizados y PCs</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">17 Nov. 10:30 - 12:00 Tutorial 2</h4>
            <p class="list-group-item-text">Toma de decisiones autónomas abordo, utilizando visión y protoconciencia artificial. </p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">17 Nov. 14:30 - 16:00 Tutorial 1</h4>
            <p class="list-group-item-text">Configuración y verificación de IPv6 en Routers virtualizados y PCs.</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">17 Nov. 16:30 - 17:15 Conferencia 2</h4>
            <p class="list-group-item-text">Drones Pre-conscientes y toma autónoma de decisiones</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">17 Nov. 17:15 - 18:00 Conferencia 2</h4>
            <p class="list-group-item-text">-</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">19 Nov. 8:30 - 10:00 Tutorial 4</h4>
            <p class="list-group-item-text">Computación paralela en procesadores multi-core y many-core</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">19 Nov. 10:30 - 12:00 Conferencia 4</h4>
            <p class="list-group-item-text">Web Components y Polymer</p>
          </a>
        </div>

        <div class="list-group">
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">19 Nov. 14:30 - 16:00 Conferencia 5</h4>
            <p class="list-group-item-text">Infraestructura IT con Software Libre</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">19 Nov. 16:30 - 17:15 Conferencia 6</h4>
            <p class="list-group-item-text"> I+D y emprendimiento: Situm, un GPS de interiores</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">19 Nov. 17:15 - 18:00 Conferencia 7</h4>
            <p class="list-group-item-text">-</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">20 Nov. 8:30 - 10:00 Tutorial 5</h4>
            <p class="list-group-item-text">Computación paralela en procesadores multi-core y many-core</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">20 Nov. 10:30 - 12:00 Tutorial 4</h4>
            <p class="list-group-item-text">Robots a nuestro servicio: la robótica que demanda la sociedad actual</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">20 Nov. 14:30 - 16:00 Tutorial 5</h4>
            <p class="list-group-item-text">Computación paralela en procesadores multi-core y many-core</p>
          </a>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">20 Nov. 16:30 - 17:15 Conferencia 8</h4>
            <p class="list-group-item-text">Cloud Computing (Computación Cloud)</p>
          </a>
        </div>

      </div>
  </div>
  </div>
</section>


<!-- Section: TEMAS -->
  <section id="service" class="home-section color-dark bg-gray">
  <div class="container marginbot-50">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
        <div class="section-heading text-center">
        <h2 class="h-bold">Tutoriales</h2>
        <div class="divider-header"></div>
        </div>
        </div>
      </div>
    </div>

  </div>

  <div class="text-center">
  <div class="container">

      <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-5">
      <div class="wow fadeInLeft" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img  src="img/tema1.jpg" alt="">
             </div>

          </div>
        </div>
        <div class="service-desc">
          <h5>Tutorial 1</h5>
          <p>
            Seguridad en un SmartWorld aplicando mecanismos de defensa en una infraestructura
          </p>
          <p>
            Expositor: Elihu Benedicto Hernández Hernández

          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/mexico.png" alt=""></a>
        </div>
              </div>
      </div>
          </div>
    <div class="col-xs-6 col-sm-3 col-md-6">
      <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img width="340" src="img/tema2.jpg" alt="">
             </div>

          </div>
        </div>
        <div class="service-desc">
          <h5>Tutorial 2</h5>
          <p>
          Tema: Toma de decisiones autónomas abordo, utilizando visión y protoconciencia artificial.
          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/uruguay.png" alt=""></a>
        </div>
              </div>
      </div>
          </div>
    <div class="col-xs-6 col-sm-3 col-md-6">
      <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
            <div class="photo">
             <div>
                  <img width="300" src="img/tema3.jpg" alt="">
             </div>
          </div>
        </div>
        <div class="service-desc">
          <h5>Tutorial 3</h5>
          <p>
            Tema: Configuración y verificación de IPv6 en Routers virtualizados y PCs
          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/argentina.png" alt=""></a>
        </div>
              </div>
      </div>
          </div>
    <div class="col-xs-6 col-sm-3 col-md-6">
      <div class="wow fadeInRight" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img  src="img/tema4.jpg" alt="">
             </div>
          </div>
        </div>
        <div class="service-desc">
          <h5>Tutorial 4</h5>
          <p>
            Tema: Robots a nuestro servicio: la robótica que demanda la sociedad actual
          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/espania.png" alt=""></a>
        </div>
              </div>
      </div>
          </div>
          <div class="col-xs-10 col-sm-5 col-md-6">
      <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img  src="img/tema5.png" alt="">
             </div>
          </div>
        </div>
        <div class="service-desc">
          <h5>Tutorial 5</h5>
          <p>
            Tema: Computación paralela en procesadores multi-core y many-core
          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/paraguay.png" alt=""></a>
        </div>
              </div>
      </div>
          </div>
      </div>
  </div>
  </div>
</section>
<!-- /Section: services -->

<section id="conferencias" class="home-section color-dark bg-gray">
  <div class="container marginbot-50">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
        <div class="section-heading text-center">
        <h2 class="h-bold">Conferencias</h2>
        <div class="divider-header"></div>
        </div>
        </div>
      </div>
    </div>

  </div>

  <div class="text-center">
  <div class="container">

      <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow fadeInLeft" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img  src="img/tema1.jpg" alt="">
             </div>

          </div>
        </div>
        <div class="service-desc">
          <h5>Conferencia 1</h5>
          <p>
            Tema: Incidencias de seguridad con casos reales en infraestructuras TI a nivel mundial
          </p>
          <p>
            Expositor: Elihu Benedicto Hernández Hernández

          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/mexico.png" alt=""></a>
        </div>
              </div>
      </div>
          </div>
    <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img width="340" src="img/confernecia2.jpg" alt="">
             </div>

          </div>
        </div>
        <div class="service-desc">
          <h5>Conferencia 2</h5>
          <p>
            Tema: Drones Pre-conscientes y toma autónoma de decisiones
            Expositor: Eduardo Di Santi

          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/uruguay.png" alt=""></a>
        </div>
              </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img width="340" src="img/tema2.jpg" alt="">
             </div>

          </div>
        </div>
        <div class="service-desc">
          <h5>Conferencia 3</h5>
          <p>
            Tema:



          </p>
          <p>
             Expositor José Daniel Alberto Constan
            Origen: Argentina
          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/Argentina.png" alt=""></a>
        </div>
              </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img width="340" src="img/conferencia4.jpg" alt="">
             </div>

          </div>
        </div>
        <div class="service-desc">
          <h5>Conferencia 4</h5>
          <p>
            Tema: Web Components y Polymer

          </p>
          <p>
            Expositor: Miguel Angel  Alvarez  Sanchez
            Origen: Brasil
          </p>
          <a href="http://www.desarrolloweb.com/" class="btn btn-skin"><img src="img/b/brazil.png" alt=""></a>
        </div>
              </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img width="340" src="img/conferencia5.jpg" alt="">
             </div>

          </div>
        </div>
        <div class="service-desc">
          <h5>Conferencia 5</h5>
          <p>

            Tema: infraestructura IT con Software Libre

          </p>
          <p>
            Expositor: Jared Lopez
            Origen: Bolivia
          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/Bolivia48.png" alt=""></a>
        </div>
              </div>
      </div>
    </div>

    <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img width="340" src="img/confernecia6.png" alt="">
             </div>

          </div>
        </div>
        <div class="service-desc">
          <h5>Conferencia 6</h5>
          <p>
            Tema: I+D y emprendimiento: Situm, un GPS de interiores


          </p>
          <p>
            Expositor: Adrián Canedo Rodríguez
            Origen: España
          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/espania.png" alt=""></a>
        </div>
              </div>
      </div>
    </div>

    <div class="col-xs-6 col-sm-3 col-md-3">
      <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="service-box">
        <div class="service-icon">
          <div class="photo">
             <div>
                  <img width="340" src="img/conferencia8.jpg" alt="">
             </div>

          </div>
        </div>
        <div class="service-desc">
          <h5>Conferencia 8</h5>
          <p>
           Cloud Computing (Computación Cloud)
          </p>
          <p>
            Expositor: M.Sc. Lilien Beatriz Garay Fernández
            Origen: Paraguay
          </p>
          <a href="#" class="btn btn-skin"><img src="img/b/Paraguay.png" alt=""></a>
        </div>
              </div>
      </div>
    </div>


      </div>
  </div>
  </div>
</section>


<!-- Section: works -->
  <section id="expositores" class="home-section color-dark text-center bg-white">
  <div class="container marginbot-50">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
        <div class="section-heading text-center">
        <h2 class="h-bold">Expositores</h2>
        <div class="divider-header"></div>
        </div>
        </div>
      </div>
    </div>

  </div>

  <div class="container">
    <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12" >
        <div class="wow bounceInUp" data-wow-delay="0.4s">
                  <div id="owl-works" class="owl-carousel">
                      
                      <div class="item"><a href="/expositores/1" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/exp/2@2x.jpg"><img src="img/exp/elihu.png" class="img-responsive " alt="img"></a>
                        <a href="#" class="btn btn-skin">Elihu Hernandez</a>
                      </div>
                      <div class="item"><a href="/expositores/2" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/exp/3@2x.jpg"><img src="img/exp/eduardo.png" class="img-responsive " alt="img"></a>
                        <a href="#" class="btn btn-skin">Eduardo Di Santi</a>
                      </div>
                      <div class="item"><a href="/expositores/3" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/exp/4@2x.jpg"><img src="img/exp/costan.png" class="img-responsive " alt="img"></a>
                        <a href="#" class="btn btn-skin">Jose Daniel Alberto Constan</a>
                      </div>
                      <div class="item"><a href="/expositores/4" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/exp/5@2x.jpg"><img src="img/exp/canedo.png" class="img-responsive " alt="img"></a>
                        <a href="#" class="btn btn-skin">Adrian Canedo Rodriguez</a>
                      </div>
                      <div class="item"><a href="/expositores/5" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/exp/6@2x.jpg"><img src="img/exp/lilien.png" class="img-responsive " alt="img"></a>
                        <a href="#" class="btn btn-skin">Lilien Beatriz Garay Fernandez</a>
                      </div>
                      <div class="item"><a href="/expositores/6" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/exp/7@2x.jpg"><img src="img/exp/miguel.png" class="img-responsive " alt="img"></a>
                        <a href="#" class="btn btn-skin">Miguel Angel Alvarez</a>
                      </div>
                      <div class="item"><a href="/expositores/7" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/exp/8@2x.jpg"><img src="img/exp/jared.png" class="img-responsive " alt="img"></a>
                        <a href="#" class="btn btn-skin">Jared Lopez Leaño</a>
                      </div>
                  </div>
        </div>
              </div>
          </div>
  </div>

</section>
<!-- /Section: works -->

<!-- Section: contact -->
  <section id="contact" class="home-section nopadd-bot color-dark bg-gray text-center">
  <div class="container marginbot-50">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
        <div class="section-heading text-center">
        <h2 class="h-bold">Contactos</h2>
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
</section>
<!-- /Section: contact -->


<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">

        <div class="text-center">
          <a href="#intro" class="totop"><i class="fa fa-angle-up fa-3x"></i></a>

          <p>CCOL2015 Potosí - Bolivia Carrera de SISTEMAS e INFORMATICA<br />
          &copy;Copyright 2014 - Shuffle. Designed by <a href="http://bootstraptaste.com">Bootstraptaste</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>
<div>
<?php
foreach($inaguracion as $i) {
  $hour =  $i->hora;
  $minute = $i->minutos;
  $month = $i->mes;
  $day = $i->dia;
  $year = $i->anio;
}
$event = 'La CCbol a Iniciado';

$remaining = date('U', mktime($hour, $minute, 0, $month, $day, $year)) - date('U');
//echo date('U');
$days = floor($remaining / 60 / 60 / 24);
$hours = $remaining / 60 / 60 % 24;
$minutes = $remaining / 60 % 60;
$seconds = $remaining % 60;
?>
<script type="text/javascript">
var days = '<?php echo $days; ?>';
var hours = '<?php echo $hours; ?>';
var minutes = '<?php echo $minutes; ?>';
var seconds = '<?php echo $seconds; ?>';
var finished = false;
function updatecountdown(){
  seconds--;
  if(seconds < 0){
    seconds = 59;
    minutes--;
    if(minutes < 0){
      minutes = 59;
      hours--;
      if(hours < 0){
        hours = 23;
        days--;
        if(days < 0){
          finished = true;
        }
      }
    }
  }

  if(!finished){
    if(days < 10){
    var message = '0'+days + ' : ';
    }
    else{
      message = days + ' : '
    }
    if(hours < 10){
      message += '0'+hours + ' : ';
    }
    else{
      message += hours + ' : ';
    }
    if (minutes < 10) {
      message += '0'+minutes + ' : ';
    }else {
      message += minutes + ' : ';
    }
    if (seconds < 10 ) {
      message += '0'+seconds + '';
    }else {
      message += seconds + '';
    }
    message += '<br>';
    document.getElementById('Temporizador').innerHTML = message;
  }
  else{

    elemento = document.getElementById("Mediciones")
    ocultar= elemento.style.display='none';
    Temporizador = document.getElementById("Temporizador");
    mover= Temporizador.style.left='330px';
    document.getElementById('Temporizador').innerHTML = '<?php echo $event; ?>!';
    clearInterval(theInterval);
  }
}

var theInterval = setInterval("updatecountdown()", 1000);
</script>
<!-- AJAX QUERIES -->
<script>

</script>
</div>
@include('portada.partials.temporizador')
@endsection
@section('js')
<script type="text/javascript">
var setCursor=function(key,idHtml)
  {
    $("#"+idHtml+" option").each(function(index, el) {
      if($(this).val()==key)
      {
        //selected="selected"
        $(this).attr('selected', 'selected');
      }
    });
  }
var loaddata=function(){
   $.ajax({
    url: '/metadata',
    type: 'GET',
    dataType: 'json',
    data: {},
  })
  .done(function(data) {
    console.log(data);
    if(data.succes)
    {
      var ciudad=data.ciudad;
      $('#ciudad').html('');
      $('#ciudad').append($('<option></option>').text('Seleccione un ciudad').val(''));
      $.each(ciudad, function(i) {
        $('#ciudad').append("<option value="+ciudad[i].id+">"+ciudad[i].nombre+"</option>");
      });

      setCursor(data.sessiones.idPais,"pais");
      setCursor(data.sessiones.idCi,"ciudad");
      setCursor(data.sessiones.idUni,"universidad");
      $('#ciudad').select2();
      var carrera=data.carrera;
      $('#carrera').html('');
      $('#carrera').append($('<option></option>').text('Seleccione una carrera').val(''));
      $.each(carrera, function(i) {
        $('#carrera').append("<option value="+carrera[i].id+">"+carrera[i].nombre+"</option>");
      });

      setCursor(data.sessiones.idCa,"carrera");
      $('#carrera').select2();
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}
loaddata();
jQuery(document).ready(function() {
$("#registro-participante").submit(function(){
  var entrydata=$(this).serializeObject();
  $("#btnregister").html("Enviando Registro, Espere porfavor");
  $("#btnregister").attr('disabled', true);
  
  $.ajax({
    url: '/registroparticipante',
    type: 'post',
    dataType: 'json',
    data:entrydata,
  })
  .done(function(html) {
    console.log(html);
    if(html.success==false)
    {
        var errores=html.errors;
        var listerror=Object.keys(errores);
        //console.log(html.catpcha);
        $(".posibleerror").html("<span class='label label-danger'>Existen errores en el formulario</span>");
        var top=$(document).scrollTop();
        window.scrollTo(0,top-400);
        for(var i=0;i<listerror.length;i++)
        {
          $("#"+listerror[i]).html(errores[listerror[i]]);
          if(listerror[i]=="g-recaptcha-response")
          {
            $("#catch").html("Debe resolver el captcha de manera obligada");
          }
        }
        $.ajax({
          url: '/captcha',
          type: 'get',
          dataType: 'html',
          data: {},
        })
        .done(function(html) {
          $("#capp").html(html);
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
        $("#btnregister").html("Registrar Participante");
        $("#btnregister").attr('disabled',false); 
    }else
    {
      var top=$(document).scrollTop();
      window.scrollTo(0,top-550);

      $(".formcontent").html(html.msn);
    }
    
  })
  .fail(function() {
    $(".formcontent").html("Lo sentimos existe un error, estamos trabajando para arreglarlo, intentelo de nuevo más tarde");
  })
  .always(function() {
    console.log("complete");
  });
  //MOdificamos la vista una vez realizada la consulta

  
  return false;
});

//Verificamos si existen datos en el metadato

	//Al iniciar mandamos consultar todos los paises que se mantienen en nuestra base de datos atravez de la ruta paises
	//para paises
	$.getJSON('paises', function( paiss ){
    var pais=paiss.pais;
		//console.log(pais[1].nombre)
		$('#pais').html('');
		$('#pais').append($('<option></option>').text('Seleccione un pais').val(''));
		$.each(pais, function(i) {
			$('#pais').append("<option value="+pais[i].id+">"+pais[i].nombre+"</option>");
		});
    setCursor(paiss.idPais,"pais");
		$('#pais').select2();
	});
//para universidades
	$.getJSON('universidades', function( universidadd ){
    var universidad=universidadd.uni;
		//console.log(pais[1].nombre)
		$('#universidad').html('');
		$('#universidad').append($('<option></option>').text('Seleccione una universidad').val(''));
		$.each(universidad, function(i) {
			$('#universidad').append("<option value="+universidad[i].id+">"+universidad[i].nombre+"</option>");
		});
    setCursor(universidadd.idUni,"universidad");
		$('#universidad').select2();
	});

$("#pais").change( function(event) {

		$.ajax({
			type: 'post',
			url: '/ciudades',
			beforeSend: function (xhr) {
						var token = $('meta[name="csrf_token"]').attr('content');
						if (token) {
									return xhr.setRequestHeader('X-CSRF-TOKEN', token);
						}
				},
			data: 'pais=' + $("#pais option:selected").val(),
		}).done(function ( ciudad ){
			$('#ciudad').html('');
			$('#ciudad').append($('<option></option>').text('Seleccione un ciudad').val(''));
			$.each(ciudad, function(i) {
				$('#ciudad').append("<option value="+ciudad[i].id+">"+ciudad[i].nombre+"</option>");
			});
			$('#ciudad').select2();
		});
	});
//para las carreras de los paises
	$("#universidad").change( function(event) {
		$.ajax({
			type: 'post',
			url: '/carreras',
			beforeSend: function (xhr) {
						var token = $('meta[name="csrf_token"]').attr('content');
						if (token) {
									return xhr.setRequestHeader('X-CSRF-TOKEN', token);
						}
				},
			data: 'universidad=' + $("#universidad option:selected").val(),
		}).done(function ( carrera ){
			//console.log(carrera)
			$('#carrera').html('');
			$('#carrera').append($('<option></option>').text('Seleccione una carrera').val(''));
			$.each(carrera, function(i) {
				$('#carrera').append("<option value="+carrera[i].id+">"+carrera[i].nombre+"</option>");
			});
			$('#carrera').select2();
		});
	});
});
</script>
<script>

            window.onload = function () {
                var btn = document.getElementById("run"),
                    cd = document.getElementById("code"),
                    chart;

                $(document).ready(function() {
                    var code = cd.value;

                    if (chart) {
                      chart.clean();
                    }

                    chart = flowchart.parse(code);
                    chart.drawSVG('canvas', {
                      // 'x': 30,
                      // 'y': 50,
                      'line-width': 3,
                      'line-length': 50,
                      'text-margin': 10,
                      'font-size': 24,
                      'font': 'normal',
                      'font-family': 'Helvetica',
                      'font-weight': 'normal',
                      'font-color': 'black',
                      'line-color': 'black',
                      'element-color': 'black',
                      'fill': 'white',
                      'yes-text': 'yes',
                      'no-text': 'no',
                      'arrow-end': 'block',
                      'scale': 1,
                      'symbols': {
                        'start': {
                          'font-color': 'black',
                          'element-color': 'black',
                          'fill': 'white'
                        },
                        'end':{
                          'class': 'end-element'
                        }
                      },
                      'flowstate' : {
                        'operacion' : {'fill' : 'white','font-size' : 15, 'font-color' : 'black', 'font-weight' : 'bold'},
                      }
                    });

                    $('[id^=sub1]').click(function(){
                      alert('info here');
                    });
                });

            };
        </script>
@stop
