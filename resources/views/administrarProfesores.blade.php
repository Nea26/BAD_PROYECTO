<!DOCTYPE html>
<html lang="es">

<head>
    <title>Bibliotecario</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/icons/book.ico" />
    <script src="../js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../css/sweet-alert.css">
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"
        rel="stylesheet">
    <script>
        window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/modernizr.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/main.js"></script>
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
                    <img src="../assets/img/logo.png" alt="Biblioteca" class="img-responsive center-box"
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
                        @if(auth()->user()->hasRole('bibliotecario'))
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Administración de usuarios <i
                                class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Administrar
                            bibliotecarios</a></li>
                            <li><a href="{{ route('home/profesores') }}"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Administrar
                                profesores</a></li>
                            <li><a href="{{ route('home/miembros') }}"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Administrar
                                miembros</a></li>
                        </ul>
                        @endif
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
                    <img src="../assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    @if (auth()->check())
                        <span class="all-tittles">{{ explode(' ', auth()->user()->nombre)[0] }}
                            {{ explode(' ', auth()->user()->apellido)[0] }}</span>
                    @endif
                </li>

                <li class="tooltips-general exit-system-button" data-placement="bottom" title="Salir del sistema">
                    <a href="{{ route('logout') }}" onclick="salirSistema(event);"
                        style="color: #fff; font-size: 20px;">
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
                <h1 class="all-tittles">Sistema Bibliotecario <small> Administracion de Usuarios</small></h1>
            </div>
        </div>
        @if (session('success'))
            <div id="success-alert" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div id="registrarProfesor" >
            <br>
            <div class="container-fluid" id="cabeceraProfesor" style="margin: 50px 0;">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <img src="../assets/img/user02.png" alt="user" class="img-responsive center-box"
                            style="max-width: 110px;">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                        Bienvenido a la sección para registrar nuevos Profesores. Para registrar debes de llenar todos
                        los campos del siguiente formulario.
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 lead">
                        <ol class="breadcrumb">
                            <li role="presentation" class="active"><a id="nuevoProfesor">Nuevo Profesor</a></li>
                            <li role="presentation"><a id="verProfesores"> Listado de profesores</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="container-fluid" id="formProfesor">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue">Registrar un nuevo profesor</div>
                    <form class="form-padding" action="{{ route('register-user') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12">
                                <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Datos básicos</legend><br>
                            </div>
                            <input type="hidden" name="tipo" value="profesor">
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input name='dui' type="text" class="material-control tooltips-general"
                                        placeholder="Escribe aquí el número de DUI del docente" pattern="[0-9-]{1,10}"
                                        required="" maxlength="10" data-toggle="tooltip" data-placement="top"
                                        title="Solamente números y guiones, 10 dígitos">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Número de DUI</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="nombre" type="text" class="material-control tooltips-general"
                                        placeholder="Escribe aquí los nombres del docente"
                                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Escribe los nombres del docente, solamente letras">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombres</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="apellido" type="text" class="material-control tooltips-general"
                                        placeholder="Escribe aquí los apellidos del docente"
                                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Escribe los apellidos del docente, solamente letras">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Apellidos</label>
                                </div>
                            </div>
                            <input type="hidden" name="role_id" value="3">
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name='telefono' type="tel" class="material-control tooltips-general"
                                        placeholder="Teléfono" required="" maxlength="15" data-toggle="tooltip"
                                        data-placement="top" title="Ingrese su numero de telefono">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Teléfono</label>
                                </div>
                                <div class="group-material">
                                    <input name="email" type="email" class="material-control tooltips-general"
                                        placeholder="E-mail" required="" maxlength="50" data-toggle="tooltip"
                                        data-placement="top" title="Escribe el Email del docente">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                                <legend><i class="zmdi zmdi-lock"></i> &nbsp; Datos de la cuenta</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input name="name" type="text"
                                        class="material-control tooltips-general input-check-user"
                                        placeholder="Nombre de usuario" required="" maxlength="20"
                                        pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,20}" data-toggle="tooltip"
                                        data-placement="top"
                                        title="Escribe un nombre de usuario sin espacios, que servira para iniciar sesión">
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
            {{-- Listado de Profesores --}}
            <div class="container-fluid" id="listadoProfesores" style="display: none;">
                <div class="container-fluid" style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <img src="../assets/img/user02.png" alt="user" class="img-responsive center-box"
                                style="max-width: 110px;">
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                            Bienvenido a la sección donde se encuentra el listado de Profesores registrados en el
                            sistema, puedes actualizar algunos datos de los profesores o eliminar el registro completo
                            del docente siempre y cuando no tenga préstamos asociados.<br>
                            <strong class="text-danger"><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Importante!
                            </strong>Si eliminas el docente del sistema se borrarán todos los datos relacionados con él,
                            incluyendo préstamos y registros en la bitácora.
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    
                    <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Listado de Profesores
                    </h2>

                    <input type="text" name="search_Profesor" class="mb-3 form-control" id="search_Profesor" placeholder="Buscar Profesor...">
                    <br>
                    <div class="table-data"  id="datos-buscador">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Carnet</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>DUI</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profesores as $profesor)
                                    <tr>
                                        <td>{{ $profesor->CARNET_PROFESOR }}</td>
                                        <td>{{ $profesor->NOMBRE }}</td>
                                        <td>{{ $profesor->APELLIDO }}</td>
                                        <td>{{ $profesor->DUI }}</td>
                                        <td>{{ $profesor->CORREO }}</td>
                                        <td>{{ $profesor->TELEFONO }}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-between;">
                                                <a href="{{ url('profesor/home/edit/' . $profesor->user_id) }}"
                                                    class="btn btn-info"><i class="zmdi zmdi-edit"></i></a>
                                                <form action="{{ url('profesor/home/' . $profesor->user_id) }}"
                                                    method="post" id="deleteFormP{{ $profesor->user_id }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button onclick="confirmDeleteP(event, {{ $profesor->user_id }})"
                                                        class=" btn btn-danger" type="submit"><i
                                                            class="zmdi zmdi-delete"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $profesores->links() }}
                    </div>
                    
                </div>
            </div>
        
            <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui
                            molestias
                            ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam
                            veniam
                            ipsa accusamus error. Animi mollitia corporis iusto.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                    class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer full-reset">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <h4 class="all-tittles">Acerca de</h4>
                            <p>

                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <h4 class="all-tittles">Desarrollador</h4>
                            <ul class="list-unstyled">
                                <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp;  <i
                                        class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i
                                        class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright full-reset all-tittles">BAD_115</div>
            </footer>
            <script src="{{ asset('js/bibliotecario/profesorCrud.js') }}"></script>
            @include('filtrado.filtradoProf')
</body>

</html>
