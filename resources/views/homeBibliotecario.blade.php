<!DOCTYPE html>
<html lang="es">

<head>
    <title>Bibliotecario</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
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
        <div id="registrarBibliotecario">
            <br>
            <div class="container-fluid" style="margin: 50px 0;" id="cabeceraBibliotecario">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <img src="assets/img/user01.png" alt="user" class="img-responsive center-box"
                            style="max-width: 110px;">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                        Bienvenido a la sección para registrar nuevos bibliotecarios en el sistema, debes de llenar
                        todos los campos del siguiente formulario para registrarlos.
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 lead">
                        <ol class="breadcrumb">
                            <li role="presentation" class="active"><a id="nuevoBibliotecario">Nuevo Bibliotecario</a>
                            </li>
                            <li role="presentation"><a id="verBibliotecarios">Listado de bibliotecarios</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container-fluid" id="formBibliotecario">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue">Registrar un nuevo bibliotecario</div>
                    <form class="form-padding" action="{{ route('register-user') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12">
                                <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Datos básicos</legend><br>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="group-material">
                                    <input name="nombre" type="text" class="material-control tooltips-general"
                                        placeholder="Nombres" required="" maxlength="70"
                                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip" data-placement="top"
                                        title="Escribe tu nombre">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombres</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input name="apellido" type="text" class="material-control tooltips-general"
                                        placeholder="Apellidos" required="" maxlength="70"
                                        pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip"
                                        data-placement="top" title="Escribe tus apellidos">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Apellidos</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="email" type="email" class="material-control tooltips-general"
                                        placeholder="E-mail" maxlength="50" data-toggle="tooltip" data-placement="top"
                                        title="Escribe tu email">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                            </div>

                            <input type="hidden" name="role_id" value="1">
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
                                        title="Escribe un nombre de usuario sin espacios, que servira para iniciar sesión">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre de usuario</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="password" type="password" class="material-control tooltips-general" placeholder="Contraseña" required="" maxlength="200" data-toggle="tooltip" pattern="^(?=.*[A-Z])(?=.*[!@#$&*])[A-Za-z].{7,199}$" data-placement="top" title="Escribe una contraseña de minimo 8 digitos, incluyendo una mayuscula, un simbolo , una minuscula y empezando con una letra.">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Contraseña</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input name="password_confirmation" type="password"
                                        class="material-control tooltips-general" placeholder="Repite la contraseña"
                                        required="" maxlength="200" data-toggle="tooltip" data-placement="top" pattern="^(?=.*[A-Z])(?=.*[!@#$&*])[A-Za-z].{7,199}$"
                                        title="Repite la contraseña">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Repetir contraseña</label>
                                </div>
                            </div>
                            <input type="hidden" name="tipo" value="bibliotecario">
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
            <div class="container-fluid" id="listadoBibliotecarios" style="display: none;">
                <div class="container-fluid" style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <img src="assets/img/user01.png" alt="user" class="img-responsive center-box"
                                style="max-width: 110px;">
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                            Bienvenido a la sección donde se encuentra el listado de Bibliotecarios registrados en el
                            sistema, puedes actualizar algunos datos de los bibliotecarios o eliminar el registro
                            completo.
                        </div>
                    </div>
                    <h2 class="text-center all-tittles">Lista de Bibliotecarios</h2>
                    <!-- Botón de búsqueda -->
                    <input type="text" name="search_Bibliotecario" class="mb-3 form-control"
                        id="search_Bibliotecario" placeholder="Buscar Bibliotecarios...">
                    <br>
                    <div class="table-data" id="datos-buscador">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Username</th>
                                    <th>Estado</th>
                                    <th style="width: 10%;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="bibliotecariosTableBody">
                                @foreach ($bibliotecarios as $bibliotecario)
                                    <tr>
                                        <td>{{ $bibliotecario->ID_BIBLIOTECARIO }}</td>
                                        <td>{{ $bibliotecario->NOMBRE }}</td>
                                        <td>{{ $bibliotecario->APELLIDO }}</td>
                                        <td>{{ $bibliotecario->USER_NAME }}</td>
                                        <td>{{ $bibliotecario->activo ? 'Activo' : 'Inactivo' }}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-between;">
                                                <form method="POST"
                                                    action="{{ route('bibliotecario/home/estado/', $bibliotecario->user_id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-secondary"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Cambia el estado"><i
                                                            class="zmdi zmdi-swap"></i></button>
                                                </form>
                                                <a href="{{ url('bibliotecario/home/edit/' . $bibliotecario->ID_BIBLIOTECARIO) }}"
                                                    class="btn btn-info"><i class="zmdi zmdi-edit"></i></a>
                                                <form
                                                    action="{{ url('bibliotecario/home/' . $bibliotecario->user_id) }}"
                                                    method="post" id="deleteFormB{{ $bibliotecario->user_id }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button
                                                        onclick="confirmDeleteB(event, {{ $bibliotecario->user_id }})"
                                                        class=" btn btn-danger" type="submit"><i
                                                            class="zmdi zmdi-delete"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Paginación -->
                        {!! $bibliotecarios->links() !!}
                    </div>

                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center all-tittles">Ayuda del sistema</h4>
                        </div>
                        <div class="modal-body">
                            En este espacio puedes registrar nuevos bibliotecarios en el sistema,
                            para ello debes de llenar todos los campos del formulario con los datos
                            correspondientes. Si deseas ver el listado de bibliotecarios registrados
                            en el sistema, puedes hacer clic en el botón "Listado de bibliotecarios".
                            <br><br>
                            <strong>Nota:</strong> Todos los campos son obligatorios.
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

            <script src="/js/registro/registroUsuarios.js"></script>
            <script src="/js/bibliotecario/bibliotecarioCrud.js"></script>

            @include('filtrado/filtrado')

</body>

</html>
