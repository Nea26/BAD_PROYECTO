<!DOCTYPE html>
<html lang="es">

<head>
    <title>Bibliotecario</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/icons/book.ico" />
    @include('includes.estilos')
</head>

<body>

    @include('includes.sidebar')
    <div class="content-page-container full-reset custom-scroll-containers">
        @include('includes.navbar')
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
        <div id="registrarProfesor">
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

                    <input type="text" name="search_Profesor" class="mb-3 form-control" id="search_Profesor"
                        placeholder="Buscar Profesor...">
                    <br>
                    <div class="table-data" id="datos-buscador">
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
            @include('includes.footer')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script src="/js/bibliotecario/profesorCrud.js"></script>
            @include('filtrado.filtradoProf')
</body>

</html>
