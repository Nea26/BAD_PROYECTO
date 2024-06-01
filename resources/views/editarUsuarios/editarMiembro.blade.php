<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Miembro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="{{ asset('assets/icons/book.ico') }}" />
    <script src="{{ asset('js/sweet-alert.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/sweet-alert.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet">
    <script>window.jQuery || document.write('<script src="{{ asset('js/jquery-1.11.2.min.js') }}"><\/script>')</script>
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile nav-lateral-scroll">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button"
                    style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i>
                Sistema Bibliotecario
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset" style="padding: 10px 0; color:#fff;">
                <figure>
                    <img src="{{asset('assets/img/logo.png')}}" alt="Biblioteca" class="img-responsive center-box"
                        style="width:55%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;">Sistema Bibliotecario</p>
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="home.html"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="institution.html"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp;
                                    Datos institución</a></li>
                            <li><a href="provider.html"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo
                                    proveedor</a></li>
                            <li><a href="category.html"><i
                                        class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva
                                    categoría</a></li>
                            <li><a href="section.html"><i
                                        class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva
                                    sección</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Registro de usuarios <i
                                class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="admin.html"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo
                                    administrador</a></li>
                            <li><a href="teacher.html"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo
                                    docente</a></li>
                            <li><a href="student.html"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo
                                    estudiante</a></li>
                            <li><a href="personal.html"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp;
                                    Nuevo personal administrativo</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Libros y catálogo <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="book.html"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo
                                    libro</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp;
                                    Catálogo</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Préstamos y reservaciones <i
                                class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="loan.html"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; Todos los
                                    préstamos</a></li>
                            <li>
                                <a href="loanpending.html"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp;
                                    Devoluciones pendientes <span
                                        class="label label-danger pull-right label-mhover">7</span></a>
                            </li>
                            <li>
                                <a href="loanreservation.html"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp;
                                    Reservaciones <span class="label label-danger pull-right label-mhover">7</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="report.html"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y
                            estadísticas</a></li>
                    <li><a href="advancesettings.html"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Configuraciones avanzadas</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <figure>
                    <img src="{{asset('assets/img/user01.png')}}" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    @if (auth()->check())
                    <span class="all-tittles">{{ explode(' ', auth()->user()->nombre)[0] }} {{ explode(' ', auth()->user()->apellido)[0] }}</span>
                    @endif
                </li>

                <li class="tooltips-general exit-system-button" data-placement="bottom" title="Salir del sistema">
                    <a href="{{ route('logout') }}" onclick="salirSistema(event);" style="color: #fff; font-size: 20px;">
                        <i class="zmdi zmdi-power"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


                <li class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom"
                    title="Buscar libro">
                    <i class="zmdi zmdi-search"></i>
                </li>
                <li class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
                <li class="desktop-menu-button hidden-xs" style="float: left !important;">
                    <i class="zmdi zmdi-swap"></i>
                </li>
            </ul>
        </nav>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Editar Miembro</small></h1>
            </div>
        </div>
            <div id="registrarMiembro">
                <br>
                <div class="container-fluid" id="cabeceraMiembro" style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <img src="{{asset('assets/img/user03.png')}}" alt="user" class="img-responsive center-box"
                                style="max-width: 110px;">
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                            Bienvenido a la sección para actualizar los datos del miembro.
                        </div>
                    </div>
                </div>
                <div class="container-fluid" id="formMiembro">
                    <div class="container-flat-form">
                        <div class="title-flat-form title-flat-blue">Editar Miembro</div>
                        <form class="form-padding" action="{{url('miembro/home/'. $miembro->user_id)}}" method="POST">
                            @csrf
    
                            <div class="row">
                                <div class="col-xs-12">
                                    <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Datos básicos</legend><br>
                                </div>
                                {{-- <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el NIE del alumno" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="NIE de estudiante">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Carnet</label>
                                </div>
                            </div> --}}
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="nombre" type="text" class="material-control tooltips-general"
                                            placeholder="Escribe tu nombre" required=""
                                            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" maxlength="70" data-toggle="tooltip"
                                            data-placement="top" title="Escribe tu nombre" value="{{$miembro->NOMBRE}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombres</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="apellido" type="text" class="material-control tooltips-general"
                                            placeholder="Escribe tus apellidos" required=""
                                            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" maxlength="70" data-toggle="tooltip"
                                            data-placement="top" title="Escribe tus Apellidos" value="{{$miembro->APELLIDO}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Apellidos</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="fecha_nac" type="date" class="material-control tooltips-general"
                                            placeholder="Fecha de nacimiento" required="" data-toggle="tooltip"
                                            data-placement="top" title="Fecha de nacimiento" value="{{ date('Y-m-d', strtotime($miembro->FECHA_NACIMIENTO)) }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Fecha de nacimiento</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="telefono" type="tel" class="material-control tooltips-general"
                                            placeholder="Teléfono" required="" maxlength="15" data-toggle="tooltip"
                                            data-placement="top" title="Ingrese su numero de telefono" value="{{$miembro->TELEFONO}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Teléfono</label>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="tipo_identificacion" type="text"
                                            class="material-control tooltips-general" placeholder="Tipo de identificación"
                                            required="" data-toggle="tooltip" data-placement="top"
                                            title="Ingresa el tipo de identificación" value="{{$miembro->DOC_IDENTIFICACION}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Tipo de identificación</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="num_identificacion" type="text"
                                            class="material-control tooltips-general"
                                            placeholder="Número de identificación" required="" data-toggle="tooltip"
                                            data-placement="top" title="Ingresa el número de identificación" value="{{$miembro->NUM_DOC_IDENTIFICACION}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Número de identificación</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="email" type="email" class="material-control tooltips-general"
                                            placeholder="E-mail" required="" maxlength="50" data-toggle="tooltip"
                                            data-placement="top" title="Escribe el Email del miembro" value="{{$miembro->CORREO}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <legend><i class="zmdi zmdi-lock"></i> &nbsp; Datos de la cuenta</legend><br>
                                </div>
                                <div class="col-xs-12">
                                    <div class="group-material">
                                        <input name="name" type="text"
                                            class="material-control tooltips-general input-check-user"
                                            placeholder="Nombre de usuario" required="" maxlength="20"
                                            pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,20}" data-toggle="tooltip"
                                            data-placement="top"
                                            title="Escribe un nombre de usuario sin espacios, que servira para iniciar sesión" value="{{$user->name}}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombre de usuario</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="password" type="password" class="material-control tooltips-general"
                                            placeholder="Contraseña" required="" maxlength="200"
                                            data-toggle="tooltip" data-placement="top" title="Escribe una contraseña">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Contraseña</label>
                                    </div>
                                </div>
                                <input type="hidden" name="tipo" value="miembro">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="group-material">
                                        <input name="password_confirmation" type="password"
                                            class="material-control tooltips-general" placeholder="Repite la contraseña"
                                            required="" maxlength="200" data-toggle="tooltip" data-placement="top"
                                            title="Repite la contraseña">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Repetir contraseña</label>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <p class="text-center">
                                        <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i
                                                class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                        <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i>
                                            &nbsp;&nbsp; Guardar</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
        <footer class="footer full-reset">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Acerca de</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam quam dicta et, ipsum quo. Est saepe deserunt, adipisci eos id cum, ducimus rem, dolores enim laudantium eum repudiandae temporibus sapiente.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Desarrollador</h4>
                        <ul class="list-unstyled">
                            <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Carlos Alfaro <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright full-reset all-tittles">© 2018 Carlos Alfaro</div>
        </footer>
    </div>
    <script src="{{ asset('js/bibliotecario/bibliotecarioCrud.js') }}"></script>
</body>
</html>